<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    protected $fillable = [
        'user_id',
        'barber_id',
        'nomor_antrian',
        'status',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function barber()
    {
        return $this->belongsTo(Barber::class);
    }

    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'menunggu' => 'bg-yellow-100 text-yellow-800',
            'dipanggil' => 'bg-blue-100 text-blue-800',
            'proses' => 'bg-orange-100 text-orange-800',
            'selesai' => 'bg-green-100 text-green-800',
            default => 'bg-gray-100 text-gray-800',
        };
    }

    public function getStatusTextAttribute()
    {
        return match($this->status) {
            'menunggu' => 'Menunggu',
            'dipanggil' => 'Dipanggil',
            'proses' => 'Sedang Diproses',
            'selesai' => 'Selesai',
            default => 'Tidak Diketahui',
        };
    }
}
