<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class GovernmentScheme extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'government_schemes';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'government_body',
        'eligibility_criteria',
        'required_documents',
        'benefits',
        'start_date',
        'end_date',
        'official_url',
        'contact_info',
        'tags',
        'is_active',
    ];

    protected $casts = [
        'eligibility_criteria' => 'array',
        'required_documents' => 'array',
        'benefits' => 'array',
        'tags' => 'array',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function services()
    {
        return $this->belongsToMany(Service::class, 'scheme_services');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
