<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type',
        'phone',
        'governorate',
        'city',
        'store_name',
        'store_phone',
        'store_description',
        'store_address',
        'store_latitude',
        'store_longitude',
        'store_logo',
        'store_cover',
        'store_verified',
        'store_rating',
        'store_reviews_count',
        'registration_completed',
        'store_created_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'store_verified' => 'boolean',
            'registration_completed' => 'boolean',
            'store_created_at' => 'datetime',
            'store_rating' => 'decimal:2',
            'store_latitude' => 'decimal:8',
            'store_longitude' => 'decimal:8',
        ];
    }

    /**
     * Get products for this user (if vendor)
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Check if user is a vendor
     */
    public function isVendor()
    {
        return $this->user_type === 'vendor';
    }

    /**
     * Check if user is a customer
     */
    public function isCustomer()
    {
        return $this->user_type === 'customer';
    }

    /**
     * Get store display name
     */
    public function getStoreDisplayNameAttribute()
    {
        return $this->store_name ?: $this->name;
    }
}
