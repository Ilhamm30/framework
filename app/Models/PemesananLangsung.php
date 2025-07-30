<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PemesananLangsung extends Model
{
    protected $fillable = [
        'user_id',
        'layanan_id',
        'barber_id',
        'total_harga',
        'metode_bayar',
        'status',
        'catatan',
        'waktu_pemesanan',
        'waktu_pembayaran',
        'waktu_selesai',
    ];

    protected $casts = [
        'waktu_pemesanan' => 'datetime',
        'waktu_pembayaran' => 'datetime',
        'waktu_selesai'    => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }

    public function barber()
    {
        return $this->belongsTo(Barber::class);
    }

    /**
     * Get formatted total harga
     */
    public function getFormattedTotalHargaAttribute()
    {
        return 'Rp ' . number_format($this->total_harga, 0, ',', '.');
    }

    /**
     * Get formatted status
     */
    public function getFormattedStatusAttribute()
    {
        return ucfirst($this->status);
    }

    /**
     * Check if pemesanan is pending
     */
    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    /**
     * Check if pemesanan is in progress
     */
    public function isInProgress(): bool
    {
        return $this->status === 'proses';
    }

    /**
     * Check if pemesanan is completed
     */
    public function isCompleted(): bool
    {
        return $this->status === 'selesai';
    }

    /**
     * Check if pemesanan is cancelled
     */
    public function isCancelled(): bool
    {
        return $this->status === 'dibatalkan';
    }

    /**
     * Scope for pending pemesanan
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope for in progress pemesanan
     */
    public function scopeInProgress($query)
    {
        return $query->where('status', 'proses');
    }

    /**
     * Scope for completed pemesanan
     */
    public function scopeCompleted($query)
    {
        return $query->where('status', 'selesai');
    }

    /**
     * Scope for cancelled pemesanan
     */
    public function scopeCancelled($query)
    {
        return $query->where('status', 'dibatalkan');
    }
}
