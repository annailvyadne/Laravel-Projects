<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $table = 'members';
    protected $fillable = [
        'fname',
        'lname',
        'email',
        'password',
        'address',
        'phone_num',
        'membership_type',
        'membership_date',
        'status',
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'memberId', 'memberId');
    }
}

