# Notus Test Laravel Application

This application is developed using **Laravel 11** and uses **Sail** for managing the environment within **Docker** containers.

## Preparation

Before you begin, make sure you have the following installed on your computer:

- **Docker**: [Docker installation](https://www.docker.com/get-started)
- **Docker Compose**: Included in the Docker Desktop installation
- **PHP** (if you want to use a local PHP version instead of Sail)
- **Git**: For cloning the repository

## Installation

1. **Clone the repository**:

   Run the following command to clone the repository to your local machine:

   ```bash
   git clone https://github.com/Ch1Ch4/notus.git
   ```

2. **Navigate to the application directory**:

   ```bash
   cd notus
   ```

3.  **Install dependencies**:

   ```bash
   composer install
   ```

4. **Create the .env file**:

   Laravel comes with a sample `.env` file, so you should copy `.env.example` to `.env`:

   ```bash
   cp .env.example .env
   ```
   
5. **Run Sail (Docker environment)**:

   Laravel Sail is an easy tool to run Laravel applications using Docker. Run the following command to start the environment:

   ```bash
   ./vendor/bin/sail up -d
   ```

   This command starts all the necessary Docker containers (Nginx, MySQL, Redis, etc.) in the background.

6. **Generate the application key**:

   Laravel requires a unique application key for securing encrypted data:

   ```bash
   ./vendor/bin/sail artisan key:generate
   ```

7. **Run database migrations**:

   To create the required tables in the database, run the migrations:

   ```bash
   ./vendor/bin/sail artisan migrate
   ```

8. **Run seeders (optional)**:

   If you want to populate the database with test data, you can run the seeders:

   ```bash
   ./vendor/bin/sail artisan db:seed
   ```

9. **The application is now running**:

   You should now be able to access the application at the following address in your browser:

   ```bash
   http://localhost
   ```
10. **Test users**:

   Admin role
   ```bash
   email: admin@example.com
   password: password
   ```

   Moderator role
   ```bash
   email: moderator@example.com
   password: password
   ```
11. **Make storage available**:

   ```bash
   ./vendor/bin/sail php artisan storage:link
   ```

## Configuration

- **Database**: Database configuration is located in the `.env` file. By default, it's set to use the Docker MySQL container.
- **Mailing**: To configure email sending, set the appropriate values in the `.env` file (for SMTP or other services).

## Commands

Here are some useful commands you can use with Sail:

- **Start the application**:

  ```bash
  ./vendor/bin/sail up -d
  ```

- **Stop the application**:

  ```bash
  ./vendor/bin/sail down
  ```

- **Run Artisan commands**:

  For example, to run migrations, you can use:

  ```bash
  ./vendor/bin/sail artisan migrate
  ```

- **Run PHPUnit tests**:

  ```bash
  ./vendor/bin/sail test
  ```
- **Check Route list**:

  ```bash
  ./vendor/bin/sail php artisan route:list
  ```

- **Check API Route list**:

  ```bash
  ./vendor/bin/sail php artisan route:list | grep api
  ```

---
