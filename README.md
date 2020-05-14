## WFG Laravel Project Notes

Laravel: https://laravel.com/docs

Main Branch: https://github.com/cpoirier/wfg-laravel


## Initializing a Site

Note: This project makes the assumption that creators have root access to an up-to-date Linux environment (Tested on Ubuntu and Fedora).

- Install git
- Install Apache/NGINX
- Install and enable PHP 7.X
- Install PHP Composer
- Install MySQL / MariaDB
- Create an empty database with project-specific user credentials
- Use Composer to build a new Laravel Project
- Clone this project with git
- Edit the **.env** file with your database settings
- Run the initial database migrations with *php artisan migrate*
- Build the project with *npm run dev*
- Point a virtual-host to the Laravel project's **public** folder
- Test that everything is operating as expected
