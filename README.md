# Login & Registration System (OOP PHP + PDO)

A user registration and login system written in object-oriented PHP using PDO prepared statements, with session-protected pages, a user list and profile editing.

![PHP](https://img.shields.io/badge/PHP-OOP-777BB4?logo=php&logoColor=white) ![MySQL](https://img.shields.io/badge/MySQL-PDO-4479A1?logo=mysql&logoColor=white) ![Bootstrap](https://img.shields.io/badge/Bootstrap-4-7952B3?logo=bootstrap&logoColor=white)

## Overview

Built in May 2021 as a learning project to practice OOP PHP, PDO and session-based authentication.

## Features

- Registration with validation: required fields, username length (3+), allowed username characters, email format and duplicate-email check
- Login by email and password with session-based authentication
- `Session` helper class: init, get/set, protected-page check, redirect when already logged in, logout
- User list on the dashboard after login
- Profile page per user (`profile.php?id=`); users can edit only their own name, username and email
- PDO with prepared statements and exception error mode
- Bootstrap-based UI with Bootstrap alert messages

## Tech Stack

- PHP (OOP, sessions)
- MySQL via PDO
- Bootstrap 4, jQuery, Font Awesome

## Getting Started

1. Copy the project to your web root, e.g. `htdocs/Login_registration_oop_php`.
2. Create a database named `db_lr` and a users table:

   ```sql
   CREATE TABLE tbl_users (
     id INT AUTO_INCREMENT PRIMARY KEY,
     name VARCHAR(100) NOT NULL,
     username VARCHAR(100) NOT NULL,
     email VARCHAR(150) NOT NULL,
     password VARCHAR(255) NOT NULL
   );
   ```

3. Adjust the connection settings in `lib/Database.php` if your credentials differ.
4. Open `http://localhost/Login_registration_oop_php/register.php`, create an account and log in.

## Project Structure

```text
index.php      # Dashboard: user list (login required)
register.php   # Sign-up form
login.php      # Login form
profile.php    # View / edit profile
lib/
├── Database.php  # PDO connection
├── Session.php   # Session helpers
└── User.php      # Registration, login, user queries, update
inc/           # header, footer
assets/        # CSS, JS, fonts
```

## Author

Built by **Ashraf Siddik**, Shopify developer & CRO specialist.
- Website: [ashraf-siddik.com](https://ashraf-siddik.com)
- GitHub: [@coderasraf](https://github.com/coderasraf)
