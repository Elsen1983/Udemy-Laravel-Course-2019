<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The attribute(s) that is/are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name'];
}
