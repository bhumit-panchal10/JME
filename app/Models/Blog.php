<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';

    protected $fillable = [
        'category_id',
        'service_id',
        'name',
        'slugname',
        'description',
        'meta_tittle',
        'meta_description',
        'head',
        'image',
        'body',
    ];

    public function category()
    {
        return $this->belongsTo(
            Category::class,
            'category_id'
        );
    }

    public function service()
    {
        return $this->belongsTo(
            Service::class,
            'service_id'
        );
    }
}
