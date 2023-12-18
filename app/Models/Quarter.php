<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Quarter extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'area',
        'planned_at',
        'blueprint',
        'field_id',
    ];

    protected $casts = [
        'blueprint' => 'array',
    ];

    public function plants(): HasMany
    {
        return $this->hasMany(Plant::class);
    }

    public function field(): BelongsTo
    {
        return $this->belongsTo(Field::class);
    }

    public function getCountPlantsAttribute(): int
    {
        return $this->plants->count();
    }
}
