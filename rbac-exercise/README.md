# RBAC Exercise - Role-Based Access Control in PHP

## Overview

In this exercise you will implement role-based access control (RBAC) for a simple PHP application. There are three roles: **user**, **editor**, and **admin**. Each role has different levels of access.

| Role   | Dashboard | Editor Panel | Admin Panel |
|--------|-----------|--------------|-------------|
| user   | Yes       | No           | No          |
| editor | Yes       | Yes          | No          |
| admin  | Yes       | Yes          | Yes         |

## Setup

1. Import `database/schema.sql` into your MySQL database
2. Update the credentials in `config/database.php` if needed
3. Start your PHP server


## Instructions

Complete the files in this order:

### 1. `auth/roles.php`
Create four functions: `isAdmin()`, `isEditor()`, `isUser()`, and `isGuest()`.

### 2. `login.php`
Query the database, verify the password, store the user's details in the session, and redirect to the dashboard.

### 3. `dashboard.php`
Protect this page so only logged-in users can access it.

### 4. `editor.php`
Protect this page so only editors and admins can access it.

### 5. `admin.php`
Protect this page so only admins can access it.

## File Structure

```
rbac-exercise/
  config/database.php   - Database connection (done)
  database/schema.sql   - SQL to create the users table (done)
  auth/roles.php        - Role-checking functions (you fill in)
  login.php             - Login form and logic (you fill in)
  dashboard.php         - All logged-in users (you fill in)
  editor.php            - Editors and admins only (you fill in)
  admin.php             - Admins only (you fill in)
  no-access.php         - Access denied page (done)
  logout.php            - Destroys session (done)
  style.css             - Styling (done)
```

## How It All Ties Together

The RBAC system works through a chain of files that each handle a specific responsibility:

1. **`database/schema.sql`** creates the users table with a `role` column. Every user is assigned one of three roles: `user`, `editor`, or `admin`. A constraint ensures no other values can be inserted.

2. **`config/database.php`** creates the `$pdo` connection. Instead of writing the database connection code in every file, we write it once here and use `require_once` to include it wherever we need it.

3. **`login.php`** uses `$pdo` to query the database for the user by email, verifies the password with `password_verify()`, and stores the user's `id`, `email`, and `role` in `$_SESSION['user']`. This is the only place we touch the database for authentication — every other page just reads from the session.

4. **`auth/roles.php`** contains helper functions (`isAdmin()`, `isEditor()`, `isUser()`, `isGuest()`) that check `$_SESSION['user']['role']`. These functions are the core of the RBAC system. Notice that `isEditor()` returns true for both editors AND admins, because admins inherit all editor permissions.

5. **`dashboard.php`**, **`editor.php`**, and **`admin.php`** each include `auth/roles.php` and call the appropriate role function at the top of the page. If the user doesn't have the right role, they get redirected to `no-access.php`. This is where the access control actually gets enforced.

6. **`logout.php`** destroys the session, which clears `$_SESSION['user']` and effectively logs the user out. After that, `isUser()` returns false and `isGuest()` returns true, so protected pages will redirect them away.

The flow: **Database** → **Login** (stores role in session) → **Role functions** (check the session) → **Protected pages** (call the role functions to allow or deny access).
