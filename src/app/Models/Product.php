<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function scopeSearch($query, $search)
    {
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
            }
    }

    public function scopeSortPrice($query, $sort)
    {
        if ($sort === 'asc') {
            $query->orderBy('price', 'asc');
        }

        if ($sort === 'desc') {
            $query->orderBy('price', 'desc');
        }
    }

    public function seasons()
    {
    return $this->belongsToMany(Season::class);
    }
}
