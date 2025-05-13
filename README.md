# 🛠️ Aplikasi Web Sederhana yang Rentan (Simple Vulnerable Web Application)

## 📌 Ringkasan

Aplikasi web ini dibuat **khusus untuk tujuan edukasi**, yaitu untuk mendemonstrasikan **berbagai kerentanan keamanan pada web** yang sering terjadi. Webapp ini sangat cocok untuk **pemula** yang ingin belajar tentang **keamanan web** karena:

* Tidak memerlukan pengaturan yang rumit.
* Hanya perlu menjalankan perintah Docker untuk langsung memulai.

---

## ✅ Prasyarat Sebelum Menjalankan

Sebelum menggunakan aplikasi ini, pastikan Anda sudah menginstal:

* [Docker](https://www.docker.com/) – digunakan untuk menjalankan aplikasi dalam container.
* [Git](https://git-scm.com/) – digunakan untuk mengkloning repositori dari GitHub.

---

## 🚀 Cara Menggunakan Aplikasi

Ikuti langkah-langkah berikut untuk menjalankan aplikasi ini di komputer Anda:

1. **Klon repositori dari GitHub:**

   ```bash
   git clone https://github.com/Fauzan-Aldi/Simple-Vulnerable-Web-Application.git
   ```

2. **Masuk ke direktori kerentanan yang ingin Anda eksplorasi**
   Misalnya, untuk mencoba modul kerentanan "LFI" (Local File Inclusion):

   ```bash
   cd Simple-Vulnerable-Web-Application/lfi
   ```

3. **Jalankan aplikasi menggunakan Docker Compose:**

   ```bash
   docker-compose up -d
   ```

4. **Akses aplikasi dari browser:**

   Buka [http://localhost](http://localhost) di peramban (browser) Anda.

5. ✅ **Aplikasi siap digunakan!**
   Anda bisa mulai mengeksplorasi dan menguji kerentanan yang tersedia.
