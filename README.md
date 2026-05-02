# Steve in Bogotá - Laravel RBAC Application

## Overview

This is a Laravel-based web application built with:

- PHP 8.0
- Laravel Framework
- MySQL 8.x
- Composer
- Laravel Breeze Authentication
- Custom Role-Based Access Control (RBAC) system

The project is currently in active development and focuses on building a secure, scalable admin system with roles and permissions.

---

## Current Features

### Authentication System
- User registration and login
- Secure password hashing
- Session-based authentication (Laravel Breeze)

---

### Role-Based Access Control (RBAC)

The system implements a full RBAC structure:
User → Roles → Permissions


### Roles
- Admin role (full access)
- User role (basic access)
- Roles can be created via admin panel

### Permissions
- Granular permission system
- Permissions can be assigned to roles
- Examples:
  - manage_users
  - manage_roles
  - manage_permissions

### Pivot Tables
- role_user (user-role relationship)
- permission_role (role-permission relationship)

---

## Admin Panel

Protected by middleware:
- `auth`
- `is_admin`

### Admin Features
- Dashboard (`/admin`)
- User Management
  - View users
  - Assign roles to users
- Role Management
  - Create roles
  - Assign permissions to roles
- Permission Management
  - Create permissions
  - View permissions list

---

## Default Admin Account (Development Only)
Email: admin@local.com

Password: password123





⚠️ Change this in production environments.

---

## Installation

### 1. Clone Repository
```bash
git clone https://github.com/YOUR_USERNAME/steveinbogota.git
cd steveinbogota
```

### 2. Install Dependencies
```bash
composer install
npm install
npm run dev
```

### 3.Environment Setup
```bash
cp .env.example .env
php artisan key:generate
```


## Configure .env:
```
DB_DATABASE=your_database
DB_USERNAME=your_user
DB_PASSWORD=your_password
```

Run Migrations + Seeders
php artisan migrate:fresh --seed

This will:

Create all tables
Create roles
Create permissions
Create admin user
Link roles to admin


Start Server
php artisan serve


Admin Routes
/admin
/admin/users
/admin/roles
/admin/permissions

All routes are protected by:

Authentication
Admin role middleware


Architecture
Backend Structure
MVC (Laravel standard)
Service-less design (controller-driven)
Pivot-table RBAC system
Middleware-based security


Database Design
users
roles
permissions
role_user
permission_role


Security Layer
Middleware: is_admin
Role checks via Eloquent relationships
Permission system foundation in place
Ready for gate/policy expansion



Current Status
Completed
 Laravel setup
 Authentication system
 Roles system
 Permissions system
 Admin panel structure
 User role assignment
 Role permission assignment


 Next Phase
 Permission enforcement (middleware/gates)
 UI permission restrictions
 Admin dashboard improvements
 Activity logging system

Author

Steve in Bogotá Project
dr.stevedeemer@gmail.com






