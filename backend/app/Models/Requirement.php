<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Requirement extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'service_id',
        'customer_id',
        'title',
        'description',
        'form_data',
        'budget_min',
        'budget_max',
        'budget_currency',
        'timeline_days',
        'status',
        'attachment_urls',
        'assigned_vendor_id',
        'published_at',
    ];

    protected $casts = [
        'form_data' => 'array',
        'attachment_urls' => 'array',
        'budget_min' => 'decimal:2',
        'budget_max' => 'decimal:2',
        'published_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function proposals()
    {
        return $this->hasMany(Proposal::class);
    }

    public function assignedVendor()
    {
        return $this->belongsTo(Vendor::class, 'assigned_vendor_id');
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }

    public function scopeOpen($query)
    {
        return $query->where('status', 'open');
    }

    public function scopeAssigned($query)
    {
        return $query->where('status', 'assigned');
    }
}
