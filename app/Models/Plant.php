<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Plant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'age',
        'location',
        'location_xy',
        'planned_at',
        'manager',
        'photos',
        'documents',
        'quarter_id',
    ];

    protected $casts = [
        'photos' => 'array',
        'documents' => 'array',
    ];

    public function quarter(): BelongsTo
    {
        return $this->belongsTo(Quarter::class);
    }
}
