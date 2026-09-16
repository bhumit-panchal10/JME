<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoGallery extends Model
{
    use HasFactory;

    protected $table = 'photo_gallery';

    protected $fillable = [
        'category_id',
        'service_id',
        'image',
    ];


    /*
    |--------------------------------------------------------------------------
    | Category
    |--------------------------------------------------------------------------
    */
    public function category()
    {
        return $this->belongsTo(
            Category::class,
            'category_id'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Service
    |--------------------------------------------------------------------------
    */
    public function service()
    {
        return $this->belongsTo(
            Service::class,
            'service_id'
        );
    }
}
