<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactSetting extends Model
{
    protected $fillable = [
        'email',
        'location',
        'availability_text',
        'availability_note',
        'inquiry_title',
        'inquiry_subtitle',
        'inquiry_button',
        'whatsapp_number',
    ];
}
