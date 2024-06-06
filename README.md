## Setup

-   Pull/Clone the Repo
-   Run `composer install` to install all packages
-   Copy the .env.example file and save as .env
-   Run `php artisan key:generate` to generate the app key
-   Setup the environment (Database) in the .env file
-   Setup the MAIL ENV in the .env file
-   Run `php artisan migrate --seed` to create needed database tables and seed records
-   Run `php artisan queue:work` to run queue
-   Run `php artisan serve` to start the backend service
