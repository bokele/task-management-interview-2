# Simple Task management system

<p align="center"><a href="https://github.com/bokele" target="_blank">
<img src="/public/assets/dashboard.png" width="400"></a></p>

# Brief

> simple Laravel web application for task management.

# Objective

> Build a system that will enable the company to task process with the necessary business rules.

# Tasks

-   Create task (info to save: task name, priority, timestamps).
-   Edit and `delete task.
-   Reorder tasks with drag and drop in the browser. Priority should automatically be updated based on this. #1 priority goes at top, #2 next down and so on.
-   Tasks should be saved to a mysql table.
-   Add project functionality to the tasks. User should be able to select a project from a dropdown and only view tasks associated with that project

## Requirements

-   Php 8.2 and above
-   Composer
-   Since this project is running laravel 11, we suggest checking out the official requirements [here](https://laravel.com/docs/11.x)

## Installation

-   Clone the repository by running the following command in your comamand line below (Or you can dowload zip file from github)

```shell
git clone git@github.com:bokele/task-management.git  ./task-management
```

-   Head to the project's directory

```shell
cd task-management
```

-   Install composer dependancies

```shell
composer install
```

-   Copy .env.example file into .env file and configure based on your environment

```shell
cp .env.example .env
```

-   Generate encryption key

```shell
php artisan key:generate
```

-   Migrate the database

```shell
php artisan migrate
```

-   Seed database
    ```shell
    php artisan db:seed
    ```
-   Install npm dependancies

```shell
npm install
```

-   For development or testing purposes, you can use the laravel built in server by running

```shell
npm run dev
```

```shell
php artisan serve
```

## Setup
-   Create an account
-   Login into your Account


### User

-   Project
    -   List all project
    -   Create a project
    -   Edit a project
    -   Detele a Project

-   Task
    -   List all task
    -   Create a task
    -   Edit a task
    -   Detele a task
    -   Reorder task by drag and drop

-   Dashbord
    -   View Total Project
    -   View Total Task
    -   View tasks associated with a project



