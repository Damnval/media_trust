# Media Trust Coding Exam

This repository is a coding exam for media trust company that can Register, Login, and perform Crud Operations.

## Installation

Clone the repository 

```bash
git clone https://github.com/Damnval/media_trust.git
```

## Install dependencies

Go to project folder and run 

```bash
composer install
```

## Development Setup

```bash
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```
