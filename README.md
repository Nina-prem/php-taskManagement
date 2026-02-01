# 🗂️ Task Management System (Laravel)

A full-stack Task Management application built with **Laravel**, featuring **API-based CRUD operations**, **authentication using Laravel Breeze**, and a clean UI for managing tasks efficiently.

---

## 🚀 Features

- User authentication (Login / Register / Logout)
- API-based CRUD operations for tasks
- Task status management (Pending, In Progress, Completed)
- Due date tracking
- Secure routes using authentication middleware
- Clean and responsive UI
- RESTful API design

---

## 🛠️ Tech Stack

- **Backend:** Laravel 12
- **Authentication:** Laravel Breeze
- **API:** RESTful API (JSON)
- **Frontend:** Blade Templates + CSS
- **Database:** MySQL
- **Version Control:** Git & GitHub

---

## 🔐 Authentication

This project uses **Laravel Breeze** for authentication, providing:

- User registration
- User login
- Auth-protected routes

---

## 📡 API Endpoints

| Method | Endpoint | Description |
|------|---------|------------|
| GET | `/api/tasks` | Get all tasks |
| POST | `/api/tasks` | Create a new task |
| GET | `/api/tasks/{id}` | Get single task |
| PUT | `/api/tasks/{id}` | Update task |
| DELETE | `/api/tasks/{id}` | Delete task |

All API routes are protected using **Sanctum authentication**.



## 📂 Project Structure

