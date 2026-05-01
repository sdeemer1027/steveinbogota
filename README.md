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

