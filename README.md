# Web Laravel Application

---

## Description

This is a web application built with the Laravel framework. It serves as a basic article management system, allowing users to register, log in, and manage their posts through both a web interface and a RESTful API. 

Each user can comment on posts. The application also includes a social feature that allows users to add other users as friends. Posts created by friends are displayed in a personalized feed.

The application includes role-based access control, where administrators have the authority to delete any post. Additionally, it implements a soft-delete feature, moving deleted posts into a trash bin from which they can later be restored or permanently removed.

Data models are developed using Laravel's Eloquent ORM and are organized within the app/Models directory. Database structure and schema changes are managed through migrations located in the database/migrations folder.

You can find a cross-platform client application that connects to this Laravel-powered API [here](https://github.com/nikorr0/compose-multiplatform-app).

---

## Functionality

* **User Authentication:** Users can register for a new account and log in to the application.
* **Post Management (CRUD):** Authenticated users can perform the following actions on posts (cards):
    * **Create:** Add new posts.
    * **Read:** View a list of all posts and view individual posts.
    * **Update:** Edit their existing posts.
    * **Delete:** Remove their posts.
* **RESTful API:** The application includes an API for managing posts. API endpoints are protected using token-based authentication.

---

## Technologies Used

* **Backend Framework:** PHP / Laravel
* **API Authentication:** Laravel Sanctum
* **Database:** SQLite

---

## Application showcase

**Main page with posts (user's perspective)**
![Main page (user)](https://github.com/nikorr0/web_laravel/blob/master/screenshots/main_page_user.png)

**Modal pop-up**
![Modal pop-up](https://github.com/nikorr0/web_laravel/blob/master/screenshots/description_modal_window.png)

**Profile information page**
![Profile information](https://github.com/nikorr0/web_laravel/blob/master/screenshots/profile_information.png)

**Main page with posts (admin's perspective)**
![Main page (admin)](https://github.com/nikorr0/web_laravel/blob/master/screenshots/main_page_admin.png)

---

## API Routes Overview

| **HTTP Route** | **Description**|
|----------------|----------------|
| `GET /cards` | Retrieve a list of all posts (cards) |
| `POST /cards` | Create a new post |
| `GET /cards/{card}` | Retrieve details of a specific post |
| `PUT /cards/{card}` / `PATCH /cards/{card}` | Update an existing post |
| `DELETE /cards/{card}` | Delete a specific post |
| `POST /cards/{card}/comments` | Add a comment to a specific post |
| `POST /friends/{id}` | Add a user as a friend |
| `DELETE /friends/{id}` | Remove a user from friends |
| `GET /users` | Retrieve a list of all users |
| `GET /users/{id}` | Retrieve details of a specific user |
| `GET /feed` | Retrieve the feed containing posts from friends |

---

## Project Installation Guide

1. Clone the Repository
   
```bash
git clone https://github.com/nikorr0/web_laravel.git
cd web_laravel
```

2. Install Dependencies
```
composer install
npm install
```

3. Configure Environment
```
cp .env.example .env
php artisan key:generate
php artisan storage:link
```

4. Run Database Migrations
```
php artisan migrate
```

5. Build Frontend Assets
```
npm run build
npm run buildvite
```

6. Start the Server
```
php artisan serve
```

7. Access the Application
Open your browser and go to:
```
http://localhost:8000/
```
