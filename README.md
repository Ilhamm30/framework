# Sistem Manajemen Barbershop

Aplikasi Laravel modern untuk mengelola barbershop dengan fitur booking, antrian, dan transaksi.

## 🚀 Fitur Utama

- **Dashboard Admin**: Monitor statistik barbershop
- **Manajemen Barber**: Tambah, edit, hapus data barber
- **Manajemen Layanan**: Kelola layanan dan harga
- **Sistem Booking**: Pelanggan dapat booking layanan
- **Sistem Antrian**: Antrian real-time untuk pelanggan
- **Pemesanan Langsung**: Untuk pelanggan yang datang langsung
- **Sistem Transaksi**: Pencatatan pembayaran
- **Multi-role**: Admin, Manajer, dan Pelanggan

## 🔧 Perbaikan yang Telah Dilakukan

### 1. Database & Migration
- ✅ Menambahkan field `status` ke tabel `barbers` dan `layanans`
- ✅ Menggunakan enum untuk status (aktif/nonaktif)
- ✅ Memperbaiki struktur migration

### 2. Model Improvements
- ✅ Menambahkan scope `active()` dan `inactive()` di model Barber dan Layanan
- ✅ Menambahkan method `isActive()` untuk cek status
- ✅ Menambahkan accessor untuk format harga dan status
- ✅ Memperbaiki relasi antar model

### 3. Controller Improvements
- ✅ Memperbaiki validasi di semua controller
- ✅ Menambahkan pengecekan status aktif sebelum operasi
- ✅ Menggunakan scope active untuk query data
- ✅ Memperbaiki error handling

### 4. View Improvements
- ✅ Menggunakan class CSS yang konsisten
- ✅ Menambahkan field status di form
- ✅ Memperbaiki tampilan tabel dengan badge status
- ✅ Menambahkan error handling di form

### 5. Security & Validation
- ✅ Memperbaiki middleware role
- ✅ Menambahkan validasi yang lebih ketat
- ✅ Mencegah akses ke data yang tidak aktif

## 📋 Requirements

- PHP >= 8.2
- Laravel >= 12.0
- MySQL/PostgreSQL
- Node.js & NPM

## 🛠️ Installation

1. **Clone repository**
```bash
git clone <repository-url>
cd barbershop-sim
```

2. **Install dependencies**
```bash
composer install
npm install
```

3. **Setup environment**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Configure database di .env**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=barbershop_sim
DB_USERNAME=root
DB_PASSWORD=
```

5. **Run migrations dan seeders**
```bash
php artisan migrate
php artisan db:seed
```

6. **Build assets**
```bash
npm run build
```

7. **Start server**
```bash
php artisan serve
```

## 👥 Default Users

Setelah menjalankan seeder, Anda dapat login dengan:

### Admin
- Email: admin@barbershop.com
- Password: password

### Manajer
- Email: manajer@barbershop.com
- Password: password

### Pelanggan
- Email: pelanggan@barbershop.com
- Password: password

## 🎨 UI/UX Improvements

- ✅ Menggunakan Tailwind CSS dengan custom components
- ✅ Responsive design untuk mobile dan desktop
- ✅ Consistent color scheme dengan primary orange
- ✅ Modern card-based layout
- ✅ Smooth animations dan transitions

## 🔒 Security Features

- ✅ Role-based access control
- ✅ CSRF protection
- ✅ Input validation dan sanitization
- ✅ Proper error handling
- ✅ User authorization checks

## 📊 Dashboard Features

- ✅ Real-time statistics
- ✅ Chart visualizations
- ✅ Quick action buttons
- ✅ Recent activity feed
- ✅ Performance metrics

## 🚀 Performance Optimizations

- ✅ Eager loading untuk relasi
- ✅ Database indexing
- ✅ Query optimization
- ✅ Caching strategies
- ✅ Asset optimization

## 📝 Changelog

### v1.1.0 (Latest)
- ✅ Menambahkan field status ke Barber dan Layanan
- ✅ Memperbaiki semua controller dan model
- ✅ Mengupdate semua view dengan design yang konsisten
- ✅ Menambahkan validasi yang lebih ketat
- ✅ Memperbaiki error handling

### v1.0.0
- ✅ Initial release dengan fitur dasar

## 🤝 Contributing

1. Fork repository
2. Create feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to branch (`git push origin feature/AmazingFeature`)
5. Open Pull Request

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🆘 Support

Jika Anda mengalami masalah atau memiliki pertanyaan, silakan buat issue di repository ini.

---

**Dibuat dengan ❤️ menggunakan Laravel**
