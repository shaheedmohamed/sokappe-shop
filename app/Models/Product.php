<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'name_ar',
        'slug',
        'description',
        'description_ar',
        'short_description',
        'short_description_ar',
        'sku',
        'price',
        'sale_price',
        'cost_price',
        'stock_quantity',
        'min_stock_level',
        'weight',
        'dimensions',
        'featured_image',
        'meta_title',
        'meta_description',
        'seo_keywords',
        'brand',
        'color',
        'unit',
        'size',
        'subcategory_id',
        'minimum_order_quantity',
        'is_active',
        'is_featured',
        'is_digital',
        'requires_shipping',
        'status',
        'published_at',
        'views_count',
        'sales_count',
        'user_id',
        'category_id'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'sale_price' => 'decimal:2',
        'cost_price' => 'decimal:2',
        'weight' => 'decimal:2',
        'dimensions' => 'array',
        'seo_keywords' => 'array',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'is_digital' => 'boolean',
        'requires_shipping' => 'boolean',
        'published_at' => 'datetime',
    ];

    /**
     * Get the user that owns the product.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the vendor that owns the product (alias for user).
     */
    public function vendor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the subcategory that owns the product.
     */
    public function subcategory(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'subcategory_id');
    }

    /**
     * Get the category that owns the product.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the images for the product.
     */
    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class)->orderBy('sort_order');
    }

    /**
     * Get the primary image for the product.
     */
    public function primaryImage()
    {
        return $this->hasOne(ProductImage::class)->where('is_primary', true);
    }

    /**
     * Scope a query to only include active products.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Scope a query to only include featured products.
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope a query to filter by condition.
     */
    public function scopeCondition($query, $condition)
    {
        return $query->where('condition', $condition);
    }

    /**
     * Scope a query to filter by location.
     */
    public function scopeLocation($query, $governorate)
    {
        return $query->where('location_governorate', $governorate);
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            if (empty($product->slug)) {
                $slug_base = $product->name_ar ?: $product->name;
                $product->slug = Str::slug($slug_base) . '-' . Str::random(6);
            }
            if (empty($product->sku)) {
                $product->sku = 'SKU-' . strtoupper(Str::random(8));
            }
        });
    }

    /**
     * Get the product's discount percentage.
     */
    public function getDiscountPercentageAttribute()
    {
        if ($this->sale_price && $this->price > $this->sale_price) {
            return round((($this->price - $this->sale_price) / $this->price) * 100);
        }
        return 0;
    }

    /**
     * Check if product is on sale.
     */
    public function getIsOnSaleAttribute()
    {
        return $this->sale_price && $this->sale_price < $this->price;
    }

    /**
     * Scope a query to only include in stock products.
     */
    public function scopeInStock($query)
    {
        return $query->where('stock_quantity', '>', 0);
    }

    /**
     * Get the effective selling price (sale price if available, otherwise regular price).
     */
    public function getEffectivePriceAttribute()
    {
        return $this->sale_price ?: $this->price;
    }

    /**
     * Increment views count.
     */
    public function incrementViews()
    {
        $this->increment('views_count');
    }
}
