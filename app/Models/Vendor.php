<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'store_name',
        'store_name_ar',
        'description',
        'description_ar',
        'logo',
        'cover_image',
        'phone',
        'email',
        'address',
        'city',
        'governorate',
        'postal_code',
        'website',
        'facebook',
        'instagram',
        'twitter',
        'is_verified',
        'is_active',
        'commission_rate',
        'rating',
        'total_sales',
        'joined_at'
    ];

    protected $casts = [
        'is_verified' => 'boolean',
        'is_active' => 'boolean',
        'commission_rate' => 'decimal:2',
        'rating' => 'decimal:2',
        'total_sales' => 'decimal:2',
        'joined_at' => 'datetime',
    ];

    /**
     * Get the user that owns the vendor.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the products for the vendor.
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Get the orders for the vendor.
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Scope a query to only include active vendors.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope a query to only include verified vendors.
     */
    public function scopeVerified($query)
    {
        return $query->where('is_verified', true);
    }

    /**
     * Get the vendor's average rating.
     */
    public function getAverageRatingAttribute()
    {
        return $this->reviews()->avg('rating') ?? 0;
    }

    /**
     * Get the vendor's total products count.
     */
    public function getTotalProductsAttribute()
    {
        return $this->products()->count();
    }
}
