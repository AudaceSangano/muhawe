# Muhawe Project

This README provides step-by-step instructions to set up the Laravel application from a Git repository to your local development environment.

## Prerequisites

Before you begin, ensure you have the following installed:

- [Git](https://git-scm.com/downloads)
- [PHP](https://www.php.net/downloads) (version 8.2 or higher)
- [Composer](https://getcomposer.org/download/)
- [MySQL](https://dev.mysql.com/downloads/) or another supported database

## Installation Steps

### 1. Clone the Repository

First, clone the repository to your local machine:

```bash
git clone https://github.com/AudaceSangano/muhawe.git
```

Navigate into the project directory:

```bash
cd muhawe
```

### 2. Install PHP Dependencies

Install the PHP dependencies using Composer:

```bash
composer install
```

### 3. Set Up the Environment File

Copy the `.env.example` file to create your local environment configuration file:

```bash
cp .env.example .env
```

### 4. Generate an Application Key

Generate the application key. This key is used for encryption and should be unique for each application:

```bash
php artisan key:generate
```

### 5. Configure Your Database

Open the `.env` file and configure your database settings. You will need to set the following environment variables:

```plaintext
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

### 6. Run Database Migrations

Run the database migrations to set up your database schema:

```bash
php artisan migrate
```

If you have seed data, you can run:

```bash
php artisan db:seed
```

### 9. Start the Development Server

You can start the Laravel development server using:

```bash
php artisan serve
```

By default, the server will be accessible at `http://localhost:8000`. You can specify a different host and port if needed:

```bash
php artisan serve --host=127.0.0.1 --port=8080
```

### 10. Access the Application

Open your web browser and navigate to `http://localhost:8000` (or the URL specified in the previous step) to see your application in action.

## Troubleshooting

- **Composer Issues:** If you encounter issues with Composer, try running `composer update` or `composer diagnose`.
- **Database Issues:** Ensure your database server is running and that the credentials in your `.env` file are correct.
- **File Permissions:** If you encounter permission errors, ensure that the storage and bootstrap/cache directories are writable.
