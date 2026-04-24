# 🚀 Livewire Project - Complete Setup & Architecture Guide

Built with **Clean Architecture** using **Service Repository Pattern** for maintainable and scalable code.

---

## 📌 Features

- 🔐 User Authentication (Login/Register)
- 📁 Create Projects
- 📁 Edit Projects
- 🖼️ Upload Images
- 📋 View Project List with Filtering
- ✏️ Full CRUD Operations
- 🏗️ Clean Architecture with Service & Repository Pattern

---

## 🛠️ Installation & Setup Guide

### Prerequisites
- PHP 8.1 or higher
- Composer
- Node.js & npm
- XAMPP or any local server environment
- MySQL database

### Complete Setup in 1 Go

Run the following command to set up the entire project:

```bash
# Step 1: Clone the repository
git clone https://github.com/your-username/livewire-app.git
cd livewire-app

# Step 2: Install PHP dependencies
composer install

# Step 3: Install Node dependencies
npm install

# Step 4: Create environment file
cp .env.example .env

# Step 5: Generate application key
php artisan key:generate

# Step 6: Configure your database in .env file
# Update: DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD

# Step 7: Run database migrations
php artisan migrate

# Step 8: Seed the database with sample data (optional)
php artisan db:seed

# Step 9: Build frontend assets
npm run build

# Step 10: Start the development server
php artisan serve

# Step 11: In another terminal, start Vite development server
npm run dev
```

Your application will be available at: **http://localhost:8000**

---

## 🏗️ Clean Architecture Overview

This project follows the **Service Repository Architecture Pattern** for clean code organization and separation of concerns.

### Architecture Layers:

```
┌─────────────────────────────────┐
│   Livewire Components (UI)      │
│  (Dashboard, ProjectCreate, etc) │
└────────────┬────────────────────┘
             │
┌────────────▼────────────────────┐
│  Service Layer                  │
│  (ProjectService)               │
│  - Business Logic               │
│  - Data Manipulation            │
│  - Validation                   │
└────────────┬────────────────────┘
             │
┌────────────▼────────────────────┐
│  Repository Layer               │
│  (ProjectRepository)            │
│  - Database Queries             │
│  - Data Retrieval               │
│  - CRUD Operations              │
└────────────┬────────────────────┘
             │
┌────────────▼────────────────────┐
│  Models / Database              │
│  (ProjectModel, User, etc)      │
│  - Data Structure               │
│  - Table Mapping                │
└─────────────────────────────────┘
```

### Key Components:

#### 1. **Models** (`app/Models/`)
- `ProjectModel.php` - Project data structure
- `User.php` - User data structure
- `Category.php` - Category management
- `SubCategory.php` - Sub-category management
- `Country.php` - Country data

#### 2. **Service Layer** (`app/Services/`)
```php
// app/Services/ProjectService.php
- Handles all business logic for projects
- Validates input data
- Manages relationships between entities
- Processes file uploads
```

#### 3. **Repository Layer** (`app/Repositories/`)
```php
// app/Repositories/ProjectRepository.php
- Handles all database operations
- CRUD: Create, Read, Update, Delete
- Filters and searches
- Data retrieval with relationships

// Contracts (Interfaces)
// app/Repositories/Contracts/
- Define repository contracts for abstraction
```


