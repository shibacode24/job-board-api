# Simple Job Board API

A RESTful API for managing job listings and applications, built with Laravel.

## Prerequisites

-   PHP 8.x
-   Composer
-   MySQL
-   Laravel 11.x

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/shibacode24/job-board-api.git
    cd job-board-api
    ```

2. Install dependencies:

    ```bash
    composer install
    ```

3. Set up your environment variables:
   - Copy the `.env.example` file to `.env`:

    ```bash
    cp .env.example .env
    ```

4. Generate the application key:

    ```bash
    php artisan key:generate
    ```

5. Run the migrations:

    ```bash
    php artisan migrate
    ```

6. Start the development server:

    ```bash
    php artisan serve
    ```

## API Documentation

### User Authentication

- **Register:**

    - Endpoint: `POST /register`
    - Body:
    
        ```json
        {
            "name": "Shiba Khan",
            "email": "shiba@gmail.com",
            "password": "password",
        }
        ```
    
    - Response:
    
        ```json
        {
            "token": "1|LBPTBQQoPI1ByCQkSUGY05aT2J4KwXti2UzfuhUfac327bdb",
        "user": {
            "name": "Shiba Khan",
            "email": "shiba@gmail.com",
            "updated_at": "2024-08-26T10:34:13.000000Z",
            "created_at": "2024-08-26T10:34:13.000000Z",
            "id": 2
            }
        }
        ```

- **Login:**

    - Endpoint: `POST /login`
    - Body:
    
        ```json
        {
            "email": "shiba@gmail.com",
            "password": "password"
        }
        ```
    
    - Response:
    
        ```json
        {
            "token": "1|LBPTBQQoPI1ByCQkSUGY05aT2J4KwXti2UzfuhUfac327bdb",
        "user": {
            "name": "Shiba Khan",
            "email": "shiba@gmail.com",
            "updated_at": "2024-08-26T10:34:13.000000Z",
            "created_at": "2024-08-26T10:34:13.000000Z",
            "id": 2
            }
        }
        ```

### Job Listings

- **Create a new job:**

    - Endpoint: `POST /jobs`
    - Body:
    
        ```json
        {
            "title": "Software Engineer",
            "description": "Develop and maintain web applications.",
            "company": "Joistic Technologies",
            "location": "Remote",
            "salary": "45000"
        }
        ```

- **Get all jobs:**

    - Endpoint: `GET /jobs`

    - **Fetch a specific job by ID:**

    - Endpoint: `GET /api/jobs/{id}`

     - **Update a job by ID:**

    - Endpoint: `PUT /api/jobs/{id}`

- **Delete a job by ID:**

    - Endpoint: `DELETE /api/jobs/{id}`

### Job Applications

- **Apply for a job:**

    - Endpoint: `POST /apply`
    - Body:
    
        ```json
        {
            "user_id" : 1,
            "job_id" : 1,
            "cover_letter": "I am excited to apply for this position.",
            "status": "Applied"
        }
        ```

 - **Fetch the Job against the user id:**

    - Endpoint: `GET /api/showUserJobs`

     - **Fetch the Job Application data:**

    - Endpoint: `GET /index`

- **Fetch the job application against the job id:**

    - Endpoint: `GET /get_applied_job_against_jobid`

## Running Tests
