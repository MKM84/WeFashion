<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'name', 'description', 'price', 'size', 'visibility', 'sttatus', 'reference', 'category_id'
    ];

    public function category()
    {
        return $this->hasOne(Category::class);
    }

    public function Image()
    {
        return $this->hasOne(Image::class);
    }

    public function scopePublished($query)
    {
        return $query->where('visibility', 'published');
    }

    public function scopeSold($query)
    {
        return $query->where('status', 'sold');
    }
}
