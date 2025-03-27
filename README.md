## Laravel 8 Complete Blog

This repository demonstrates how to create a complete blog in Laravel 8 using best practices. It is based on [this YouTube video](https://www.youtube.com/watch?v=HKJDLXsTr8A&t=4710s).

• **Author**: Dylan Smyth

---

## Requirements
- PHP 7.3 or higher  
- Node.js 12.13.0 or higher  

---

## Installation

Follow these steps to set up the project on your local machine:

1. Clone the repository:
   
   git clone git@github.com/codewithdary/laravel-8-complete-blog.git
   cd laravel-8-complete-blog
   

2. Copy the example environment file and install dependencies:
 
   cp .env.example .env
   composer install
   

3. Generate the application key and clear caches:
   
   php artisan key:generate
   php artisan cache:clear && php artisan config:clear
   

4. Start the development server:
   
   php artisan serve
   

---

## Database Setup

1. Create a new database:
   
   mysql
   create database laravelblog;
   exit;
   

2. Update your `.env` file with the database credentials:
  
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=laravelblog
   DB_USERNAME=root
  

3. Run the migrations to create the necessary tables:

   php artisan migrate

---

## Contributing

Contributions are welcome! Feel free to adapt or add features, report bugs, or submit pull requests to improve the project.
