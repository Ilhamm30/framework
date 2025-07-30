<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'deskripsi',
        'harga',
        'status',
    ];

    // Relasi ke bookings
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * Check if layanan is active
     */
    public function isActive(): bool
    {
        return $this->status === 'aktif';
    }

    /**
     * Scope untuk layanan yang aktif
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'aktif');
    }

    /**
     * Scope untuk layanan yang nonaktif
     */
    public function scopeInactive($query)
    {
        return $query->where('status', 'nonaktif');
    }

    /**
     * Format harga ke rupiah
     */
    public function getFormattedHargaAttribute()
    {
        return 'Rp ' . number_format($this->harga, 0, ',', '.');
    }
}
