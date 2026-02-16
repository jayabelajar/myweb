<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'role',
        'bio',
        'photo_url',
        'socials',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'socials' => 'array',
        'is_active' => 'boolean',
    ];
}
