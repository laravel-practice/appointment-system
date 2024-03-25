# Appointment System

## Overview
The Appointment System is a web-based application designed to manage appointments for normal users. It provides functionality for users to book appointments and for administrators to view and manage appointments and users.

## Table of Contents
1. [Appointment System](#appointment-system)
2. [Overview](#overview)
3. [Features](#features)
4. [Installation](#installation)
5. [TL;DR Command List](#tl;dr-command-list)
6. [System Requirements](#system-requirements)
7. [Dependencies](#dependencies)
8. [Usage](#usage)
9. [Contributing](#contributing)
10. [Authors](#authors)
11. [License](#license)
## Features
- **Multi-User Support:** The system supports both normal users and administrators with different levels of access.
- **Authentication:** Users need to be authenticated to access the system, ensuring data security.
- **User Appointment Management:** Authenticated users can book appointments and view their own appointment lists.
- **Admin Features:**
    - View All Appointments: Admin users have access to view all appointments across the system.
    - Manage Appointments: Admin users can view and manage appointments in the system.
    - User Management: Admin users can view and manage registered users in the system.
## Installation
1. Clone the repository.
    ```bash
    https://github.com/laravel-practice/appointment-system
    ```
2. Switch to the repo folder
    ```bash
    cd appointment-system
    ```
3. Install dependencies using Composer:
    ```bash
    composer install
    ```
4. Copy the example env file and make the required configuration changes in the .env file
   ```bash
    cp .env.example .env
    ```
5. Generate a new application key
    ```bash
    php artisan key:generate
    ```
6. Set up the database and configure your `.env` file accordingly.
   ```bash
    DB_DATABASE=YourDatabaseName
    DB_USERNAME=YourDataBaseUserName
    DB_PASSWORD=YourDataBasePassword
    ```
7. Run migrations to create necessary database tables:
    ```bash
    php artisan migrate
    ```   
8. Seed the database with initial data:
    - For admin access, run the bellow seeder:
        ```bash
        php artisan db:seed --class=AdminUserTableSeeder
        ```
    - If you want some dump data with admin access, run this command:
        ```bash
        php artisan db:seed
        ```
9. Start the local development server
    ```bash
    php artisan serve
    ```

Admin login credentials:
- Email: admin@appointment.com
- Password: admin123

Dummy user login credentials:
- Password: password

You can now access the server at http://localhost:8000 or http://127.0.0.1:8000

## TL;DR Command List
1. **Clone Repository:** `git clone https://github.com/laravel-practice/appointment-system`
2. **Install Dependencies:** `composer install`
3. **Create .env File:** ` cp .env.example .env`
4. **Set Up Environment:** Configure `.env` file
4. **Run Migrations:** `php artisan migrate`
5. **Seed Database (Admin Access):** `php artisan db:seed --class=AdminUserTableSeeder`
6. **Seed Database (with Dump Data):** `php artisan db:seed`
7. **Start System:** `php artisan serve`
8. **Access System:** Navigate to `http://localhost:8000` or `http://localhost:8000` in a web browser

   
## System Requirements
- PHP = 7*
- Laravel Framework = 8.0
- Other dependencies listed in the `composer.json` file.


## Dependencies
- [Fideloper/Proxy](https://github.com/fideloper/Proxy): A package for handling proxy methods for Laravel applications.
- [Fruitcake/Laravel-Cors](https://github.com/fruitcake/laravel-cors): Adds CORS (Cross-Origin Resource Sharing) support to your Laravel application.
- [GuzzleHttp/Guzzle](https://github.com/guzzle/guzzle): A PHP HTTP client library for making HTTP requests.
- [Laravel UI](https://github.com/laravel/ui): Official package for Bootstrap and Vue.js scaffolding.
- [Yajra/Laravel-Datatables-Oracle](https://github.com/yajra/laravel-datatables-oracle): Laravel DataTables plugin for handling large data tables efficiently.


## Usage
1. Register as a user or use the provided seeders to populate the database with initial data.
2. Log in with your credentials.
3. As a normal user, you can book appointments and view your appointment list.
4. As an admin user, you have access to view all appointments and users.

## Contributing
Contributions are welcome! Feel free to submit pull requests or open issues for any bugs or feature requests.

## Authors
- [Jivan Gautam](https://github.com/lifetoss)


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
