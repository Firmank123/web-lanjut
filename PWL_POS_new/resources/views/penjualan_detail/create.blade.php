@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Penjualan_Detail')

@section('content_header_title', 'Penjualan_Detail')
@section('content_header_subtitle', 'Create')

{{-- Content body: main page content --}}

@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Buat penjualan_detail baru</h3>
            </div>
            <form method="post" action="../penjualan_detail">
                <div class="card-body">
                    <div class="form-group">
                        <label for="penjualan_id">Penjualan ID</label>
                        <input type="number" class="form-control" id="penjualan_id" name="penjualan_id" placeholder="Masukkan Penjualan ID">
                    </div>
                    <div class="form-group">
                        <label for="barang_id">Barang ID</label>
                        <input type="number" class="form-control" id="barang_id" name="barang_id" placeholder="Masukkan Barang ID">
                    </div>
                    <div class="form-group">
                        <label for="jumlah_barang">Jumlah Barang</label>
                        <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang" placeholder="Masukkan Jumlah Barang">
                    </div>
                    <div class="form-group">
                        <label for="harga_barang">Harga Barang</label>
                        <input type="number" class="form-control" id="harga_barang" name="harga_barang" placeholder="Masukkan Harga Barang">
                    </div>
                    
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection