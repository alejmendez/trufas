<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fields extends Model
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

}
