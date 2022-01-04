<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// This class helps us to communicate with the database
// For this we have to create first a database (now in mysql) with the following command : CREATE DATABASE todos_app DEFAULT CHARACTER SET = 'utf8mb4';
// Then we have to edit the .env file in the root folder to get the connection to the database
// And for create the tables we will use Migration with command 'php artisan make:migration create_todos_table' which will generate a migration file in database/migrations folder
// When the tables are declared in the create_todos_table up() function then we run 'php artisan migrate' to really create the tables in database

class Todo extends Model
{
    use HasFactory;

}
