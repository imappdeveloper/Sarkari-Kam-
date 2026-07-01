<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'long_description',
        'icon',
        'image',
        'base_price',
        'price_unit',
        'estimated_days',
        'is_active',
        'requires_form',
        'form_schema',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'requires_form' => 'boolean',
        'form_schema' => 'array',
        'base_price' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function requirements()
    {
        return $this->hasMany(Requirement::class);
    }

    public function vendors()
    {
        return $this->belongsToMany(Vendor::class, 'vendor_services')
            ->withPivot(['is_active', 'experience_years', 'completion_rate']);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
