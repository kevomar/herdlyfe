<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Milk extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'cattle_id',
        'quantity',
        'date',
        'shift',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function cattle(): BelongsTo
    {
        //milk belongs to a cattle
        return $this->belongsTo(Cattle::class);
    }
}
