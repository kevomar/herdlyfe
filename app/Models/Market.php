<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Market extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'owner_id',
        'cattle_id',
        'price'
    ];


    public function cattle()
    {
        return $this->belongsTo(Cattle::class, 'id');
    }
}
