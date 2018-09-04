<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booklets extends Model
{
    protected $dates = [
        'created_at',
        'updated_at'
    ];
    protected $fillable = [
        'product_id',
        'product_booklet'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
