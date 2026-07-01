<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wallet extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'balance',
        'currency',
        'status',
        'last_transaction_at',
    ];

    protected $casts = [
        'balance' => 'decimal:2',
        'last_transaction_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactions()
    {
        return $this->hasMany(WalletTransaction::class);
    }

    public function addBalance($amount)
    {
        $this->increment('balance', $amount);
        $this->touch('last_transaction_at');
    }

    public function deductBalance($amount)
    {
        if ($this->balance >= $amount) {
            $this->decrement('balance', $amount);
            $this->touch('last_transaction_at');
            return true;
        }
        return false;
    }
}
