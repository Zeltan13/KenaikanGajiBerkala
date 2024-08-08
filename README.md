# Kenaikan Gaji Berkala

![License](https://img.shields.io/badge/license-MIT-blue.svg)
![PHP](https://img.shields.io/badge/PHP-8.x-brightgreen.svg)
![MySQL](https://img.shields.io/badge/MySQL-8.x-blue.svg)
![CSS](https://img.shields.io/badge/CSS-3.0-blue.svg)
![HTML](https://img.shields.io/badge/HTML-5-red.svg)
![JavaScript](https://img.shields.io/badge/JavaScript-ES6-yellow.svg)

## Description

Kenaikan Gaji Berkala is a web application designed to manage periodic salary increases for civil servants. Developed for the Human Resources and Development Agency (BPKSDM) of Bandung City, this application allows users and administrators to view and manage salary adjustments efficiently.

## Features

- **User Management**: 
  - **User Roles**: Different access levels for employees and administrators.
  - **User Authentication**: Secure login and session management.

- **Salary Management**:
  - **View Salary Records**: Access current and historical salary information.
  - **Manage Salary Adjustments**: Admins can update and approve salary changes.

- **Reporting**:
  - **Generate Reports**: Create and export reports on salary adjustments and other key metrics.

## Technologies Used

- **Frontend**: HTML, CSS
- **Backend**: PHP
- **Database**: MySQL

## Installation

To set up the project locally, follow these steps:

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/yourusername/kenaikan-gaji-berkala.git
   cd kenaikan-gaji-berkala
2. **Install Dependencies**:
   ```bash
   composer install
3. **Configure the Database**:
   - Import the provided SQL file to set up the database schema.   
3. **Configure Environment Variables**:
   - Copy the .env.example file to .env.
   - Update database credentials and other configurations as needed.
4. **Run Migrations**:
    ```bash
    php artisan migrate
5. **Start the Development Server**:
    ```bash
    php artisan serve
6. **Access the Application**:
   - Open your browser and go to http://localhost:8000.

