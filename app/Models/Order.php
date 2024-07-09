<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Restaurant;
use App\Models\Dish;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant_id',
        'customer_name',
        'customer_lastname',
        'customer_address',
        'customer_telephone',
        'customer_email',
        'total',
    ];

    /**
     * The roles that belong to the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    /**
     * Get the user that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }

    /**
     * The dishes that belong to the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function dishes(): BelongsToMany
    {
        return $this->belongsToMany(Dish::class)->withPivot('quantity', 'total');
    }
}
