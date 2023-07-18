<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MpesaDb extends Model
{
    use HasFactory;

    protected $table = 'mpesa';

    protected $fillable = [
        'phone_number',
        'amount',
        'transaction_code',
        'transaction_time',
    ];


}
