<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proposal extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'requirement_id',
        'vendor_id',
        'title',
        'description',
        'price_offered',
        'delivery_days',
        'terms_conditions',
        'attachments',
        'status',
        'submitted_at',
        'accepted_at',
        'rejected_at',
    ];

    protected $casts = [
        'attachments' => 'array',
        'price_offered' => 'decimal:2',
        'submitted_at' => 'datetime',
        'accepted_at' => 'datetime',
        'rejected_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function requirement()
    {
        return $this->belongsTo(Requirement::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeAccepted($query)
    {
        return $query->where('status', 'accepted');
    }
}
