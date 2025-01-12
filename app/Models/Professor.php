<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'specialty',
        'type',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    const TYPES = [
        'permanent' => 'Permanent',
        'vacataire' => 'Vacataire'
    ];

    public function getTypeTextAttribute()
    {
        return self::TYPES[$this->type] ?? $this->type;
    }

    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }
} 