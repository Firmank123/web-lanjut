

<div align="center">

## Laporan Pemrogaman WEB Lanjut Jobsheet 5 Blade View, Web Templating(AdminLTE), Datatables

<img src="Photo/polinema.png"
style="width:3.24722in;height:2.43333in" />

## Politeknik Negeri Malang 
## Semester 4 
##2025

**NIM:** 241720099

**Nama:** M. Firmansyah

**Kelas:** 2A

**Jurusan:** Teknologi Informasi

**Program Studi:** D-IV Teknik Informatika

</div>



**Praktikum** **1** **–** **Integrasi** **Laravel** **dengan**
**AdminLte3**

> 1\. Q: Dalam root folder project lakukan command berikut, untuk mendefinisikan requirement project.
>
> A:
<img src="Photo/1.png"
style="width:4.23889in;height:1.64653in" />

> 2\. Q: Melakukan instalasi requirement project di atas dengan command
> berikut:
>
> A:
<img src="Photo/1.png"
style="width:5.04972in;height:0.75417in" />
> 
3. Q: Kembali ke browser, menuju ke halaman awal. 
> A:
<img src="Photo/2.png" style="width:6.26805in;height:3.19375in" />



**Praktikum** **2** **–** **Integrasi** **dengan** **DataTables**

> 1\. Q : “Install Laravel DataTables composer require laravel/ui --dev
> composer require yajra/laravel-datatables:^10.0
>
> A:
<img src="Photo/3.png"
style="width:6.26805in;height:3.07917in" />
<img src="Photo/4.png"
style="width:6.26805in;height:3.07917in" />


>
> 2\. Q: Install Laravel
> DataTables Vite dan sass 
>
> A:
<img src="Photo/5.png"
> style="width:4.89861in;height:2.04653in" />
<img src="Photo/6.png"
> style="width:4.89861in;height:2.04653in" />



> 3\. Q: Jalankan dengan npm run dev
>
<img src="Photo/7.png"
style="width:6.26805in;height:2.67292in" />

> 4\. Q: Datatables sudah
> dapat di load di /kategori
>
>A:
<img src="Photo/8.png" style="width:6.26805in;height:3.06667in" />


**Praktikum** **3** **–** **Membuat** **form** **kemudian**
**menyimpan** **data** **dalam** **database**

> 1\. Q: Akses kategori/create 
>
A:
<img src="Photo/9.png"
style="width:4.91736in;height:2.51042in" />

> 2. Q: Halaman kategori
>
>A:
 <img src="Photo/10.png"
 style="width:4.94555in;height:2.51111in" />

**Tugas**

> 1. Q: Tambahkan button Add
> di halam manage kategori, yang mengarah ke create kategori baru 
>
>A:
> Edit kode pada kategori\idex.blade.php
<img src="Photo/11.png" style="width:6.26805in;height:6.88056in" />

<img src="Photo/12.png"
style="width:6.26805in;height:3.16806in" />

> 2. Q: Tambahkan menu untuk
> halaman manage kategori, di daftar menu side bar 
>
>A: Tambahkan kode berikut pada config\adminlte.php
<img src="Photo/13.png" style="width:3.16361in;height:1.26528in" />
<img src="Photo/14.png" style="width:3.03125in;height:2.26583in" />



> 3\. Q: Tambahkan action edit di datatables dan buat halaman edit serta controllernya 
>A: Tambahkan route ada web.php Tambahkan kode ini pada KategoriDatatables:
<img src="Photo/15.png"
style="width:4.99819in;height:1.45139in" /><img src="Photo/16.png"
style="width:2.75278in;height:2.61222in" />

>Tambahkan kode ini pada kategoriController.
<img src="Photo/17.png"
style="width:6.26805in;height:3.11736in" />

>Kategori/edit
<img src="Photo/18.png" style="width:5.03111in;height:4.09583in" />
<img src="Photo/19.png"
 style="width:5.45514in;height:3.01042in" />

<img src="Photo/20.png"
style="width:5.94764in;height:2.42361in" />

> 4\. Q: Tambahkan action delete di datatables serta controllernya 
>A: tambahkan route pada web. Kemudian edit kategoriController.php
<img src="Photo/21.png"
style="width:5.42972in;height:1.37639in" />

>Dan tambahkan kode pada kategori datatable
<img src="Photo/22.png"
style="width:5.54319in;height:0.97708in" />
<img src="Photo/23.png" style="width:4.13194in;height:2.08889in" />>