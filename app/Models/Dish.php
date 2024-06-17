<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Dish extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'cover_image', 'visible', 'description', 'slug'];


    /**
     * Get the restaurants that owns the Dish
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function restaurants(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }
}
