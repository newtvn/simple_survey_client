# README.md for Simple Survey Client Application

## Overview

The Simple Survey Client Application is a web-based platform designed to collect survey responses and manage certificate uploads. This repository contains the frontend and backend components necessary to set up the application.

## Features

- Frontend survey form for user input
- Backend REST API for processing GET and POST requests
- File upload handling
- Pagination of survey responses
- Asynchronous data submission with JavaScript `fetch` API

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

- PHP 7.4 or newer
- MySQL 5.7 or newer
- Web server like Apache or Nginx

### Installing

1. Clone the repository to your local machine or download the zip file and extract it in your web server's root directory, e.g., `C:/xampp/htdocs/`.
2. Configure your web server to point to the `simple_survey_client` directory.
3. Import the SQL file to create the database schema in MySQL.
4. Update the database connection settings in the `api.php` file if needed.

### Running the Application

1. Start your web server and MySQL service.
2. Open your web browser and navigate to `http://localhost/simple_survey_client/survey_form.php` to access the survey form.
3. Fill out the form and submit to see the responses being saved and listed.

## API Endpoints

- `GET /api.php`: Fetches a paginated list of survey responses.
- `POST /api.php`: Accepts survey responses and handles file uploads.

## File Structure

- `survey_form.php`: Frontend HTML form for submitting survey responses.
- `api.php`: Backend PHP script that provides REST API endpoints.
- `uploads/`: Directory for storing uploaded certificate files.

## Usage

Use the provided Postman collection to test the API endpoints and ensure they are functioning as expected.

## Built With

- [Bootstrap](https://getbootstrap.com/) - The web framework used for styling.
- [PHP](https://www.php.net/) - Server-side scripting language used.
- [MySQL](https://www.mysql.com/) - Database used to store survey data.

## License

This project is licensed under the MIT License - see the `LICENSE.md` file for details.

