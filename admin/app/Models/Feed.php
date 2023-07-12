<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feed extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'herd_id',
        'feed_name',
        'quantity',
        'purchase_date',
        'unit_price',
        'total_price',
    ];

    public function herd(): BelongsTo
    {
        //feed belongs to a herd
        return $this->belongsTo(Herd::class);
    }
}
