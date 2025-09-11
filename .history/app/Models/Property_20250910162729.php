<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    // لو حابب تمنع Mass Assignment العكسي استخدم $fillable
    protected $fillable = [
        'user_id',
        'category',
        'unit_type',
        'title',
        'rooms',
        'bathrooms',
        'floor',
        'area_sqm',
        'finishing_status',
        'furniture_status',
        'payment_method',
        'price',
        'deposit_amount',
        'address_line',
        'address_details',
        'latitude',
        'longitude',
        'ar_link',
        'vr_link',
        'status',
    ];

    protected $casts = [
        'rooms'          => 'integer',
        'bathrooms'      => 'integer',
        'floor'          => 'integer',
        'area_sqm'       => 'integer',
        'price'          => 'decimal:2',
        'deposit_amount' => 'decimal:2',
        'latitude'       => 'float',
        'longitude'      => 'float',
    ];

    /* =======================
     |  Relations
     |=======================*/
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // لو عامل جداول للصور/الملفات
    public function images()
    {
        return $this->hasMany(PropertyImage::class)->orderBy('sort_order');
    }

    public function attachments()
    {
        return $this->hasMany(PropertyAttachment::class);
    }

    /* =======================
     |  Accessors / Helpers
     |=======================*/
    public function getIsPublishedAttribute(): bool
    {
        return $this->status === 'published';
    }
}
