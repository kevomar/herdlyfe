<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Herd extends Model
{
    use HasFactory, SoftDeletes;

    public function user(): BelongsTo
    {
        //herd belongs to a user
        return $this->belongsTo(User::class);
    }

    public function cattle(): HasMany
    {
        //herd can have many cattle
        return $this->hasMany(Cattle::class);
    }

    public function feed(): HasMany
    {
        //herd can have many feed records
        return $this->hasMany(Feed::class);
    }
}
