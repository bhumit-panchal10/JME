<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'slugname',
        'image',
        'sort_desicription',
        'meta_title',
        'meta_description',
        'head',
        'body'
    ];

    public function services()
    {
        return $this->hasMany(Service::class, 'category_id');
    }

    public function photoGalleries()
    {
        return $this->hasMany(
            PhotoGallery::class,
            'category_id'
        );
    }
}
