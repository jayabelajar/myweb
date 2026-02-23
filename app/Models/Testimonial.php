<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'name',
        'role',
        'quote',
        'badge',
        'photo_url',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public const TYPE_PERSON = 'person';
    public const TYPE_COMPANY = 'company';

    public static function typeOptions(): array
    {
        return [
            self::TYPE_PERSON => 'Person',
            self::TYPE_COMPANY => 'Company',
        ];
    }
}
