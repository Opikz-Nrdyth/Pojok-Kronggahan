# Pojok Kronggahan News Website

<div align="center">
  <img src="https://opikstudio.my.id/logo_White.png" alt="Opik Studio Logo" width="200"/>
  
  *Developed by Opik Studio*
</div>

## 📰 About Project

Website **Pojok Kronggahan** adalah platform informasi yang didedikasikan untuk masyarakat Desa Kronggahan. Kami menyediakan berita terkini, fitur interaktif seperti global chat, dan layanan untuk mempermudah komunikasi antara warga dan admin.

Melalui website ini, kami berharap dapat meningkatkan keterhubungan, transparansi, dan kemajuan Desa Kronggahan.

-   **Misi:** Menyediakan informasi terpercaya untuk masyarakat.
-   **Visi:** Mewujudkan Desa Kronggahan yang terhubung secara digital.
-   **Fitur Utama:** Global Chat, Berita Terkini, dan Layanan Kontak Admin.

### 🌟 Fitur Utama

#### 1. Sistem Live Chat Ganda

-   **Customer Service Chat**: Layanan bantuan personal untuk pengguna
-   **Public Chat**: Ruang diskusi publik untuk pembaca berita
-   Fitur typing indicator
-   Status online/offline
-   History chat

#### 2. Admin Panel

-   Manajemen konten berita
-   CRUD operasi untuk semua konten
-   Monitoring aktivitas user
-   Analisis statistik pengunjung
-   Manajemen user dan role
-   Content Management System (CMS) yang fleksibel

#### 3. Sistem Trending

Algoritma trending berdasarkan:

-   Jumlah klik
-   Like dan Dislike
-   Jam tayang
-   Engagement rate

#### 4. Content Management

-   Editor WYSIWYG
-   Media library
-   ategori management

## 🛠️ Panduan Instalasi

### Prasyarat

```bash
PHP >= 8.1
Composer
Node.js & NPM
MySQL
```

### 1. Instalasi Laravel

```bash
# Clone repository
git clone https://github.com/Opikz-Nrdyth/Pojok-Kronggahan.git

# Masuk ke direktori project
cd pojok-kronggahan

# Install dependencies
composer install
npm install

# Setup environment
php artisan key:generate

# Migrasi database
php artisan migrate
```

### 2. Membuat Component

```bash

#Proses Pembuatan Website Meliputi
# Buat component view
php artisan make:component NewsCard
php artisan make:component ChatBox
php artisan make:component TrendingSection
```

### 3. Setup Livewire

```bash
# Install Livewire
composer require livewire/livewire

# Buat Livewire component
php artisan make:livewire LiveChat
php artisan make:livewire News
php artisan make:livewire Search
```

### 4. Konfigurasi WebSocket & Pusher

```bash
# Install dependencies
composer require pusher/pusher-php-server
npm install laravel-echo pusher-js

# Setup Pusher di .env
PUSHER_APP_ID=161230
PUSHER_APP_KEY=031fde3c-09b7-48d1-847f-879091bfddc9
PUSHER_APP_SECRET=zjyReOHUFvjrpd83OSODlIfHYzdS8SQq
PUSHER_HOST=127.0.0.1
PUSHER_PORT=6001
PUSHER_SCHEME=http
PUSHER_APP_CLUSTER=mt1

```

### 5. Menjalankan Aplikasi

```bash
# Compile assets
npm run dev

# Jalankan server
php artisan serve
```

## 🔧 Struktur Database

### Tabel Utama

-   users
-   news
-   categories
-   chat_rooms
-   chat_messages
-   engagements
-   social_media
-   websites

## 📦 Dependencies

-   Laravel Framework
-   Livewire
-   Laravel Echo
-   Pusher
-   Alpine.js

## 📝 Lisensi

Dikembangkan oleh [Opik Studio](https://opikstudio.my.id)
Demo Website [Disini](https://pojok-kronggahan.opikstudio.my.id/)

© 2024 Opik Studio. All rights reserved.

## 📞 Kontak

Opik Studio - [Website](https://opikstudio.my.id)

Project Link: [https://github.com/Opikz-Nrdyth/Pojok-Kronggahan.git](https://github.com/Opikz-Nrdyth/Pojok-Kronggahan.git)
