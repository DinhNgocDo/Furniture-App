<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
    ];

    public function productSizes()
    {
        return $this->hasMany(ProductSize::class, 'size_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($item) {
            $item->productSizes()->delete();
        });
    }
}
