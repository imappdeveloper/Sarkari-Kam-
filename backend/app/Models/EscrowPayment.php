<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EscrowPayment extends Model
{
    use HasFactory;

    protected $table = 'escrow_payments';

    protected $fillable = [
        'order_id',
        'payment_id',
        'amount',
        'currency',
        'status',
        'held_at',
        'released_at',
        'refunded_at',
        'transaction_id',
        'notes',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'held_at' => 'datetime',
        'released_at' => 'datetime',
        'refunded_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'held');
    }
}
