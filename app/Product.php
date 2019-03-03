<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Product extends Model implements HasMedia
{
    use HasMediaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'price'
    ];

    public function getPriceAttribute($value)
    {
        return number_format((float) $value / 100, 2, '.', '');
    }

    public function setPriceNameAttribute($value)
    {
        $this->attributes['price'] = $value * 100;
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('featured image')
            ->singleFile();
    }

    public function getHasFeaturedImageAttribute()
    {
        return (bool) $this->getFirstMedia('featured image');
    }

    public function getFeaturedImageUrlAttribute()
    {
        if ($image = $this->getFirstMedia('featured image')) {
            return $image->getUrl();
        }
    }
}
