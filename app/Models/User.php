<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Check if user has specific role
     */
    public function hasRole(string $role): bool
    {
        return $this->role === $role;
    }

    /**
     * Check if user has any of the given roles
     */
    public function hasAnyRole(array $roles): bool
    {
        return in_array($this->role, $roles);
    }

    /**
     * Check if user is admin
     */
    public function isAdmin(): bool
    {
        return $this->hasRole('admin');
    }

    /**
     * Check if user is manajer
     */
    public function isManajer(): bool
    {
        return $this->hasRole('manajer');
    }

    /**
     * Check if user is pelanggan
     */
    public function isPelanggan(): bool
    {
        return $this->hasRole('pelanggan');
    }

    // Relasi ke bookings
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    // Relasi ke pemesanan langsung
    public function pemesananLangsungs()
    {
        return $this->hasMany(PemesananLangsung::class);
    }

    // Relasi ke antrian
    public function antrians()
    {
        return $this->hasMany(Antrian::class);
    }
}
