<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomepageSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'name',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public static function availableSections(): array
    {
        return [
            'hero' => 'Hero + Stats',
            'logos' => 'Trusted Logos',
            'services' => 'Services Overview',
            'testimonials' => 'Client Testimonials',
            'blog' => 'Blog Highlights',
            'cta' => 'Call To Action',
        ];
    }
}
