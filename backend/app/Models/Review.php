<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'order_id',
        'customer_id',
        'vendor_id',
        'rating',
        'title',
        'comment',
        'attachments',
        'is_verified_purchase',
        'helpful_count',
    ];

    protected $casts = [
        'attachments' => 'array',
        'is_verified_purchase' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function scopeApproved($query)
    {
        return $query->where('is_approved', true);
    }
}
