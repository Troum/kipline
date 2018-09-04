<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPhotos extends Model
{
    protected $dates = [
        'created_at',
        'updated_at'
    ];
    protected $fillable = [
        'product_id',
        'product_photo'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
