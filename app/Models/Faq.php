<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    protected $table = 'faq';

    protected $fillable = [
        'service_id',
        'question',
        'answer',
    ];

    public function service()
    {
        return $this->belongsTo(
            Service::class,
            'service_id'
        );
    }
}
