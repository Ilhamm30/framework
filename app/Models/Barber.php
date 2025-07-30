<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barber extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'specialty',
        'bio',
        'image',
        'status',
    ];

    /**
     * Relasi ke Booking
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * Check apakah barber aktif
     */
    public function isActive(): bool
    {
        return strtolower($this->status) === 'aktif';
    }

    /**
     * Scope untuk barber yang aktif
     */
    public function scopeActive($query)
    {
        return $query->whereRaw("LOWER(status) = 'aktif'");
    }

    /**
     * Scope untuk barber yang nonaktif
     */
    public function scopeInactive($query)
    {
        return $query->whereRaw("LOWER(status) = 'nonaktif'");
    }

    /**
     * Accessor: selalu lowercase untuk konsistensi
     */
    public function getStatusAttribute($value)
    {
        return strtolower($value);
    }
}
