# MyStore — Laravel E-Commerce Backend

A relational product-catalog backend built with **Laravel 11** and **MySQL**. It models a five-table e-commerce catalog (products, categories, colors, sizes, brands) with foreign-key relationships, and exposes full resource-based CRUD for every entity.

## Tech Stack

- **Framework:** Laravel 11
- **Database:** MySQL / MariaDB
- **PHP:** 8.2+

## Schema

Five related tables, with `products` holding foreign keys into the other four:

| Table        | Key columns                                                                 |
|--------------|-------------------------------------------------------------------------------|
| `categories` | `name`, `status`                                                              |
| `colors`     | `name`, `status`                                                              |
| `sizes`      | `name`, `status`                                                              |
| `brands`     | `name`, `status`                                                              |
| `products`   | `sku`, `name`, `description`, `barcode`, `price`, `sale_price`, `sale`, `stock`, `weight`, `width`, `height`, `length`, `vat`, plus `category_id`, `color_id`, `size_id`, `brand_id` (FKs) |

All tables are created and versioned through Laravel migrations — see `database/migrations/`.

## Features

- Eloquent models with `belongsTo` / `hasMany` relationships across all five tables
- Resource-based CRUD (`Route::resource`) for every entity — index, create, store, edit, update, destroy
- Server-side request validation on every store/update action (required fields, numeric bounds, `exists:` checks on foreign keys, `enum`-backed status fields)
- Blade views for listing, creating, and editing each entity

## Getting Started

### Prerequisites

- PHP 8.2+
- Composer
- MySQL/MariaDB — via [XAMPP](https://www.apachefriends.org/) (Windows/macOS) or a standalone install
- A GUI client like [DBeaver](https://dbeaver.io/) to manage the database (optional but handy)

> **Using XAMPP?** Open the XAMPP Control Panel and start the **MySQL** module (Apache isn't required — `php artisan serve` runs its own server). Default credentials are `root` with no password, and MySQL listens on port `3306`.

### Setup

```bash
git clone https://github.com/soniapeiov/MyStore.git
cd MyStore
composer install
cp .env.example .env
php artisan key:generate
```

Create a database named `mystore` — a few ways to do this:

- **XAMPP:** with MySQL running, open **phpMyAdmin** from the Control Panel → **Databases** tab → create `mystore`.
- **MySQL CLI:**
  ```sql
  CREATE DATABASE mystore;
  ```
- **DBeaver:** right-click your MySQL connection → **Create New Database** → name it `mystore`.

Update `.env` with your database credentials:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mystore
DB_USERNAME=root
DB_PASSWORD=yourpassword
```

Run the migrations:

```bash
php artisan migrate
```

Start the dev server:

```bash
php artisan serve
```

Visit `http://127.0.0.1:8000` — start by adding a few categories, colors, sizes, and brands before creating products, since products require those foreign keys.

## Inspecting the Database

If you use DBeaver, connect to your local MySQL instance and open the `mystore` database — the ER view (right-click the database → **View Diagram**) is a quick way to confirm the `products` foreign keys are wired up correctly after migrating.

## Routes

Run `php artisan route:list` to see the full set of generated resource routes for `products`, `categories`, `colors`, `sizes`, and `brands`.

## License

This project was built as part of an academic assignment (Programação Web Servidor, ISLA).
