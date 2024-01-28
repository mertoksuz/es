# Email Search Project

This project allows users to search for email addresses associated with a person's name, company name, and/or LinkedIn profile URL using three different providers. The search stops when at least one valid email address is found from any of the providers.

## Installation

### Prerequisites

- [Docker](https://www.docker.com/get-started)

### Steps

1. **Clone the Repository:**

   ```bash
   git clone <repository_url>
   cd email-search

2. **Copy env**
   ```bash
   cp .env.example .env

3. **Build Composer**
   ```bash
   docker-compose up --build
   
4. **Run Migrations**
   ```bash
   docker-compose exec web php artisan migrate
   
5. **Open Application**
   
   Access the Application:
   Open your browser and visit [http://localhost:8080](http://localhost:8080) to access the application.

   Example Search:
   http://localhost:8080/search?name=beecoded&company=beecoded&linkedin_url=https://www.linkedin.com/in/mrtoksz/
