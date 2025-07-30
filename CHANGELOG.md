# Changelog

All notable changes to this project will be documented in this file.

## [1.1.0] - 2025-07-29

### Added
- Field `status` ke tabel `barbers` dan `layanans`
- Scope `active()` dan `inactive()` di model Barber dan Layanan
- Method `isActive()` untuk cek status aktif
- Accessor `formatted_harga` dan `formatted_status` di model
- Validasi yang lebih ketat di semua controller
- Error handling yang lebih baik di form
- Badge status di view untuk menampilkan status dengan warna yang sesuai

### Changed
- Memperbaiki semua controller untuk menggunakan scope active
- Mengupdate semua view dengan design yang konsisten
- Memperbaiki validasi di BookingController dan PemesananLangsungController
- Mengupdate seeder untuk menambahkan field status
- Memperbaiki middleware role untuk keamanan yang lebih baik

### Fixed
- Syntax error di DatabaseSeeder
- Masalah dengan class CSS yang tidak terdefinisi
- Validasi yang tidak konsisten di controller
- Error handling yang kurang baik
- Masalah dengan relasi antar model

### Security
- Menambahkan pengecekan status aktif sebelum operasi
- Memperbaiki middleware role untuk mencegah akses yang tidak sah
- Menambahkan validasi input yang lebih ketat
- Mencegah akses ke data yang tidak aktif

## [1.0.0] - 2025-07-15

### Added
- Sistem multi-role (Admin, Manajer, Pelanggan)
- Dashboard admin dengan statistik lengkap
- Manajemen barber dan layanan
- Sistem booking online
- Sistem antrian real-time
- Pemesanan langsung untuk walk-in customer
- Sistem transaksi dan pembayaran
- Authentication dengan Laravel Breeze
- Responsive design dengan Tailwind CSS
- Role-based access control

### Features
- **Admin Dashboard**: Monitor statistik barbershop, kelola barber dan layanan
- **Manajer Dashboard**: Kelola transaksi dan laporan keuangan
- **Pelanggan Dashboard**: Booking layanan, pemesanan langsung, dan antrian
- **Sistem Antrian**: Antrian real-time dengan status (menunggu, dipanggil, proses, selesai)
- **Sistem Transaksi**: Pencatatan pembayaran dengan berbagai metode
- **Multi-role System**: Akses berbeda berdasarkan role user

### Technical
- Laravel 12.x sebagai backend framework
- Tailwind CSS untuk styling
- Alpine.js untuk interaktivitas
- MySQL/PostgreSQL untuk database
- Laravel Breeze untuk authentication
- Custom middleware untuk role-based access

---

## Format Changelog

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

### Types of Changes

- **Added** for new features
- **Changed** for changes in existing functionality
- **Deprecated** for soon-to-be removed features
- **Removed** for now removed features
- **Fixed** for any bug fixes
- **Security** in case of vulnerabilities 