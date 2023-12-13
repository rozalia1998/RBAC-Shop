# RBAC Shop

## Brief Description
Building a shop that implements RBAC system using laravel framework with livewire and Laravel Spatie Package

## Some Features
- User Roles and Permissions using Laravel Spatie
- Using Livewire For Displaying Products and Filtering them By Category and Price
- Using Spatie Middlewares For Protecting Routes
- Assign Roles For super-admin and admin


## Installation
To run this project locally, follow these steps:

1. Clone the repository
   git clone https://github.com/rozalia1998/RBAC-Shop
2. Navigate to the project directory:
   cd RBAC-Shop
3. Install PHP dependencies using Composer:
    composer install
4. Copy the .env.example file to create a new .env file:
   cp .env.example .env
5. Generate a new application key:
   php artisan key:generate
6. Create an empty database for the project
7. Update the .env file with your database credentials.
8. Run database migrations to create the database tables and run seeders:
   php artisan migrate
   php artisan db:seed
   or
   php artisan migrate --seed
9. Install NPM dependencies:
    npm install
10. Compile assets using Laravel Mix:
    npm run dev
11. Start the development server:
    php artisan serve
12. Access the application in your web browser at http://localhost:8000
