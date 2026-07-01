<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AutomationJob extends Model
{
    use HasFactory;

    protected $table = 'automation_jobs';

    protected $fillable = [
        'job_id',
        'order_id',
        'service_id',
        'job_type',
        'status',
        'website_url',
        'input_data',
        'output_data',
        'screenshots',
        'error_message',
        'retry_count',
        'max_retries',
        'started_at',
        'completed_at',
        'notes',
    ];

    protected $casts = [
        'input_data' => 'array',
        'output_data' => 'array',
        'screenshots' => 'array',
        'started_at' => 'datetime',
        'completed_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }
}
