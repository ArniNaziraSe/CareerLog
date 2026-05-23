# 💼 CareerLog

**CareerLog** is a job application tracking web application built with **Laravel** and **PostgreSQL**.  
It helps users organize companies, job applications, recruitment statuses, interview schedules, and personal notes in one clean and responsive dashboard.

This project was developed as a **portfolio project** to demonstrate full-stack web development skills using Laravel, Blade, Tailwind CSS, authentication, database relationships, CRUD operations, responsive UI design, and interactive components with Alpine.js.

---

## ✨ Overview

Searching for a job can become messy when applications are spread across emails, spreadsheets, notes, job portals, and chat messages.

CareerLog solves that problem by providing a centralized workspace where users can track:

- Companies they applied to
- Job positions
- Application statuses
- Interview schedules
- Salary expectations
- Work models
- Personal notes
- Application progress

The goal of this project is to make job hunting more structured, visual, and easier to manage.

---

## 🚀 Key Features

### 🔐 Authentication

- Login using Laravel Breeze authentication
- Logout functionality
- Protected dashboard routes using authentication middleware
- Register page disabled for the current version
- Default user account created through database seeder

---

### 📊 Dashboard

The dashboard provides a quick overview of the user's job search progress.

Dashboard features:

- Total applications summary
- Interview count
- Accepted count
- Rejected count
- Pipeline overview by application status
- Recent applications section
- Upcoming interviews section
- Responsive dashboard layout

---

### 🏢 Companies Management

The Companies module is used to manage company data related to job applications.

Company features:

- View company list
- Add new company
- Edit company data
- View company detail
- Delete company
- Search company
- Modal-based create, edit, and detail views without leaving the main page

---

### 📝 Applications Management

The Applications module is used to track job applications submitted by the user.

Application features:

- View application list
- Add new application
- Edit application
- View application detail
- Delete application
- Filter by application status
- Filter by work model
- Search by position or company
- Dropdown action menu
- Modal-based create, edit, and detail views without page redirection

---

### 📱 Responsive UI

CareerLog is designed to work across multiple screen sizes.

Responsive behavior:

- Mobile layout with hamburger menu
- Tablet layout optimized for iPad and similar devices
- Desktop layout with fixed sidebar
- Card-based layout on smaller screens
- Table layout on larger screens
- Horizontal scroll protection for wide tables

---

## 🛠️ Tech Stack

| Technology | Purpose |
|---|---|
| **Laravel** | Backend framework |
| **PostgreSQL** | Relational database |
| **Blade** | Server-side templating |
| **Tailwind CSS** | Styling and responsive UI |
| **Laravel Breeze** | Authentication scaffolding |
| **Alpine.js** | Modal, dropdown, and sidebar interactions |
| **Heroicons** | UI icons |
| **Vite** | Frontend asset bundling |

---

## 🧩 Main Modules

### 1. 🔐 Authentication

CareerLog uses Laravel Breeze for authentication.  
The application currently supports login and logout only. Registration is disabled because the app is designed for a seeded user account in this version.

### 2. 📊 Dashboard

The dashboard displays job search metrics and visual summaries.  
It helps users quickly understand their application pipeline and upcoming interview activities.

### 3. 🏢 Companies

The Companies module stores company information such as company name, website, email, address, and notes.  
Each company belongs to a specific user.

### 4. 📝 Applications

The Applications module stores job application records, including company, position, applied date, status, source, salary, work model, next interview date, and notes.

---

## 🗄️ Database Design

CareerLog uses three main database tables:

