<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoGallery extends Model
{
    use HasFactory;

    protected $table = 'video_gallery';

    protected $fillable = [
        'category_id',
        'service_id',
        'url',
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
