<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'image',
        'name',
        'description',
        'price',
        'sale_percent',
        'price_sale',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function productSizes()
    {
        return $this->hasMany(ProductSize::class, 'product_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($item) {
            $image = public_path('client/images/product/' . $item->image);

            if ($item->image != null) {
                if (isset($image)) {
                    if (file_exists($image)) {
                        unlink($image);
                    }
                }
            }

            $item->productSizes()->delete();
        });
    }
}
