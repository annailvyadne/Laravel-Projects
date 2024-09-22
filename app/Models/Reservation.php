<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    // Set this to 'int' if your primary key is an integer
    protected $table = 'reservations';
    // Define fillable attributes
    protected $fillable = [
        'memberId',
        'reservationId',
        'bookId',
        'reservation_date',
        'status',
    ];

    // Cast the reservation_date to a date (Carbon instance)
    protected $casts = [
        'reservation_date' => 'date:Y-m-d',
    ];

    protected $primaryKey = 'reservationId';

    /**
     * Get the member that owns the reservation.
     */
    public function member()
    {
        return $this->belongsTo(Member::class, 'id', 'mamberId');
    }

    /**
     * Get the book that is reserved.
     */
    public function book()
    {
        return $this->belongsTo(Book::class, 'bookId', 'bookId');
    }
}
