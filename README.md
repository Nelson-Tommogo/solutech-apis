# 🛠️ Solutech EventsHub – Laravel API Backend

This is the backend API for the **Solutech EventsHub** application – a multi-tenant event management platform for African tech communities.

The backend is built using **Laravel 11**, following clean architecture principles, and is designed to support multiple organizations with isolated data management, event scheduling, and attendee registrations.

---

## ⚙️ Features

### 🏢 Organization Management
- Admins can create and manage their own organization.
- Each organization is uniquely identified by a **slug** used in URLs (e.g., `/org-name/events`).

### 🎫 Event Management
- Create, update, soft-delete, and restore events.
- Event model includes:
  - `title`
  - `description`
  - `venue`
  - `date`
  - `price`
  - `max_attendees`

### 👥 Attendee Management
- View and manage attendees per event.
- Store:
  - `name`
  - `email`
  - `phone`

### 🔒 Authentication
- Secure login system for organization admins using email and password.
- Each admin has scoped access to only their organization's data.

### 🔐 Multi-Tenancy
- Data is **isolated per organization** using path-based routing:  
  Example: `/api/org-slug/events`
- Supports custom middleware to handle organization context resolution.

### 📝 Activity Logs & Soft Deletes
- Track event creation and updates.
- Deleted events are soft-deleted and can be restored.

---

## 🌍 Database

- **MySQL database hosted on cPanel**.
- Follows normalized schema for organizations, admins, events, and attendees.

> ⚠️ **Note:** The backend API is fully tested and functional, but was not hosted in time for this submission.

---

## 📁 API Endpoints Overview

> Full API documentation is available via Postman Collection (or Swagger – optional if implemented).

### Authentication
- `POST /api/login` – Admin login
- `POST /api/logout` – Logout

### Organization Routes
- `POST /api/organizations` – Create a new organization

### Event Routes (per organization)
- `GET /api/{org}/events` – List events
- `POST /api/{org}/events` – Create event
- `PUT /api/{org}/events/{id}` – Update event
- `DELETE /api/{org}/events/{id}` – Soft delete
- `GET /api/{org}/events/deleted` – View soft-deleted events
- `POST /api/{org}/events/{id}/restore` – Restore event

### Attendee Routes
- `POST /api/{org}/events/{id}/register` – Register a new attendee
- `GET /api/{org}/events/{id}/attendees` – List attendees for an event

---

## 🧱 Tech Stack

- **Laravel 11**
- **PHP 8.3**
- **MySQL (CPanel-hosted)**
- **Sanctum (optional for auth)**
- **Laravel Activitylog (for change tracking)**
- **Custom middleware** for multi-tenancy routing via org slug

---

## 📦 Architecture & Patterns

- Clean architecture with **Repositories** and **Service classes**
- Route groups and middleware for multitenancy
- Configurable guards for admin roles
- Optional integration with packages like `spatie/laravel-activitylog`

---

## 🚀 Setup Instructions (Local)

```bash
# Clone the repo
git clone https://github.com/Nelson-Tommogo/solutech-apis.git
cd solutech-apis

# Install dependencies
composer install

# Create .env from example
cp .env.example .env

# Generate app key
php artisan key:generate

# Set database credentials in .env
# DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD

# Run migrations
php artisan migrate

# (Optional) Seed sample data
php artisan db:seed

# Serve the app
php artisan serve
