<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# CareerConnect

## Overview

**CareerConnect** is a comprehensive job portal designed to connect hiring companies with job seekers efficiently. The platform offers tools for both companies and job seekers to meet their respective needs, ensuring a user-friendly experience for all parties involved.

### Key Features

-   **For Companies**:

    -   Sign up and log in to the portal.
    -   Post job listings with detailed responsibilities and requirements.
    -   View and manage job applications.
    -   Navigate through a jobs page and a companies page.
    -   Edit or delete posted jobs.
    -   Maintain and update their profile.

-   **For Job Seekers**:

    -   Sign up and log in to access opportunities.
    -   Search for jobs by title or category.
    -   Search for companies.
    -   Apply for jobs and manage applications.
    -   View and update their profile.

-   **Homepage**:
    -   Displays job categories as interactive cards.
    -   Features a carousel showcasing highlighted job postings.

---

## Technologies Used

The following tools and technologies were utilized in the development of CareerConnect:

-   **Development Environment**: Visual Studio Code (VSCode)
-   **Design**: Canva
-   **Database Management**: phpMyAdmin, MySQL
-   **Programming Languages**: HTML, CSS, JavaScript, PHP
-   **Framework**: Laravel
-   **Templating Engine**: Blade
-   **Search Engine**: Scout Driver

---

## Installation Instructions

To set up and run the CareerConnect project locally, follow these steps:

### Prerequisites

Ensure the following are installed on your system:

-   [PHP 8.1](https://www.php.net/)
-   [Composer](https://getcomposer.org/)
-   [MySQL](https://www.mysql.com/)
-   [Laravel 11](https://laravel.com/)

### Steps

1. **Clone the repository**:
    ```bash
    git clone https://github.com/hasanborshalli/careerconnect.git
    cd careerconnect
    ```
2. **Install dependencies**:

```bash
composer install
composer require laravel/scout
composer require algolia/algoliasearch-client-php
```

3. **Set environment variables**:

    Duplicate the .env.example file and rename it to .env.
    Configure your database credentials in the .env file:

```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=job
    DB_USERNAME=root
    DB_PASSWORD=
```

4. **Generate application key**:

```bash
php artisan key:generate

Run migrations and seed the database:

php artisan migrate --seed
```

5. **Start the development server**:

```bash
    php artisan serve
```

    Open the application in your browser at http://localhost:8000.

## Contact Information

For inquiries or feedback, feel free to reach out:

    Email: hasanborshalli@gmail.com
    GitHub: https://github.com/hasanborshalli
    LinkedIn: https://www.linkedin.com/in/hasan-borshalli-b98464198/

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
