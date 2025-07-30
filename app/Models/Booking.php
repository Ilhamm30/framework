<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Transaksi; // tambahkan ini di bagian atas


class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'layanan_id',
        'barber_id',
        'tanggal',
        'jam',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    // Relasi ke user (pelanggan)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke layanan
    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }

    // Relasi ke barber
    public function barber()
    {
        return $this->belongsTo(Barber::class);
    }

    // Relasi ke transaksi
    public function transaksi()
    {
        return $this->hasOne(Transaksi::class);
    }

    /**
     * Get formatted tanggal
     */
    public function getFormattedTanggalAttribute()
    {
        return $this->tanggal->format('d M Y');
    }

    /**
     * Get formatted jam
     */
    public function getFormattedJamAttribute()
    {
        return $this->jam;
    }

    /**
     * Check if booking is today
     */
    public function isToday(): bool
    {
        return $this->tanggal->isToday();
    }

    /**
     * Check if booking is in the past
     */
    public function isPast(): bool
    {
        return $this->tanggal->isPast();
    }

    /**
     * Check if booking is in the future
     */
    public function isFuture(): bool
    {
        return $this->tanggal->isFuture();
    }

    /**
     * Scope for today's bookings
     */
    public function scopeToday($query)
    {
        return $query->whereDate('tanggal', today());
    }

    /**
     * Scope for future bookings
     */
    public function scopeFuture($query)
    {
        return $query->where('tanggal', '>=', today());
    }

    /**
     * Scope for past bookings
     */
    public function scopePast($query)
    {
        return $query->where('tanggal', '<', today());
    }
}
