# Simple Survey Application

## Overview

This project comprises a web-based Survey application that allows users to respond to survey questions and view all responses. It is divided into three main components:

- **Database (`sky_survey_db`)**: A relational database designed to store survey questions and responses.
- **REST API**: An interface for interacting with the database to fetch questions, submit responses, and view submitted responses.
- **User Interface**: A web platform providing a user-friendly way to participate in surveys and view responses.

## Getting Started

### Prerequisites

- MySQL
- Node.js and npm (for the REST API and web client)
- Git

### Setting Up the Database

1. Install MySQL.
2. Create a database named `sky_survey_db`.
3. Import the SQL schema located in `database/sql_file.sql` to set up the necessary tables.

### Running the REST API

1. Clone the `simple-survey-api` repository.
2. Navigate to the cloned directory and install dependencies:
   ```bash
   npm install
   ```
3. Configure your database connection settings in `config/database.js`.
4. Start the server:
   ```bash
   npm start
   ```

### Setting Up the Web Client

1. Clone the `simple-survey-client` repository.
2. Navigate to the client directory and install dependencies:
   ```bash
   npm install
   ```
3. Adjust the API endpoint settings in `src/config/api.js` to point to your running API server.
4. Start the web client:
   ```bash
   npm start
   ```
5. Access the web client at `http://localhost:80` .

## API Documentation

Refer to the Postman Collection included in the repository for detailed endpoint documentation. The API supports:

- Fetching a list of survey questions (`GET /api/questions`)
- Submitting responses to questions (`PUT /api/questions/responses`)
- Fetching submitted responses, with support for pagination and filtering by email address (`GET /api/questions/responses`)
- Downloading certificates by ID (`GET /api/questions/responses/certificates/{id}`)

## User Interface

The web client features two main pages:

- **Survey Form**: Allows users to fill out the survey in a stepped format.
- **Survey Responses**: Displays submitted survey responses with pagination and filtering capabilities.

## Deployment

## Links

- GitHub Repository (API): [simple-survey-api](#)
- GitHub Repository (Client): [simple-survey-client](#)

## License

This project is licensed under the MIT License - see the LICENSE.md file for details.
