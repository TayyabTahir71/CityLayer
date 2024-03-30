Citylayer Project

Installation:

1. Clone the repository:

   git clone https://github.com/username/citylayer-laravel.git

2. Navigate to the project directory:

   cd citylayer

3. Install Composer dependencies:

   composer install

4. Copy the .env.example file to .env and configure your environment variables:

   cp .env.example .env

5. Generate application key:

   php artisan key:generate

6. Create a new MySQL database for the project.

7. Update the .env file with your database details:

   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_username
   DB_PASSWORD=your_database_password

8. Run database migrations and seeders to set up the database:

   php artisan migrate --seed

9. Install npm dependencies:

   npm install

10. Start the development server and watch for changes:

    npm run dev or npm run build

License:

This project is licensed under the MIT License.
