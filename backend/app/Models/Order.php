<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'requirement_id',
        'proposal_id',
        'customer_id',
        'vendor_id',
        'order_number',
        'service_id',
        'price',
        'currency',
        'payment_status',
        'order_status',
        'escrow_status',
        'delivery_date',
        'completion_date',
        'notes',
        'attachments',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'attachments' => 'array',
        'delivery_date' => 'datetime',
        'completion_date' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function requirement()
    {
        return $this->belongsTo(Requirement::class);
    }

    public function proposal()
    {
        return $this->belongsTo(Proposal::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function escrowPayment()
    {
        return $this->hasOne(EscrowPayment::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function scopeActive($query)
    {
        return $query->whereIn('order_status', ['pending', 'in_progress']);
    }
}
