<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Restaurant;
use App\Models\Order;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Dish extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'cover_image', 'visible', 'description', 'slug', 'restaurant_id', 'ingredients'];


    /**
     * Get the restaurants that owns the Dish
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function restaurants(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }

    /**
     * The orders that belong to the Dish
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity', 'total');
    }
}
