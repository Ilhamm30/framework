# 📚 Dokumentasi API - Sistem Manajemen Barbershop

## 🔐 Authentication

Sistem menggunakan Laravel Breeze untuk authentication. Semua endpoint yang memerlukan authentication menggunakan middleware `auth`.

## 👥 User Management

### Login
```
POST /login
Content-Type: application/json

{
    "email": "admin@barbershop.com",
    "password": "password"
}
```

### Register
```
POST /register
Content-Type: application/json

{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "password",
    "password_confirmation": "password"
}
```

### Logout
```
POST /logout
```

## 📅 Booking System

### Get All Bookings (Pelanggan)
```
GET /pelanggan/bookings
Authorization: Bearer {token}
```

### Create Booking
```
POST /pelanggan/bookings
Authorization: Bearer {token}
Content-Type: application/json

{
    "layanan_id": 1,
    "barber_id": 1,
    "tanggal": "2024-01-15",
    "waktu": "14:00",
    "catatan": "Catatan khusus"
}
```

### Get Booking Detail
```
GET /pelanggan/bookings/{id}
Authorization: Bearer {token}
```

### Update Booking
```
PUT /pelanggan/bookings/{id}
Authorization: Bearer {token}
Content-Type: application/json

{
    "layanan_id": 1,
    "barber_id": 1,
    "tanggal": "2024-01-15",
    "waktu": "15:00",
    "catatan": "Catatan yang diupdate"
}
```

### Delete Booking
```
DELETE /pelanggan/bookings/{id}
Authorization: Bearer {token}
```

## 🎯 Antrian System

### Get Antrian Hari Ini
```
GET /antrian
```

### Ambil Antrian
```
POST /antrian/ambil
Authorization: Bearer {token}
Content-Type: application/json

{
    "barber_id": 1
}
```

### Update Status Antrian (Admin/Manajer)
```
PATCH /antrian/{id}/status
Authorization: Bearer {token}
Content-Type: application/json

{
    "status": "dipanggil"
}
```

### Panggil Antrian (Admin/Manajer)
```
PATCH /antrian/{id}/panggil
Authorization: Bearer {token}
```

### Mulai Proses (Admin/Manajer)
```
PATCH /antrian/{id}/mulai
Authorization: Bearer {token}
```

### Selesai (Admin/Manajer)
```
PATCH /antrian/{id}/selesai
Authorization: Bearer {token}
```

## 💰 Pemesanan Langsung

### Get All Pemesanan Langsung
```
GET /pelanggan/pemesanan-langsung
Authorization: Bearer {token}
```

### Create Pemesanan Langsung
```
POST /pelanggan/pemesanan-langsung
Authorization: Bearer {token}
Content-Type: application/json

{
    "layanan_id": 1,
    "barber_id": 1,
    "metode_bayar": "tunai",
    "catatan": "Catatan khusus"
}
```

### Get Pemesanan Langsung Detail
```
GET /pelanggan/pemesanan-langsung/{id}
Authorization: Bearer {token}
```

### Update Status Pemesanan
```
PATCH /pelanggan/pemesanan-langsung/{id}/status
Authorization: Bearer {token}
Content-Type: application/json

{
    "status": "selesai"
}
```

## 👨‍💼 Barber Management (Admin)

### Get All Barbers
```
GET /admin/barbers
Authorization: Bearer {token}
```

### Create Barber
```
POST /admin/barbers
Authorization: Bearer {token}
Content-Type: application/json

{
    "nama": "John Barber",
    "spesialisasi": "Potong Rambut",
    "email": "john@barbershop.com",
    "telepon": "08123456789"
}
```

### Get Barber Detail
```
GET /admin/barbers/{id}
Authorization: Bearer {token}
```

### Update Barber
```
PUT /admin/barbers/{id}
Authorization: Bearer {token}
Content-Type: application/json

{
    "nama": "John Barber Updated",
    "spesialisasi": "Potong Rambut & Beard",
    "email": "john@barbershop.com",
    "telepon": "08123456789"
}
```

### Delete Barber
```
DELETE /admin/barbers/{id}
Authorization: Bearer {token}
```

## 🛠️ Layanan Management (Admin)

### Get All Layanans
```
GET /admin/layanans
Authorization: Bearer {token}
```

### Create Layanan
```
POST /admin/layanans
Authorization: Bearer {token}
Content-Type: application/json

{
    "nama": "Potong Rambut",
    "deskripsi": "Potong rambut dengan teknik modern",
    "harga": 50000,
    "durasi": 30
}
```

### Get Layanan Detail
```
GET /admin/layanans/{id}
Authorization: Bearer {token}
```

### Update Layanan
```
PUT /admin/layanans/{id}
Authorization: Bearer {token}
Content-Type: application/json

{
    "nama": "Potong Rambut Premium",
    "deskripsi": "Potong rambut dengan teknik modern",
    "harga": 75000,
    "durasi": 45
}
```

### Delete Layanan
```
DELETE /admin/layanans/{id}
Authorization: Bearer {token}
```

## 💼 Transaksi Management (Manajer)

### Get All Transaksis
```
GET /manajer/transaksis
Authorization: Bearer {token}
```

### Create Transaksi
```
POST /manajer/transaksis
Authorization: Bearer {token}
Content-Type: application/json

{
    "pemesanan_langsung_id": 1,
    "jumlah_bayar": 50000,
    "metode_bayar": "tunai",
    "keterangan": "Pembayaran tunai"
}
```

### Get Transaksi Detail
```
GET /manajer/transaksis/{id}
Authorization: Bearer {token}
```

### Update Transaksi
```
PUT /manajer/transaksis/{id}
Authorization: Bearer {token}
Content-Type: application/json

{
    "jumlah_bayar": 50000,
    "metode_bayar": "transfer",
    "keterangan": "Pembayaran transfer"
}
```

### Delete Transaksi
```
DELETE /manajer/transaksis/{id}
Authorization: Bearer {token}
```

## 📊 Dashboard Endpoints

### Admin Dashboard
```
GET /admin
Authorization: Bearer {token}
```

### Manajer Dashboard
```
GET /manajer
Authorization: Bearer {token}
```

### Pelanggan Dashboard
```
GET /pelanggan
Authorization: Bearer {token}
```

## 🔄 Response Format

### Success Response
```json
{
    "success": true,
    "message": "Data berhasil diambil",
    "data": {
        // Data response
    }
}
```

### Error Response
```json
{
    "success": false,
    "message": "Pesan error",
    "errors": {
        "field": ["Error message"]
    }
}
```

## 🔒 Status Codes

- `200` - Success
- `201` - Created
- `400` - Bad Request
- `401` - Unauthorized
- `403` - Forbidden
- `404` - Not Found
- `422` - Validation Error
- `500` - Server Error

## 📝 Notes

1. Semua endpoint yang memerlukan authentication harus menyertakan header `Authorization: Bearer {token}`
2. Response format menggunakan JSON
3. Validation error akan mengembalikan detail error untuk setiap field
4. Pagination tersedia untuk endpoint yang mengembalikan list data
5. File upload menggunakan `multipart/form-data` 