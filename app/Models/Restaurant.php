<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Dish;
use App\Models\Cousine;
use App\Models\Order;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Restaurant extends Model
{

    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'slug',
        'telephone_number',
        'logo',
        'address',
        'piva',
    ];

    /**
     * Get the user that owns the Restaurant
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the dishes for the Restaurant
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dishes(): HasMany
    {
        return $this->hasMany(Dish::class);
    }

    /**
     * The cousines that belong to the Restaurant
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function cousines(): BelongsToMany
    {
        return $this->belongsToMany(Cousine::class);
    }

    /**
     * Get all of the comments for the Restaurant
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
    
}
