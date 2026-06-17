
## requrement

- PHP 8.1+
- Laravel 10.x
- MySQL 
- Blade Templates

## Installation

### 1. Clone the repository
```bash
git clone https://github.com/DanyalShahril/OpenSoftAssessment_Payroll_system.git
cd OpenSoftAssessment_Payroll_system

## Setup (run terminal)
composer install
copy .env.example .env

## Configure database
## Open .env and update your database settings:

CREATE DATABASE payroll_db;

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=payroll_db
DB_USERNAME=root
DB_PASSWORD=

# PS im still learning using postgresql and im try to use it, but unfortunately its failed to load :(, so im just using mysql (XAMPP/laragon) at this moment, sorry

## Generate key and run migrations  
php artisan key:generate
php artisan migrate
php artisan serve


## Features and formula were develop according to the requirements
- Add, Edit, Delete employees
- View payslip with automatic payroll calculation
- Search employees by name or position
- Form validation for all inputs

## if youre using xampp please save the folder inside "C:\xampp\htdocs"