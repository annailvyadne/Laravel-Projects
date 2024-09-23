<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;

    protected $table = 'issues';

    // Define fillable attributes
    protected $fillable = [
        'memberId',
        'bookId',
        'dueDate',
        'returnDate', // Nullable
        'status',
        'amount', // Nullable
    ];


    protected $casts = [
        'dueDate' => 'date:Y-m-d',
        'returnDate' => 'date:Y-m-d',
    ];

    protected $primaryKey = 'id';


    public function member()
    {
        return $this->belongsTo(Member::class, 'id', 'memberId');
    }

    /**
     * Get the book that is reserved.
     */
    public function book()
    {
        return $this->belongsTo(Book::class, 'bookId', 'bookId');
    }

}
