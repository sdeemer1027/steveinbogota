# Steve in Bogotá - Laravel Application

## Overview

This is a Laravel-based web application built using:

- PHP 8.0
- Laravel Framework
- MySQL 8.x
- Composer
- Laravel Breeze (authentication)
- Role-Based Access Control (RBAC)

The system is currently in early development and focuses on:
- User authentication
- Role management (Admin / User)
- Secure admin area
- Expandable permission system

---

## Features (Current Phase)

### Authentication
- User registration
- Login / Logout
- Password hashing
- Session-based authentication (Laravel Breeze)

### Role System (RBAC)
- Users can have multiple roles
- Roles stored in `roles` table
- Pivot table: `role_user`
- Admin role implemented

### Admin Security Layer
- Middleware: `is_admin`
- Protected `/admin` route group
- Only admin users can access admin dashboard

### Database
- MySQL 8.x
- Clean migration-based schema
- Seeder support for initial admin setup

---

## Default Admin Account (Development Only)
Email: admin@local.com

Password: password123


