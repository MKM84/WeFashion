<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'name', 'description', 'price', 'size', 'visibility', 'status', 'reference', 'category_id'
    ];


    public function setCategoryIdAttribute($value)
    {
        if ($value == 0) {
            $this->attributes['category_id'] = null;
        } else {

            $this->attributes['category_id'] = $value;
        }
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function image()
    {
        return $this->hasOne(Image::class);
    }
    public function sizes()
    {
        return $this->belongsToMany(Size::class);
    }

    public function scopePublished($query)
    {
        return $query->where('visibility', 'published');
    }

    public function scopeSoldes($query)
    {
        return $query->where('status', 'solde');
    }
}
