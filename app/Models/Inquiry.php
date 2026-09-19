<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;
    protected $table = 'inquery';
    protected $fillable = [
        'id',
        'name',
        'email',
        'mobile',
        'comment',
        'created_at',
        'updated_at'
    ];
}
