<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Property;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard()
    {
        $data = [
            'title'=>'Dashboard',
            'latestProducts' => $this->recentProperties(),
            'countProducts' => $this->sumProperties()->count(),
            'lastProducts' => $this->lastProperties()->count(),
            'todayProducts' => $this->todayProperties()->count(),
            'countUsers' => $this->sumUsers()->count(),
            'lastUsers' => $this->lastUsers()->count(),
            'todayUsers' => $this->todayUsers()->count(),
            'sumAverage' => $this->sumAverage()->count()>0?$this->sumAverage()->sum('pro_price')/$this->sumAverage()->count():0,
            'todayAverage' => $this->todayAverage()->count()>0?$this->todayAverage()->sum('pro_price')/$this->todayAverage()->count():0,
            'sumPrice' => $this->sumAverage()->sum('pro_price'),
            'todayPrice' => $this->todayAverage()->sum('pro_price'),
            'properties' => $this->totalProperties()->count(),
            'amount' => $this->totalProperties()->sum('pro_price'),
        ];
        return view('layout.dashboard',$data);
    }

    public function registerAgent(Request $request)
    {
        $credentials = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required','unique:users'],
            'phone' => ['required','starts_with:078,0recentProperties79,072,073'],
            'user_name' => ['required'],
            'password' => ['required','confirmed'],
        ]);

        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'user_telephone' => $request->phone,
            'user_name' => $request->user_name,
            'password' => Hash::make($request->password),
            'user_status' => 'active',
            'user_role' => 'Agent',
        ];
        return $this->registerUser($data);

    }

    public function agentList()
    {
        return $this->users('Agent');
    }

    public function householderList()
    {
        return $this->users('householder');
    }

    public function registerHouseholder()
    {
        return view('auth.new');
    }

    public function registerHouseholderOp(Request $request)
    {
        $credentials = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required','unique:users'],
            'phone' => ['required','starts_with:078,079,072,073'],
            'user_name' => ['required'],
            'location' => ['required'],
            'password' => ['required','confirmed'],
        ]);

        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'user_telephone' => $request->phone,
            'user_name' => $request->user_name,
            'password' => Hash::make($request->password),
            'user_location' => $request->location,
            'user_status' => 'active',
            'user_role' => 'householder',
        ];
        return $this->registerUser($data);
    }

    public function registerProperty(Request $request)
    {
        $credentials = $request->validate([
            'pro_price' => ['required'],
            'pro_furniture' => ['required'],
            'pro_date' => ['required'],
            'pro_details' => ['required'],
        ]);

        $data = [
            'pro_price' => $request->pro_price,
            'pro_furniture' => $request->pro_furniture,
            'pro_building_date' => $request->pro_date,
            'pro_details' => $request->pro_details,
            'pro_owner' => Auth::user()->user_id,
            'pro_price_status' => 'proposed',
        ];
        $result = Property::insert($data);

        if ($result) {
            return back()->withErrors([
                'new_property'=>'Successful Property Registered!!'
            ]);
        }else {
            return back()->withErrors([
                'new_property'=>'Fail to register Property!!'
            ]);
        }
    }

    public function registerUser($data)
    {
        $result = User::insert($data);

        if ($result) {
            return back()->withErrors([
                'new_agent'=>'Successful '.$data['user_role'].' Registered!!'
            ]);
        }else {
            return back()->withErrors([
                'new_agent'=>'Fail to register '.$data['user_role'].'!!'
            ]);
        }
    }

    public function users($type)
    {
        $users = User::where('user_role', $type)->get();
        $data =[
            'title' => $type.' List',
            'users' => $users
        ];
        return view('layout.listUsers',$data);
    }

    public function properties()
    {
        if (Auth::user()->user_role=='householder') {
            $properties = Property::join('users', 'users.user_id', 'properties.pro_owner')
            ->select('properties.*','users.first_name','users.last_name','users.user_telephone')
            ->where('pro_owner', Auth::user()->user_id)
            ->get();
        }else{
        $properties = Property::join('users', 'users.user_id', 'properties.pro_owner')
        ->select('properties.*','users.first_name','users.last_name','users.user_telephone')
        ->get();
        }
        $data = [
            'title' =>'Properties List',
            'properties' => $properties
        ];
        return view('layout.listProperties',$data);
    }

    public function propertiesAction()
    {
        if (Auth::user()->user_role=='householder') {
            $properties = Property::join('users', 'users.user_id', 'properties.pro_owner')
            ->select('properties.*','users.first_name','users.last_name','users.user_telephone')
            ->where('pro_owner', Auth::user()->user_id)
            ->get();
        }else{
        $properties = Property::join('users', 'users.user_id', 'properties.pro_owner')
        ->select('properties.*','users.first_name','users.last_name','users.user_telephone')
        ->get();
        }
        $data = [
            'title' =>'Properties List',
            'properties' => $properties
        ];
        return view('layout.listPropertiesAction',$data);
    }

    public function setting()
    {
        $title = 'Account Setting';
        return view('auth.setting',compact('title'));
    }

    public function editPropertyForm($code)
    {
        $data = DB::table('properties')->where('pro_id', $code)
                ->first();
        $title = 'Edit Property';
        $data = [
            'title' => $title,
            'data' => $data
        ];

        return view('layout.propertyEdit',$data);
    }

    public function updatePropertyOp(Request $request)
    {
        $credentials = $request->validate([
            'edit_pro_price' => ['required'],
            'edit_pro_furniture' => ['required'],
            'edit_pro_date' => ['required'],
            'edit_pro_details' => ['required'],
        ]);

        $data = [
            'pro_price' => $request->edit_pro_price,
            'pro_furniture' => $request->edit_pro_furniture,
            'pro_building_date' => $request->edit_pro_date,
            'pro_details' => $request->edit_pro_details,
        ];
        $result = Property::where('pro_id', $request->pro_id)->update($data);

        if ($result) {
            return back()->withErrors([
                'update_property'=>'Successful Property Updated!!'
            ]);
        }else {
            return back()->withErrors([
                'update_property'=>'Fail to Update Property!!'
            ]);
        }
    }

    public function deletePropertyOp($id)
    {
        $result = Property::where('pro_id', $id)->delete();

        if ($result) {
            return back()->withErrors([
                'error'=>'Successful Property Deleted!!'
            ]);
        }else {
            return back()->withErrors([
                'error'=>'Fail to Delete Property!!'
            ]);
        }
    }

    public function confirmPropertyOp($id)
    {
        $data = [
            'pro_price_status' => 'confirmed',
        ];
        $result = Property::where('pro_id', $id)->update($data);

        if ($result) {
            return back()->withErrors([
                'error'=>'Successful Price Confirmed!!'
            ]);
        }else {
            return back()->withErrors([
                'error'=>'Fail to Confirm Price!!'
            ]);
        }
    }

    public function rejectPropertyOp($id)
    {
        $data = [
            'pro_price_status' => 'rejected',
        ];
        $result = Property::where('pro_id', $id)->update($data);

        if ($result) {
            return back()->withErrors([
                'error'=>'Successful Price Rejected!!'
            ]);
        }else {
            return back()->withErrors([
                'error'=>'Fail to Reject Price!!'
            ]);
        }
    }

    public function appealPropertyOp($id)
    {
        $data = [
            'pro_price_status' => 'appeal',
        ];
        $result = Property::where('pro_id', $id)->update($data);

        if ($result) {
            return back()->withErrors([
                'error'=>'Successful Appeal!!'
            ]);
        }else {
            return back()->withErrors([
                'error'=>'Fail to appeal!!'
            ]);
        }
    }

    public function updatePropertyCost(Request $request)
    {
        $credentials = $request->validate([
            'category' => ['required'],
            'percentage' => ['required']
        ]);

        $results = Property::where('pro_price_status', 'confirmed')->get();

        if ($results) {
            foreach ($results as $row) {
                $currentPrice = $row->pro_price;
                $newPrice = ($currentPrice*$request->percentage)/100;
                if ($request->category=='inflation') {
                    DB::table('properties')->where('pro_id', $row->pro_id)
                        ->update([
                            'pro_price' => $currentPrice+$newPrice
                        ]);
                }else{
                    DB::table('properties')->where('pro_id', $row->pro_id)
                        ->update([
                            'pro_price' => $currentPrice-$newPrice
                        ]);
                }
            }

            return back()->withErrors([
                'error'=>'Successful Property Updated!!'
            ]);
        }else {
            return back()->withErrors([
                'error'=>'No Data to Update!!'
            ]);
        }

    }

    public function recentProperties()
    {

        $properties = Property::join('users', 'users.user_id', 'properties.pro_owner')
        ->select('properties.*','users.first_name','users.last_name','users.user_telephone','users.user_location')
        ->orderBy('properties.pro_id', 'DESC')
        ->limit(7)
        ->get();
        return $properties;
    }

    public function sumProperties()
    {

        $properties = Property::all();
        return $properties;
    }

    public function totalProperties()
    {

        $properties = Property::where('pro_owner', Auth::user()->user_id)->get();
        return $properties;
    }

    public function lastProperties()
    {

        $properties = Property::where('created_at', '<', Carbon::today())
        ->get();
        return $properties;
    }

    public function todayProperties()
    {

        $properties = Property::where('created_at', '>=', Carbon::today())
        ->get();
        return $properties;
    }

    public function sumUsers()
    {

        $users = User::all();
        return $users;
    }

    public function lastUsers()
    {

        $users = User::where('created_at', '<', Carbon::today())
        ->get();
        return $users;
    }

    public function todayUsers()
    {

        $users = User::where('created_at', '>=', Carbon::today())
        ->get();
        return $users;
    }

    public function sumAverage()
    {

        $average = Property::all();
        return $average;
    }

    public function todayAverage()
    {

        $average = Property::where('created_at', '>=', Carbon::today())
        ->get();
        return $average;
    }
}
