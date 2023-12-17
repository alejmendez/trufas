<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;


class Field extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'size',
        'blueprint',
    ];

    protected $casts = [
        'blueprint' => 'array',
    ];

    public function quarters(): HasMany
    {
        return $this->hasMany(Quarter::class);
    }

    public function plants(): HasManyThrough
    {
        return $this->hasManyThrough(Plant::class, Quarter::class);
    }

    public function getCountPlantsAttribute(): int
    {
        return $this->plants->count();
    }
}