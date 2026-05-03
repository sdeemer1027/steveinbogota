# Steve in Bogotá - Laravel RBAC Admin System

## 📌 Overview

Steve in Bogotá is a Laravel-based role-based access control (RBAC) admin system designed as a foundation for scalable SaaS applications.

It provides a secure backend architecture for managing users, roles, and permissions, along with a dynamic admin interface built using Laravel, Bootstrap, jQuery, and AJAX-driven UI updates.

---

## 🧠 Core Concept

User → Roles → Permissions

This system enforces structured access control where:
- Users are assigned one or more roles
- Roles define a set of permissions
- Permissions control access to application features

---

## ✨ Key Features

### 🔐 Authentication
- Laravel Breeze authentication system
- Secure login and session handling
- Password encryption and user management

---

### 🧩 Role-Based Access Control (RBAC)

- Fully relational RBAC system
- Many-to-many relationships between users and roles
- Many-to-many relationships between roles and permissions
- Database-driven access control layer

---

### 🛠 Admin Panel

A protected administration area with:

- User management
- Role management
- Permission management
- Real-time role assignment via modal interface
- AJAX-powered updates without page refresh

---

### ⚡ Live UI System

- Dynamic updates without page reloads
- Modal-based editing system
- Toast notification feedback system
- Bootstrap-based responsive UI

---

### 🔒 Security Model

- Middleware-protected routes (`auth`, `is_admin`)
- Role-based access enforcement
- Permission-based authorization structure (foundation for Gates/Policies)

---

## 🗄 Architecture Summary

- Laravel MVC architecture
- Pivot-table RBAC system
- Controller-driven logic (service layer ready for future upgrade)
- jQuery + Bootstrap frontend interaction layer
- MySQL relational structure

---

## 📊 Project Status

### ✅ Completed
- Authentication system
- RBAC database structure
- Admin panel structure
- User-role assignment (AJAX modal)
- Role-permission assignment
- Live UI updates (no refresh)
- Toast notification system

---

### 🚧 In Progress / Next Phase
- Permission enforcement via Gates/Policies
- UI-level permission hiding
- Admin dashboard enhancements
- Activity logging system
- Modular JavaScript architecture refactor
- API-ready backend layer

---

## 👨‍💻 Author

Steve in Bogotá Project  
Dr. Steven Deemer  
