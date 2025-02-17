<!DOCTYPE html> <!-- Mendefinisikan tipe dokumen sebagai HTML5 -->
<html> <!-- Tag pembuka elemen html -->
<head> <!-- Bagian kepala dari dokumen HTML -->
    <title>Item List</title> <!-- Judul halaman yang akan ditampilkan pada tab browser -->
</head>
<body> <!-- Bagian tubuh dari dokumen HTML -->
    <h1>Items</h1> <!-- Judul utama halaman -->
    @if(session('success')) <!-- Mengecek apakah ada pesan sukses di sesi -->
        <p>{{ session('success') }}</p> <!-- Menampilkan pesan sukses jika ada -->
    @endif
    <a href="{{ route('items.create') }}">Add Item</a> <!-- Link ke halaman untuk menambahkan item baru -->
    <ul> <!-- Membuka tag untuk daftar tidak terurut -->
        @foreach ($items as $item) <!-- Looping melalui setiap item -->
            <li> <!-- Membuka tag untuk item dalam daftar -->
                {{ $item->name }} - <!-- Menampilkan nama item -->
                <a href="{{ route('items.edit', $item) }}">Edit</a> <!-- Link untuk mengedit item -->
                <form action="{{ route('items.destroy', $item) }}" method="POST" style="display:inline;"> <!-- Form untuk menghapus item -->
                    @csrf <!-- Menambahkan token CSRF untuk keamanan -->
                    @method('DELETE') <!-- Menggunakan metode HTTP DELETE -->
                    <button type="submit">Delete</button> <!-- Tombol untuk menghapus item -->
                </form>
            </li> <!-- Menutup tag untuk item dalam daftar -->
        @endforeach <!-- Menutup looping -->
    </ul> <!-- Menutup tag untuk daftar tidak terurut -->
</body>
</html> <!-- Tag penutup elemen html -->
