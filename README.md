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
            "password": "######",
        }
        ```
    
    - Response:
    
        ```json
        {
            "token": "token########",
        "user": {
            "name": "Shiba Khan",
            "email": "shiba@gmail.com",
            "updated_at": "2024-08-26T10:34:13.000000Z",
            "created_at": "2024-08-26T10:34:13.000000Z",
            "id": 3
            }
        }
        ```

- **Login:**

    - Endpoint: `POST /login`
    - Body:
    
        ```json
        {
            "email": "shiba@gmail.com",
            "password": "######"
        }
        ```
    
    - Response:
    
        ```json
        {
            "token": "token########",
        "user": {
            "name": "Shiba Khan",
            "email": "shiba@gmail.com",
            "updated_at": "2024-08-26T10:34:13.000000Z",
            "created_at": "2024-08-26T10:34:13.000000Z",
            "id": 3
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
    - Response:
        ```json
                {
                "success": true,
                "message": "Job Listing Created Successfully"
                }
            ```
- **Get all jobs:**

    - Endpoint: `GET /jobs`
       http://localhost/job_board_api/public/api/jobs
    - Response:
        ```json
                 {
                "id": 1,
                "user_id": 1,
                "title": "Software Engineer",
                "description": "Develop and maintain web applications.",
                "company": "Joistic Technologies",
                "location": "Remote",
                "salary": "55000",
                "created_at": "2024-08-25T17:12:44.000000Z",
                "updated_at": "2024-08-26T06:47:27.000000Z"
            },
            {
                "id": 5,
                "user_id": 1,
                "title": "Web Developer",
                "description": "Develop and maintain web applications.",
                "company": "Joistic Technologies",
                "location": "Remote",
                "salary": "60000",
                "created_at": "2024-08-26T08:38:51.000000Z",
                "updated_at": "2024-08-26T09:37:25.000000Z"
            }
            ```

    

- **Fetch a specific job by ID:**

    - Endpoint: `GET /api/jobs/{id}`
    http://localhost/job_board_api/public/api/jobs/1
    - Response:
        ```json
                {
            "id": 1,
            "user_id": 1,
            "title": "Software Engineer",
            "description": "Develop and maintain web applications.",
            "company": "Joistic Technologies",
            "location": "Remote",
            "salary": "55000",
            "created_at": "2024-08-25T17:12:44.000000Z",
            "updated_at": "2024-08-26T06:47:27.000000Z"
            }
        ```
- **Update a job by ID:**

    - Endpoint: `PUT /api/jobs/{id}`
    - Body:
    
        ```json
        {
            "title": "Web Developer",
            "description": "Develop and maintain web applications.",
            "company": "Joistic Technologies",
            "location": "Remote",
            "salary": "55000"
        }
        ```
    - Response:
        ```json
                {
                "success": true,
                "message": "Job Listing Updated Successfully"
                }
            ```

- **Delete a job by ID:**

    - Endpoint: `DELETE /api/jobs/{id}`
     http://localhost/job_board_api/public/api/jobs/1

      - Response:
        ```json
                {
                "success": true,
                "message": "Job Listing Deleted Successfully"
                }
            ```


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

    http://localhost/job_board_api/public/api/showUserJobs?user_id=1

     - Body:
    
        ```json
        {
            "user_id": 1
        }
        ```

    - Response:
        ```json
                        {
            "user": {
                "id": 1,
                "name": "Shiba Khan",
                "email": "shiba12@gmail.com",
                "email_verified_at": null,
                "created_at": "2024-08-25T17:12:17.000000Z",
                "updated_at": "2024-08-25T17:12:17.000000Z",
                "jobs": [
                {
                    "id": 1,
                    "user_id": 1,
                    "title": "Software Engineer",
                    "description": "Develop and maintain web applications.",
                    "company": "Joistic Technologies",
                    "location": "Remote",
                    "salary": "55000",
                    "created_at": "2024-08-25T17:12:44.000000Z",
                    "updated_at": "2024-08-26T06:47:27.000000Z"
                },
                {
                    "id": 5,
                    "user_id": 1,
                    "title": "Web Developer",
                    "description": "Develop and maintain web applications.",
                    "company": "Joistic Technologies",
                    "location": "Remote",
                    "salary": "60000",
                    "created_at": "2024-08-26T08:38:51.000000Z",
                    "updated_at": "2024-08-26T09:37:25.000000Z"
                }
                ]
            }
            }
            ```


     - **Fetch the Job Application data:**

    - Endpoint: `GET /index`

     http://localhost/job_board_api/public/api/index

    - Response:
        ```json
                        {
            "id": 1,
            "user_id": 1,
            "job_id": 1,
            "cover_letter": "I am excited to apply for this position.",
            "status": "applied",
            "created_at": "2024-08-26T07:33:16.000000Z",
            "updated_at": "2024-08-26T07:48:21.000000Z",
            "user": {
            "id": 1,
            "name": "Shiba Khan",
            "email": "shiba12@gmail.com",
            "email_verified_at": null,
            "created_at": "2024-08-25T17:12:17.000000Z",
            "updated_at": "2024-08-25T17:12:17.000000Z"
            },
            "jobs": {
            "id": 1,
            "user_id": 1,
            "title": "Software Engineer",
            "description": "Develop and maintain web applications.",
            "company": "Joistic Technologies",
            "location": "Remote",
            "salary": "55000",
            "created_at": "2024-08-25T17:12:44.000000Z",
            "updated_at": "2024-08-26T06:47:27.000000Z"
            }
        },
        {
            "id": 2,
            "user_id": 1,
            "job_id": 1,
            "cover_letter": "I am excited to apply for this position.",
            "status": "applied",
            "created_at": "2024-08-26T09:56:00.000000Z",
            "updated_at": "2024-08-26T09:56:00.000000Z",
            "user": {
            "id": 1,
            "name": "Shiba Khan",
            "email": "shiba12@gmail.com",
            "email_verified_at": null,
            "created_at": "2024-08-25T17:12:17.000000Z",
            "updated_at": "2024-08-25T17:12:17.000000Z"
            },
            "jobs": {
            "id": 1,
            "user_id": 1,
            "title": "Software Engineer",
            "description": "Develop and maintain web applications.",
            "company": "Joistic Technologies",
            "location": "Remote",
            "salary": "55000",
            "created_at": "2024-08-25T17:12:44.000000Z",
            "updated_at": "2024-08-26T06:47:27.000000Z"
            }
        }
            ```

- **Fetch the job application against the job id:**

    - Endpoint: `GET /get_applied_job_against_jobid`

        http://localhost/job_board_api/public/api/get_applied_job_against_jobid?job_id=1

    - Body:
    
        ```json
        {
            "job_id": 1
        }
        ```

     - Response:
        ```json
                    {
        "get_applied_job_against_jobid": [
            {
            "id": 1,
            "user_id": 1,
            "job_id": 1,
            "cover_letter": "I am excited to apply for this position.",
            "status": "applied",
            "created_at": "2024-08-26T07:33:16.000000Z",
            "updated_at": "2024-08-26T07:48:21.000000Z",
            "user": {
                "id": 1,
                "name": "Shiba Khan",
                "email": "shiba12@gmail.com",
                "email_verified_at": null,
                "created_at": "2024-08-25T17:12:17.000000Z",
                "updated_at": "2024-08-25T17:12:17.000000Z"
            }
            },
            {
            "id": 2,
            "user_id": 1,
            "job_id": 1,
            "cover_letter": "I am excited to apply for this position.",
            "status": "applied",
            "created_at": "2024-08-26T09:56:00.000000Z",
            "updated_at": "2024-08-26T09:56:00.000000Z",
            "user": {
                "id": 1,
                "name": "Shiba Khan",
                "email": "shiba12@gmail.com",
                "email_verified_at": null,
                "created_at": "2024-08-25T17:12:17.000000Z",
                "updated_at": "2024-08-25T17:12:17.000000Z"
            }
            }
        ]
        }
            ```

