# 💼 CareerLog

CareerLog is a job application tracking web application built with **Laravel**, **PostgreSQL**, **Blade**, **Tailwind CSS**, and **Alpine.js**.

This application helps users manage companies, job applications, application statuses, interview schedules, and notes in one simple dashboard.

---

## 🌐 Live Demo

CareerLog is deployed on Render:

https://careerlog.onrender.com

## ✨ Features

- User registration and login
- Logout
- Dashboard summary
- Company management
- Job application tracking
- Search companies
- Search and filter job applications
- Responsive layout for desktop, tablet, and mobile
- Modal-based create, edit, and detail views

---

## 🛠️ Tech Stack

| Technology | Description |
|---|---|
| Laravel | Backend framework |
| PostgreSQL | Database |
| Blade | Template engine |
| Tailwind CSS | UI styling |
| Alpine.js | Modal, dropdown, and sidebar interaction |
| Laravel Breeze | Authentication |
| Heroicons | Icons |
| Vite | Frontend bundler |

---

## 📌 Main Pages

### 🔐 Authentication

Users can register, login, and logout.

### 📊 Dashboard

The dashboard shows job application statistics, pipeline overview, recent applications, and upcoming interviews.

### 🏢 Companies

Users can manage company data.

Features:

- Add company
- Edit company
- View company detail
- Delete company
- Search company

### 📝 Job Applications

Users can manage job application data.

Features:

- Add application
- Edit application
- View application detail
- Delete application
- Search application
- Filter by status
- Filter by work model

---

## 🗄️ Database Tables

Main tables used in this project:

```text
users
companies
job_applications
````

### Relationships

```text
User
├── has many Companies
└── has many Job Applications

Company
└── has many Job Applications

JobApplication
├── belongs to User
└── belongs to Company
```

---

## 📁 Important Folder Structure

```text
app/
├── Http/Controllers/
│   ├── CompanyController.php
│   └── JobApplicationController.php
│
└── Models/
    ├── User.php
    ├── Company.php
    └── JobApplication.php

resources/views/
├── auth/
├── dashboard/
├── companies/
├── job-applications/
├── components/
└── dashboard.blade.php
```

---

## ⚙️ Installation

Clone the repository:

```bash
git clone https://github.com/your-username/careerlog.git
cd careerlog
```

Install PHP dependencies:

```bash
composer install
```

Install frontend dependencies:

```bash
npm install
```

Copy environment file:

```bash
cp .env.example .env
```

For Windows, you can copy `.env.example` manually and rename it to `.env`.

Generate application key:

```bash
php artisan key:generate
```

---

## 🧬 Environment Setup

Update your `.env` file:

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=careerlog
DB_USERNAME=postgres
DB_PASSWORD=your_password
```

Make sure the `careerlog` database already exists in PostgreSQL.

---

## 🧱 Run Migration

```bash
php artisan migrate
```

---

## ▶️ Run the Project

Start Laravel server:

```bash
php artisan serve
```

Start Vite:

```bash
npm run dev
```

Open in browser:

```text
http://127.0.0.1:8000
```

---

## 🧭 Main Routes

| Method    | URL                               | Description        |
| --------- | --------------------------------- | ------------------ |
| GET       | `/`                               | Redirect to login  |
| GET       | `/login`                          | Login page         |
| GET       | `/register`                       | Register page      |
| POST      | `/logout`                         | Logout             |
| GET       | `/dashboard`                      | Dashboard page     |
| GET       | `/companies`                      | Company list       |
| POST      | `/companies`                      | Store company      |
| PUT/PATCH | `/companies/{company}`            | Update company     |
| DELETE    | `/companies/{company}`            | Delete company     |
| GET       | `/job-applications`               | Application list   |
| POST      | `/job-applications`               | Store application  |
| PUT/PATCH | `/job-applications/{application}` | Update application |
| DELETE    | `/job-applications/{application}` | Delete application |

---

## 📱 Responsive Design

CareerLog supports:

* Mobile layout with hamburger sidebar
* Tablet layout
* Desktop layout with fixed sidebar
* Card layout on smaller screens
* Table layout on larger screens

---

## 🧪 Manual Testing Checklist

### Authentication

* Register new account
* Login with registered account
* Logout successfully
* Guest users cannot access dashboard

### Companies

* Add company
* Edit company
* View company detail
* Delete company
* Search company

### Job Applications

* Add application
* Edit application
* View application detail
* Delete application
* Search application
* Filter by status
* Filter by work model

### Responsive

* Mobile sidebar opens and closes correctly
* Layout does not overflow horizontally
* Forms and modals display properly on mobile, tablet, and desktop

---

## 🧯 Common Issues

### Vite Manifest Not Found

Run:

```bash
npm install
npm run dev
```

### Database Connection Error

Check your `.env` database configuration.

### CSS Not Showing

Run:

```bash
npm run build
```

If `public/hot` exists and you are not using Vite dev server, delete it.

### Route Not Found

Clear route cache:

```bash
php artisan optimize:clear
```

---

## 🚀 Future Improvements

* Export application data
* Dark mode
* Interview reminder
* File upload for CV or portfolio
* More advanced dashboard charts
* Deployment to online server

---

## 🧠 Skills Demonstrated

This project demonstrates:

* Laravel MVC
* Authentication with Laravel Breeze
* PostgreSQL database relationship
* CRUD operations
* Blade component structure
* Tailwind CSS responsive design
* Alpine.js modal and dropdown interaction
* Dashboard UI development

---

## 👩‍💻 Author

Developed by **Arni Nazira** as a Laravel portfolio project.

---

## 📄 License

This project is created for learning and portfolio purposes.