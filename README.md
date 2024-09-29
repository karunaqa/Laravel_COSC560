# Blog Application with Authentication and Admin Panel
This project extends the basic CRUD application for managing a blog by adding user authentication and an admin panel. The enhancements include the implementation of role-based access control, allowing admins to manage users and blog posts, and authors to manage their posts.

# Objective
The primary goal of this project is to build upon the fundamentals learned in the initial blog application and introduce new features, such as user authentication and an admin panel, to create a more robust application.

# SetUp and Initialize Project

### 1. Ensure Your Development Environment is Set Up
- Install [Visual Studio Code]
- Install [Composer]
- Install [Laravel]
- Install [SQLYOG]
- Install [Node.js]
- Install [MongoDB]

### 2. Create a GitHub Repository for Laravel Project
- Go to [GitHub](https://github.com) and open previous repository.
- Clone the repository and create a new branch for this feature:
   git checkout -b feature/auth-admin-panel


# Setup MongoDB with Laravel
- Follow the steps from Lecture 4 to configure MongoDB with Laravel.
- Update the .env file with MongoDB connection details.

# Install Laravel UI and Setup Authentication

### 1. Install Laravel UI package
- composer require laravel/ui

### 2. Generate the authentication scaffolding
- php artisan ui bootstrap --auth
- npm install && npm run dev

### 3. Update the master layout to include Bootstrap styling

# Middleware for Admin Access

### 1. Generate middleware to restrict access to the admin panel
- php artisan make:middleware AdminMiddleware

### 2. Implement the middleware to check if the authenticated user is an admin

### 3. Apply the middleware to the admin routes.


# Admin routes
### 1. Define routes in web.php for the admin panel with an Admin prefix
- Route::group(['middleware' => ['auth','admin'], 'as' => 'admin.', 'prefix' => 'admin'], function () {
    // Resource routes for posts (CRUD operations)
    Route::resource('posts', AdminPostController::class);
    Route::resource('users', UserController::class);

- Ensure the routes are protected by the AdminMiddleware

# Create Admin Controllers
### 1. Generate controllers for managing users and blog posts
- php artisan make:controller Admin/UserController
- php artisan make:controller Admin/PostController

### 2. Implement CRUD operations in the respective controllers with appropriate validation

# Create Blade Views for Admin Panel
- Download Bootstrap examples from Bootstrap and use the dashboard template as the landing page.
- Create a new layout for the admin panel
- resources/views/layouts/admin.blade.php
- Create views for listing, creating, editing, and deleting users and blog posts, ensuring consistency with the Bootstrap theme.

# Enhance User Management
- Add roles to users (e.g., admin, author, user) and implement role-based access control.
- Update the registration process to allow assigning roles.
- Create a migration to add roles in the database.
- Ensure only admins can access user management functionalities.

# Migration and seed the database in Laravel
- php artisan migrate
- php artisan db:seed
- php artisan migrate:refreshmon
- Please use the below details to login users.
    - Email address: admin@admin.com , Password: password123
    - Email address: author@author.com, Password: password123
    - Email address: user@user.com, Password: password123

# Testing
- Test each functionality by creating, viewing, deleting and updating.

# GitHub Push
- Version-controlled and pushed to GitHub after each major step

# Author
Karuna Singh
220279765




