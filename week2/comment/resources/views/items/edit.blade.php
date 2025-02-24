<!DOCTYPE html> <!-- Mendefinisikan tipe dokumen sebagai HTML5 -->
<html> <!-- Tag pembuka elemen html -->
<head> <!-- Bagian kepala dari dokumen HTML -->
    <title>Edit Item</title> <!-- Judul halaman yang akan ditampilkan pada tab browser -->
</head>
<body> <!-- Bagian tubuh dari dokumen HTML -->
    <h1>Edit Item</h1> <!-- Judul utama halaman -->
    <form action="{{ route('items.update', $item) }}" method="POST"> <!-- Form untuk mengedit item, mengirim data dengan metode POST -->
        @csrf <!-- Menambahkan token CSRF untuk keamanan -->
        @method('PUT') <!-- Menggunakan metode HTTP PUT untuk update -->
        <label for="name">Name:</label> <!-- Label untuk input nama -->
        <input type="text" name="name" value="{{ $item->name }}" required> <!-- Input teks untuk nama, dengan nilai default dari item yang di-edit, wajib diisi -->
        <br> <!-- Baris baru -->
        <label for="description">Description:</label> <!-- Label untuk input deskripsi -->
        <textarea name="description" required>{{ $item->description }}</textarea> <!-- Area teks untuk deskripsi, dengan nilai default dari item yang di-edit, wajib diisi -->
        <br> <!-- Baris baru -->
        <button type="submit">Update Item</button> <!-- Tombol untuk mengirim form dan memperbarui item -->
    </form>
    <a href="{{ route('items.index') }}">Back to List</a> <!-- Link untuk kembali ke daftar item -->
</body>
</html> <!-- Tag penutup elemen html -->
