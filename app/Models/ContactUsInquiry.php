<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUsInquiry extends Model
{
    protected $table = 'contact_us_inquiry';

    protected $fillable = [
        'name',
        'mobile',
        'department',
        'email',
        'message',
        'created_at',
        'updated_at'
    ];
}
