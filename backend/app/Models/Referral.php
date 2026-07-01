<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Referral extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'referrer_id',
        'referred_user_id',
        'referral_code',
        'status',
        'reward_amount',
        'currency',
        'redeemed_at',
        'expires_at',
    ];

    protected $casts = [
        'reward_amount' => 'decimal:2',
        'redeemed_at' => 'datetime',
        'expires_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function referrer()
    {
        return $this->belongsTo(User::class, 'referrer_id');
    }

    public function referredUser()
    {
        return $this->belongsTo(User::class, 'referred_user_id');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }
}
