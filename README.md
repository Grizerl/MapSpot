# 🗺️ Laravel Map Places Application

This is a web application built with Laravel that allows users to add, edit, and manage map points using Google Maps. Each user can manage only their own locations, and administrators can manage all user data, including places and comments.

## Technologies Used

- **Laravel**
- **Blade шаблони**
- **Bootstrap 5**
- **MySQL**
- **Google Maps API**
- **Middleware**
- **File Upload (Images)**

## Launch instructions

1. Clone the repository: `git clone https://github.com/Grizerl/test-task-.git`.
2. Change to the project folder: `cd MapSpot`.
3. Install the dependencies: `composer install`.
4. Set up the .env file by copying from the example: `cp .env.example .env`.
5. Configure the database connection in your .env file:
DB_CONNECTION=mysql  
DB_HOST=your_database_host  
DB_PORT=your_database_port  
DB_DATABASE=your_database_name  
DB_USERNAME=your_database_user  
DB_PASSWORD=your_database_password
GOOGLE_MAPS_API_KEY=your_google_maps_api_key
6. Generate the application key: `php artisan key:generate`.
7. Run the database migrations: `php artisan migrate`.
8. Run the seeder: `php artisan db:seed`.
9. Start the Laravel development server: `php artisan serve`.