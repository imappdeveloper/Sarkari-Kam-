<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WalletTransaction extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'wallet_transactions';

    protected $fillable = [
        'wallet_id',
        'transaction_type',
        'amount',
        'description',
        'reference_id',
        'reference_type',
        'balance_before',
        'balance_after',
        'created_at',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'balance_before' => 'decimal:2',
        'balance_after' => 'decimal:2',
        'created_at' => 'datetime',
    ];

    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }
}
