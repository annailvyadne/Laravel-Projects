<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';
    // Define fillable attributes
    protected $fillable = [
        'title',
        'author',
        'isbn',
        'categoryId',
        'status',
    ];

    /**
     * Get the category associated with the book.
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryId', 'categoryId');
    }
}
