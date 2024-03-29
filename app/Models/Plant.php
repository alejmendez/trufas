<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Plant extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'name',
        'type',
        'age',
        'location',
        'location_xy',
        'planned_at',
        'manager',
        'blueprint',
        'quarter_id',
    ];

    protected $casts = [
        'blueprint' => 'array',
    ];

    public function field()
    {
        return $this->quarter->field();
    }

    public function quarter(): BelongsTo
    {
        return $this->belongsTo(Quarter::class);
    }
}
