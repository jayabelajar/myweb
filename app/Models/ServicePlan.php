<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'features',
        'highlight',
        'cta_label',
        'sort_order',
    ];

    protected $casts = [
        'features' => 'array',
        'highlight' => 'boolean',
    ];
}
