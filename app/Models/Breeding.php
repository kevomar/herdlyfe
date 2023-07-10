<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Breeding extends Model
{
    use HasFactory, SoftDeletes;

    use HasFactory;

    protected $fillables = [
        'cattle_id',
        'sire_id',
        'date_of_breeding',
        'expected_date_of_delivery',
        'actual_date_of_delivery'

    ];

    public function cattle(): BelongsTo
    {
        //breeding belongs to a cattle
        return $this->belongsTo(Cattle::class);
    }

    public function sire(): BelongsTo
    {
        //breeding belongs to a sire
        return $this->belongsTo(Cattle::class, 'sire_id');
    }
}
