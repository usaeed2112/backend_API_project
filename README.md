# API Project

## Project Description

This project is a Laravel-based API providing functionalities for user authentication and management of authors and books. The API allows users to register, log in, and manage authors and books, including creating, reading, updating, and deleting records. Authentication is handled using Laravel's built-in authentication system with API tokens.

## Setup Instructions

### Prerequisites

Before setting up the project, ensure you have the following installed on your machine:

-   PHP >= 8.2
-   Composer
-   MySQL
-   Laravel CLI

### Installation

1. **Clone the repository:**

    ```bash
    git clone https://github.com/yourusername/your-repo-name.git
    cd your-repo-name
    ```

2. **Install dependencies:**

    ```bash
    composer install
    ```

3. **Copy the `.env.example` file to `.env`:**

    ```bash
    cp .env.example .env
    ```

4. **Generate an application key:**

    ```bash
    php artisan key:generate
    ```

5. **Configure your database settings in the `.env` file:**

    ```plaintext
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password
    ```

6. **Run the database migrations:**

    ```bash
    php artisan migrate
    ```

7. **Start the development server:**

    ```bash
    php artisan serve
    ```

## API Endpoints

### Authentication

-   **Register**

    ```http
    POST /api/register
    ```

    Registers a new user.

-   **Login**

    ```http
    POST /api/login
    ```

    Authenticates a user and returns an API token.

-   **Logout**

    ```http
    POST /api/logout
    ```

    Logs out the authenticated user. Requires authentication.

### Authors

-   **Get All Authors**

    ```http
    GET /api/authors
    ```

    Retrieves a list of all authors. Requires authentication.

-   **Store Author**

    ```http
    POST /api/authors/store
    ```

    Creates a new author. Requires authentication.

-   **Show Author**

    ```http
    GET /api/authors/show/{id}
    ```

    Retrieves details of a specific author by ID. Requires authentication.

-   **Edit Author**

    ```http
    GET /api/authors/edit/{id}
    ```

    Retrieves author data for editing by ID. Requires authentication.

-   **Update Author**

    ```http
    POST /api/authors/update/{id}
    ```

    Updates a specific author by ID. Requires authentication.

-   **Delete Author**

    ```http
    DELETE /api/authors/delete/{id}
    ```

    Deletes a specific author by ID. Requires authentication.

### Books

-   **Get All Books**

    ```http
    GET /api/books
    ```

    Retrieves a list of all books. Requires authentication.

-   **Store Book**

    ```http
    POST /api/books/store
    ```

    Creates a new book. Requires authentication.

-   **Show Book**

    ```http
    GET /api/books/show/{id}
    ```

    Retrieves details of a specific book by ID. Requires authentication.

-   **Edit Book**

    ```http
    GET /api/books/edit/{id}
    ```

    Retrieves book data for editing by ID. Requires authentication.

-   **Update Book**

    ```http
    POST /api/books/update/{id}
    ```

    Updates a specific book by ID. Requires authentication.

-   **Delete Book**

    ```http
    DELETE /api/books/delete/{id}
    ```

    Deletes a specific book by ID. Requires authentication.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.
