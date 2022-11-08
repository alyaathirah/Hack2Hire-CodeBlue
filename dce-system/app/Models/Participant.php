<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;
    
    protected $table = 'participant';

    protected $fillable = [
        'firstname',
        'lastname',
        'employee_status',
        'worksite',
        'phone',
        'shirt_size',
        'age_category',
        'code',
        'attend-time',
        'registration_fee',
        'ngo_id',
        'account_id'
    ];
}
