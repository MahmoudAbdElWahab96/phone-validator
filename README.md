<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/PHP-8.3-blue" alt="PHP">
  <img src="https://img.shields.io/badge/Laravel-10-red" alt="Laravel">
  <img src="https://img.shields.io/badge/Docker-Supported-blue" alt="Docker">
  <img src="https://img.shields.io/badge/Architecture-Clean%20Code-success" alt="Clean Code">
</p>

# 📱 Phone Validator

A **Phone Number** Validator built with Laravel, designed using Clean Architecture,
the Repository Pattern, and the Strategy Pattern for scalable, country-based phone validation.

This project was implemented as a technical assessment and real-world reference,
with a strong focus on Object-Oriented Programming (OOP), SOLID principles,
clean code, and long-term maintainability, rather than UI complexity.

---

## ✨ Features

- ✅ Country-based phone number validation
    - Validates phone numbers based on country-specific rules and formats.

- ✅ Strategy Pattern for phone validators
    - Each country validator is isolated and interchangeable.
    - New countries can be added without modifying existing logic.

- ✅ Validator Resolver with service container tagging
    - Automatically resolves the correct validator at runtime.
    - Fully compliant with the Open/Closed Principle (OCP).

- ✅ Clean Architecture & SOLID principles
    - Clear separation between Controllers, Services, Repositories, and Filters.
    - Business logic is framework-agnostic and easy to test.

- ✅ Repository Pattern for data access
    - Abstracts data source logic and keeps controllers thin.
    - Easily replaceable or extendable data storage.

- ✅ Advanced filtering
    - Filter phone numbers by:
        - Country
    - Validation state (OK / NOK)

- ✅ Manual pagination using LengthAwarePaginator
    - Supports pagination after in-memory filtering.
    - Fully compatible with Laravel pagination views and query strings.

- ✅ Caching for performance optimization
    - Phone validation results are cached to reduce repeated computations.
    - Improves performance for large datasets.

- ✅ Docker-ready setup
    - Fully containerized for consistent development environments.
    - One-command startup using Docker Compose.

- ✅ Scalable & maintainable codebase
    - Designed as a real-world production-ready example.
    - Easy to extend, refactor, and test.

---

## 🌍 Supported Countries

| Country | Code |
|-------|------|
| Cameroon | +237 |
| Ethiopia | +251 |
| Morocco | +212 |
| Mozambique | +258 |
| Uganda | +256 |

---

## 🧱 Tech Stack

- PHP 8.3
- Laravel
- Nginx
- Docker & Docker Compose
- SQLite 3

---

# 🚀 Installation

## Option 1: Using Docker (Recommended)

### Requirements
- Docker
- Docker Compose

### Steps

```bash
git clone https://github.com/your-username/phone-validator.git
cd phone-validator
cp .env.example .env
docker-compose up -d --build
``` 

## Option 2: Run Without Docker

This option allows you to run the project directly on your local machine without using Docker.

---

### 📌 Requirements

Make sure you have the following installed:

- PHP **8.3**
- Composer
- SQLite **3**
- Web server (Apache / Nginx) **or** Laravel built-in server

---

### 🔹 Step 1: Clone the Repository

```bash
git clone https://github.com/your-username/phone-validator.git
cd phone-validator
composer install
cp .env.example .env

.env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=phone_validator
DB_USERNAME=root
DB_PASSWORD=


php artisan key:generate
php artisan migrate
php artisan serve
http://127.0.0.1:8000
```

- ✅ Notes
    - Make sure storage/ and bootstrap/cache/ are writable
