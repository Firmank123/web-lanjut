<!DOCTYPE html> <!-- Mendefinisikan tipe dokumen sebagai HTML5 -->
<html> <!-- Tag pembuka elemen html -->
<head> <!-- Bagian kepala dari dokumen HTML -->
    <title>Add Item</title> <!-- Judul halaman yang akan ditampilkan pada tab browser -->
</head>
<body> <!-- Bagian tubuh dari dokumen HTML -->
    <h1>Add Item</h1> <!-- Judul utama halaman -->
    <form action="{{ route('items.store') }}" method="POST"> <!-- Form untuk menambahkan item baru, mengirim data dengan metode POST -->
        @csrf <!-- Menambahkan token CSRF untuk keamanan -->
        <label for="name">Name:</label> <!-- Label untuk input nama -->
        <input type="text" name="name" required> <!-- Input teks untuk nama, wajib diisi -->
        <br> <!-- Baris baru -->
        <label for="description">Description:</label> <!-- Label untuk input deskripsi -->
        <textarea name="description" required></textarea> <!-- Area teks untuk deskripsi, wajib diisi -->
        <br> <!-- Baris baru -->
        <button type="submit">Add Item</button> <!-- Tombol untuk mengirim form -->
    </form>
    <a href="{{ route('items.index') }}">Back to List</a> <!-- Link untuk kembali ke daftar item -->
</body>
</html> <!-- Tag penutup elemen html -->