```text
users
companies
job_applications
````

### 🔗 Relationships

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

## 📋 Database Tables

### 👤 Users Table

The `users` table is provided by Laravel Breeze authentication.

Main fields:

```text
id
name
email
password
created_at
updated_at
```

---

### 🏢 Companies Table

The `companies` table stores company data.

Main fields:

```text
id
user_id
name
website
email
address
notes
created_at
updated_at
```

---

### 📝 Job Applications Table

The `job_applications` table stores application tracking data.

Main fields:

```text
id
user_id
company_id
position
applied_date
status
source
salary
work_model
interview_date
notes
created_at
updated_at
```

---

## 📁 Folder Structure

Important project structure:

```text
resources/views/
├── auth/
│   └── login.blade.php
│
├── components/
│   ├── sidebar-link.blade.php
│   └── layouts/
│       └── app-dashboard.blade.php
│
├── dashboard/
│   ├── sidebar.blade.php
│   ├── mobile-header.blade.php
│   ├── page-header.blade.php
│   ├── stats-cards.blade.php
│   ├── pipeline-overview.blade.php
│   ├── recent-applications.blade.php
│   └── upcoming-interviews.blade.php
│
├── companies/
│   ├── index.blade.php
│   ├── create.blade.php
│   ├── edit.blade.php
│   └── show.blade.php
│
├── applications/
│   ├── index.blade.php
│   ├── create.blade.php
│   ├── edit.blade.php
│   └── show.blade.php
│
└── dashboard.blade.php
```

Controller structure:

```text
app/Http/Controllers/
├── CompanyController.php
└── JobApplicationController.php
```

Model structure:

```text
app/Models/
├── User.php
├── Company.php
└── JobApplication.php
```

---

## ⚙️ Installation

Follow these steps to run the project locally.

### 1. Clone the Repository

```bash
git clone https://github.com/your-username/careerlog.git
cd careerlog
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Install Frontend Dependencies

```bash
npm install
```

### 4. Create Environment File

```bash
cp .env.example .env
```

For Windows, you can manually copy `.env.example` and rename the copied file to `.env`.

### 5. Generate Application Key

```bash
php artisan key:generate
```

---

## 🧬 Environment Configuration

Update the database configuration in `.env`.

Example PostgreSQL configuration:

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

## 👤 Create Default User

Because registration is disabled in this version, the default user account is created using a database seeder.

Run:

```bash
php artisan db:seed
```

Default login account:

```text
Email    : admin@careerlog.com
Password : password123
```

---

## ▶️ Run the Application

Start the Laravel development server:

```bash
php artisan serve
```

Start Vite:

```bash
npm run dev
```

Open the application in your browser:

```text
http://127.0.0.1:8000
```

---

## 🧭 Main Routes

| Method    | URL                           | Route Name           | Description        |
| --------- | ----------------------------- | -------------------- | ------------------ |
| GET       | `/`                           | -                    | Redirect to login  |
| GET       | `/login`                      | login                | Login page         |
| POST      | `/login`                      | login                | Login process      |
| POST      | `/logout`                     | logout               | Logout             |
| GET       | `/dashboard`                  | dashboard            | Dashboard page     |
| GET       | `/companies`                  | companies.index      | Company list       |
| POST      | `/companies`                  | companies.store      | Store company      |
| PUT/PATCH | `/companies/{company}`        | companies.update     | Update company     |
| DELETE    | `/companies/{company}`        | companies.destroy    | Delete company     |
| GET       | `/applications`               | applications.index   | Application list   |
| POST      | `/applications`               | applications.store   | Store application  |
| PUT/PATCH | `/applications/{application}` | applications.update  | Update application |
| DELETE    | `/applications/{application}` | applications.destroy | Delete application |

---

## 🛣️ Route Example

```php
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobApplicationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('companies', CompanyController::class);

    Route::resource('applications', JobApplicationController::class);
});

require __DIR__.'/auth.php';
```

---

## 🎨 UI Components

### 🧱 Dashboard Layout

The main authenticated layout is located at:

```text
resources/views/components/layouts/app-dashboard.blade.php
```

This layout contains:

* Sidebar
* Mobile header
* Main content wrapper
* Alpine.js state for mobile sidebar

---

### 🧭 Sidebar Link Component

Located at:

```text
resources/views/components/sidebar-link.blade.php
```

Used to create reusable sidebar navigation links.

Example:

```blade
<x-sidebar-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
    <x-heroicon-o-squares-2x2 class="h-5 w-5" />
    <span>Dashboard</span>
</x-sidebar-link>
```

---

### 🪟 Modal Interaction

Modal interactions use Alpine.js.

Example state:

```blade
x-data="{
    showCreateModal: false,
    showEditModal: false,
    showDetailModal: false
}"
```

Example modal trigger:

```blade
@click="showCreateModal = true"
```

---

## 📱 Responsive Design Strategy

CareerLog uses Tailwind CSS breakpoints to support different devices.

| Breakpoint | Usage                                   |
| ---------- | --------------------------------------- |
| Mobile     | Card layout and hamburger menu          |
| Tablet     | Wider content area with hamburger menu  |
| Desktop    | Fixed sidebar and full dashboard layout |

Important responsive choices:

* Sidebar becomes fixed only on desktop
* Mobile and tablet use hamburger navigation
* Tables are replaced with cards on smaller screens where needed
* Main content uses overflow protection to prevent horizontal scrolling
* Dashboard cards adapt from one column to multiple columns

