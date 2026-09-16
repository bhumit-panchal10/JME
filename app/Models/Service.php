<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $fillable = [
        'category_id',
        'name',
        'slugname',
        'image',
        'meta_tittle',
        'meta_description',
        'head',
        'body',
        'short_description',
        'brief_description',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function photoGalleries()
    {
        return $this->hasMany(
            PhotoGallery::class,
            'service_id'
        );
    }
    public function faqs()
    {
        return $this->hasMany(
            Faq::class,
            'service_id'
        );
    }
}
