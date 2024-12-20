# Coding exercise

## Description

This project is an exercise designed to practice
The project is built with [technologies used:Laravel, Livewire, etc.].

## Prerequisites

Before running the project, make sure you have the following installed on your machine:

-   PHP (>= 8.1)
-   Composer
-   Laravel

## Installation

1. Clone the repository to your local machine:

    ```bash
    git clone https://github.com/hounsounon-anselme/codingExercise.git
    cd codingExercise
    ```

2. Install PHP dependencies using Composer:

    ```bash
    composer install
    ```

3. Install front-end dependencies:

    ```bash
    npm install
    ```

4. Copy the `.env.example` file to `.env`:

    ```bash
    cp .env.example .env
    ```

5. Generate the application key:

    ```bash
    php artisan key:generate
    ```

6. Set up the database by running the migrations :

    ```bash
    php artisan migrate
    ```

7-Populate the database with data using the following command:

```bash
php artisan db:seed
```

## Running the Project

### Local Development Server

To run the project locally, use the built-in Laravel server:

```bash
php artisan serve
```

The project should now be available at `http://localhost:8000`.
