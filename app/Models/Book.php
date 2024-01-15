<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    /* Tabla para almacenar los libros  */
    public $table = "Books";
    public $fillable = [
        'id',
        'title',
        'img',
        'author',
        'editorial',
        'decription',
        'publication_year',
        'genre',
        'shelf_id',
    ];
}
