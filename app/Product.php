<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Sluggable;

    protected $dates = [
        'created_at',
        'updated_at'
    ];
    protected $fillable = [
        'name',
        'description',
        'use',
        'characteristics',
        'cover',
        'category',
        'category_slug'
    ];
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function relatedPhoto()
    {
        return $this->hasMany(ProductPhotos::class);
    }

    public function relatedDocument()
    {
        return $this->hasMany(Documents::class);
    }

    public function relatedBooklet()
    {
        return $this->hasMany(Booklets::class);
    }
}
