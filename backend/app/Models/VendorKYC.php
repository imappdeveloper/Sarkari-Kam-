<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class VendorKYC extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'vendor_kyc';

    protected $fillable = [
        'vendor_id',
        'aadhar_number',
        'pan_number',
        'gst_number',
        'bank_account_number',
        'bank_ifsc_code',
        'bank_name',
        'account_holder_name',
        'address_proof',
        'identity_proof',
        'business_proof',
        'status',
        'rejection_reason',
        'verified_at',
        'verified_by',
    ];

    protected $casts = [
        'verified_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function verifiedBy()
    {
        return $this->belongsTo(Admin::class, 'verified_by');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }
}
