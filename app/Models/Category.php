<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cover_image',
        'status',
    ];

    /**
     * ! Accessors For Cover Image
     */

    public function getImageAttribute()
    {
        if( !$this->cover_image ) {
            return asset('assets/images/no-image.png');
        }

        return asset('storage') . '/' . $this->cover_image;
    }

    public function scopeTableFilters($query)
    {
        return $query->when(request()->input('name', false), function ($query, $name) {
            return $query->where('name', 'like', '%' . $name . '%');
        })->when(request()->input('status', false), function ($query, $status) {
            return $query->where('status', $status);
        });
    }
}
