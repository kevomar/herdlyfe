<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cattle extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable  = [
        'herd_id',
        'breed_id',
        'cattle_name',
        'date_of_birth',
        'gender',
        'status',
    ];

    protected $dates = [
        'date_of_birth',
        'deleted_at'
    ];

    protected $casts = [
        'date_of_birth' => 'date:Y-m-d',
        'deleted_at' => 'datetime:Y-m-d',
    ];

    public function herd(): BelongsTo
    {
        //cattle belongs to a herd
        return $this->belongsTo(Herd::class);
    }

    public function breed(): BelongsTo
    {
        //cattle are of a parricular breed
        return $this->belongsTo(Breed::class);
    }

    public function milk(): HasMany
    {
        //cattle can have many milk records
        return $this->hasMany(Milk::class);
    }

    public function breeding(): HasMany
    {
        //cattle can have many breeding records
        return $this->hasMany(Breeding::class);
    }

    //define a relationship with sires from the breeding model
    public function sire(): HasMany
    {
        return $this->hasMany(Breeding::class, 'sire_id');
    }

    public function health(): HasMany
    {
        //cattle can have many health records
        return $this->hasMany(Health::class);
    }

    public function sale(): HasMany
    {
        //cattle can have many sale records
        return $this->hasMany(Sale::class);
    }
}
