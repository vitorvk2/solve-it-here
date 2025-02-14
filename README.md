# SolveItHere
This project was developed during university. It is an API designed to enable people to connect and solve problems together.

---

> Requirements: **PHP** version 7.9 or higher and **Composer**

### Objectives
To mediate conflicts by creating a prosperous environment for their resolution through communication among various people.

### Installation
+ Environment
```bash
$ git clone (this project) into any directory

$ composer update

Copy and paste the .env.example file, renaming it to .env
```
+ Configuration and Table Creation
```bash
Inside the 'Api/database' directory, create the database.sqlite file

Run the command to create the tables and populate automatically:
$ php artisan migrate --seed               
```
+ Running the environment
```bash
$ php artisan serve
```



