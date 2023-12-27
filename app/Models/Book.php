<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    /* Tabla para almacenar los libros  */
    private $table = "Books";
    protected $fillable = [
        'id',
        'title',
        'author',
        'editorial',
        'publications_year',
        'genre'
    ];
}
