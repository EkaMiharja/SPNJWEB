# SPNJWeb

A simple PHP + MySQL application running on XAMPP that provides user registration, login, a user dashboard, admin management views, and data entry for user profiles.

## Overview

- Frontend: Vanilla HTML/CSS/JS (Bootstrap on admin, custom styles elsewhere)
- Backend: PHP (procedural) with MySQLi prepared statements
- Database: MariaDB/MySQL (sample schema included)

## Features

- User registration and login with hashed passwords
- Role-aware navigation (admin vs user view)
- Admin pages to view login history, registration history, and user data
- User page to update personal profile details
- JSON-based API endpoints for frontend fetch requests

## Prerequisites

- XAMPP (Apache + MySQL/MariaDB) installed on Windows
- PHP 8+ recommended (XAMPP bundle)
- A browser (Chrome/Edge/Firefox)

## Getting Started (XAMPP)

1. Install XAMPP and start services:
   - Open XAMPP Control Panel and start: Apache, MySQL.
2. Place the project folder:
   - Copy the entire `SPNJWeb` folder into `C:/xampp/htdocs/`.
   - The app will then be available at `http://localhost/SPNJWeb`.

## Database Setup

There is a ready-to-import SQL dump at `asset/auth_db.sql`.

Steps using phpMyAdmin:

1. Open `http://localhost/phpmyadmin`.
2. Create a new database named `auth_db`.
3. Go to the new database, choose the Import tab.
4. Select `SPNJWeb/asset/auth_db.sql` and run Import.
   - This creates tables `users` and `datauser` with demo rows and constraints.

Alternatively using CLI (if MySQL client is available):

```bash
mysql -u root -p -h 127.0.0.1 -P 3306 < asset/auth_db.sql
```

Adjust host/port if your MySQL runs on a different port (e.g., 3308).

## Configuration

Configure database connection in `config.php`:

- `host`: database host (e.g., `127.0.0.1` or `localhost`)
- `user`: MySQL username (default XAMPP user is `root`)
- `pass`: MySQL password (often empty on local XAMPP)
- `db`: database name (e.g., `auth_db`)
- `port`: MySQL port (`3306` is default; change if your setup uses `3308`)

Example:

```php
$host = "127.0.0.1";
$user = "root";
$pass = "";
$db   = "auth_db";
$port = 3306; 
```

If connection fails, endpoints will return JSON error and HTTP 500. Check MySQL service, credentials, and port.

## Running the App

1. Start Apache and MySQL in XAMPP.
2. Visit the app:
   - `http://localhost/SPNJWeb/index.php` for Login/Register page
3. Log in with an existing email from `users` table or register a new account.
4. On successful login:
   - Admin goes to `admin.html`
   - Regular user goes to `dashboard.php`

## Pages and Their Functions

- `index.php`: Combined Login and Register UI (switching tabs via `script.js`). Submits to `login.php` and `register.php` using `fetch()` and processes JSON responses.
- `login.php`: Auth endpoint. Accepts POST (`email`, `password`), verifies hashed password, sets session (`username`, `role`), returns JSON: `{status, role, message}`.
- `register.php`: Registration endpoint. Accepts POST (`username`, `email`, `password`), hashes password, checks for existing email, inserts into `users`, returns JSON: `{status, message}`.
- `dashboard.php`: User landing page after login. Displays menu items, carousel, and navigation controls to Recent (`recent.html`), Explore (`explore.html`), and User (`user.php`) sections.
- `admin.html`: Admin dashboard (Bootstrap). Displays tabs:
  - Login History (fetches `get_login_history.php`)
  - Register History (fetches `get_register_history.php`, add/edit via `add_register.php`/`edit_register.php`, delete via `delete_register.php`)
  - Data User (fetches `get_datauser.php`, delete via `delete_user.php`)
- `user.php`: User profile form (first/last name, birth date, email, gender, phone, password, address). Submits to `save_user.php`. Shows success alert via query parameter.
- `explore.html`: Explore view (static UI). Navigates via top nav.
- `recent.html`: Recent/cart history view (uses localStorage + top nav).
- `pesanan.html`: "My Orders" view (linked from User profile card).

## API Endpoints (JSON)

- `login.php` (POST): `{ email, password }` → `{ status, role, message }`
- `register.php` (POST): `{ username, email, password }` → `{ status, message }`
- `get_login_history.php` (GET): Returns list of login records, using `users.created_at` as `login_time`.
- `get_register_history.php` (GET): Returns list of users with `created_at`.
- `get_datauser.php` (GET): Returns list of rows from `datauser`.
- `add_register.php` (POST): `{ username, email, password }` → inserts user; JSON status.
- `edit_register.php` (POST): `{ id, username, email, [password] }` → updates user; JSON status.
- `delete_register.php` (POST): `{ id }` → deletes user; JSON status.
- `delete_user.php` (POST): `{ id }` → deletes row in `datauser`; JSON status.
- `save_user.php` (POST): Saves a row to `datauser` then redirects to `user.php?success=true`.

## Frontend Scripts

- `script.js`: Controls Login/Register UI transitions and submits login/register via `fetch`. It validates HTTP responses before parsing JSON to avoid parse errors.
- `user.js`: Handles navigation between main sections, updates a global cart badge from `localStorage`, and manages success alert behavior on `user.php`.

## Quick Test (Optional)

Use curl to quickly test endpoints during setup:

```powershell
# Register
curl -X POST http://localhost/SPNJWeb/register.php -H "Content-Type: application/x-www-form-urlencoded" -d "username=test&email=test@example.com&password=secret"

# Login
curl -X POST http://localhost/SPNJWeb/login.php -H "Content-Type: application/x-www-form-urlencoded" -d "email=test@example.com&password=secret"
```

Expected: JSON responses with `status` and `message`. If you see HTML instead of JSON, check `config.php` DB settings and ensure Apache/PHP errors are not printed to output.

## Troubleshooting

- JSON parse error on frontend: Usually indicates server returned HTML (PHP warning/fatal). Verify DB connection in `config.php`, ensure `Content-Type: application/json` headers are present on API scripts.
- Cannot connect to DB: Check XAMPP MySQL service, database exists (`auth_db`), user/password, and port (`3306` vs `3308`).
- Access flow not redirecting: Frontend controls redirects after successful login. Ensure `login.php` returns JSON with `status="success"` and `role` set appropriately.

## Security Notes

- Passwords are stored using `password_hash()`; verification via `password_verify()`.
- Sessions are used to track logged-in users (`$_SESSION['username']`, `$_SESSION['role']`).
- All DB writes use prepared statements to mitigate SQL injection.

---

This project is intended for learning/demo purposes on local XAMPP. For production, consider environment-based configuration, stricter validation, CSRF protection, and role management.