---

## ⚡ Alpine.js Setup

Make sure Alpine.js is active in:

```text
resources/js/app.js
```

Example:

```js
import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
```

Alpine.js is used for:

* Mobile sidebar toggle
* Modal open and close behavior
* Dropdown action menu
* Temporary selected data display in detail and edit modal

---

## 🖌️ Styling Notes

CareerLog uses Tailwind CSS utility classes for styling.

Main UI style:

* Clean dashboard interface
* Blue primary color
* Soft slate background
* Rounded cards
* Subtle borders and shadows
* Responsive spacing
* Modal-based interaction

Primary color usage:

```text
Blue     : primary actions and active menu
Red      : delete and logout actions
Violet   : screening status
Emerald  : offered or accepted status
Amber    : test stage
Slate    : text, border, and background
```

---

## ✅ Manual Testing Checklist

### 🔐 Authentication

* User can access login page
* User can login using seeded account
* Invalid credentials show validation error
* Authenticated user can access dashboard
* Guest user cannot access protected pages
* User can logout successfully

### 🏢 Companies

* Company list loads correctly
* Add company modal opens
* Edit company modal opens
* Detail company modal opens
* Delete action works
* Search input displays correctly
* Layout works on desktop, tablet, and mobile

### 📝 Applications

* Application list loads correctly
* Add application modal opens
* Action dropdown opens from three-dot button
* Detail modal opens
* Edit modal opens
* Delete action works
* Status and work model filters display correctly
* Layout works on desktop, tablet, and mobile

### 📱 Responsive Layout

* Mobile header appears on small screens
* Hamburger menu opens mobile sidebar
* Sidebar closes using close button or backdrop
* Desktop sidebar appears on large screens
* Mobile layout does not overflow horizontally
* Tablet layout remains readable and balanced

---

## 🧯 Troubleshooting

### Vite Manifest Not Found

Run:

```bash
npm install
npm run dev
```

---

### Login Route Not Found

Make sure Laravel Breeze is installed and this line exists in `routes/web.php`:

```php
require __DIR__.'/auth.php';
```

---

### Profile Route Error

If the application does not use the Breeze profile page, remove links that call:

```blade
route('profile.edit')
```

---

### Applications Route Error

If the route is defined as:

```php
Route::resource('applications', JobApplicationController::class);
```

then use:

```blade
route('applications.index')
```

not:

```blade
route('job-applications.index')
```

---

### Modal Not Opening

Check that Alpine.js is active and Vite is running:

```bash
npm run dev
```

---

### Mobile Layout Has Horizontal Scroll

Make sure the main layout uses:

```blade
<body class="overflow-x-hidden bg-slate-50 text-slate-900">
```

Also make sure wide tables are wrapped with:

```blade
<div class="overflow-x-auto">
    <table>
        ...
    </table>
</div>
```

---

## 🧭 Future Improvements

Possible improvements for the next version:

* User registration
* Forgot password feature
* Fully dynamic dashboard statistics
* Dynamic application timeline
* Search and filter connected to database queries
* Pagination for companies and applications
* Interview reminder feature
* CV or portfolio file upload
* Export applications to PDF or Excel
* Dark mode
* Email notification
* Multi-user enhancement

---

## 🧠 Skills Demonstrated

This project demonstrates practical implementation of:

* Laravel MVC architecture
* Authentication using Laravel Breeze
* PostgreSQL database integration
* Database relationship design
* CRUD functionality
* Blade component-based UI
* Tailwind CSS responsive design
* Alpine.js UI interactions
* Modal-based form interaction
* Dashboard layout development
* Route protection using middleware
* Portfolio-ready full-stack application structure

---

## 📌 Project Status

This project is currently in active development.

Current version includes:

* Login
* Logout
* Dashboard UI
* Companies page
* Applications page
* Responsive layout
* Modal-based create, edit, and detail interface

Next development focus:

* Connecting all CRUD actions fully to the database
* Making dashboard statistics dynamic
* Improving search, filter, and pagination

---

## 👩‍💻 Author

Developed by **Lala Lili** as a Laravel portfolio project.

---

## 📄 License

This project is created for learning and portfolio purposes.

---

## 💙 About CareerLog

CareerLog is designed to make job application tracking more organized, focused, and easier to manage.

It helps users keep track of companies, applications, statuses, interviews, and notes in one structured workspace.