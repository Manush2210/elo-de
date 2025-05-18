<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultationType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'is_active',
        'sort_order'
    ];

    /**
     * Les rendez-vous associés à ce type de consultation
     */
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    /**
     * Obtenir uniquement les types de consultation actifs
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order');
    }

    /**
     * Obtenir le chemin complet de l'image
     */
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }
}
