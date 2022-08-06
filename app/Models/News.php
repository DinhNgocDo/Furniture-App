<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'name',
        'short_description',
        'content',
        'status',
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($item) {
            $image = public_path('client/images/news/' . $item->image);

            if ($item->image != null) {
                if (isset($image)) {
                    if (file_exists($image)) {
                        unlink($image);
                    }
                }
            }
        });
    }
}
