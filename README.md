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

**Phone Number Validator** built with **Laravel**, following **Clean Architecture**,  
**Repository Pattern**, and **Strategy Pattern** for country-based phone validation.

This project was designed as a **technical assessment / real-world scalable example**,  
focusing on **OOP, SOLID principles, and maintainability** rather than UI.

---

## ✨ Features

- ✅ Country-based phone number validation
- ✅ Strategy Pattern for each country validator
- ✅ Repository Pattern for data access
- ✅ Caching for performance optimization
- ✅ Pagination & filtering (country / state)
- ✅ Docker-ready environment
- ✅ Clean, testable, extendable architecture

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
- MySQL 8
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
- MySQL **8**
- Web server (Apache / Nginx) **or** Laravel built-in server

---

### 🔹 Step 1: Clone the Repository

```bash
git clone https://github.com/your-username/phone-validator.git
cd phone-validator
composer install
cp .env.example .env

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

✅ Notes

Make sure storage/ and bootstrap/cache/ are writable

Cache is enabled by default (TTL = 1 hour)

This setup is ideal for local development or code review
