# Technical Test

## Description

The Virtual Library is an online library manager that allows users to organize, explore, and share their personal collection of books. Each user has the ability to add, edit, and delete books, as well as write and manage their own reviews. Additionally, even unregistered users can explore the library, search for books, and access reviews from other users.
Key Features

## Características Principales

- **Book Management:** Each user can add, edit, and delete books from their personal library.
- **Customized Reviews:** Users can write and manage reviews for the books they have added to their collection.
- **Public Exploration:** Unregistered users can explore the library, search for books using filters, and read reviews from other users.
- **Privacy:** Only users themselves can edit or delete the books and reviews they have added.

## Usage Instructions

1. **User Registration:** To make the most of the features, register for an account on the Virtual Library.
2. **Book Management:** Add your favorite books, edit information, and remove books you no longer want.
3. **Customized Reviews:** Write reviews to share your opinions on each book in your collection.
4. **Public Exploration:** Even if you are not registered, use the search function to find books and read reviews from other users.

## Environment Setup
1.   Clone Repository
2.   In the project directory, in a CMD, run composer install
3.   Run npm install
4.   Run copy .env.example .env
5.   Add the database name in DB_DATABASE
6.   Start the local web server services (Xampp, Mampp, Lampp)
7.   Create the database named "library" in phpMyAdmin
8.   Run php artisan migrate
9.   Run php artisan db:seed --class=UsersTableSeeders
10.  Run php artisan db:seed --class=booksTableSeeder
11. Run php artisan db:seed --class=reviewsTableSeeder
12.  Run php artisan key:generate
13.  Run php artisan serve
14.  Run npm run dev

