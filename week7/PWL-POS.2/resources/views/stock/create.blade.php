@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Stock')

@section('content_header_title', 'Stock')
@section('content_header_subtitle', 'Create')

{{-- Content body: main page content --}}

@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Buat stock baru</h3>
            </div>
            <form method="post" action="../stock">
                <div class="card-body">
                    <div class="form-group">
                        <label for="stock_id">Stock ID</label>
                        <input type="number" class="form-control" id="stock_id" name="stock_id" placeholder="Masukkan Stock ID">
                    </div>
                    <div class="form-group">
                        <label for="barang_id">Barang ID</label>
                        <input type="number" class="form-control" id="barang_id" name="barang_id" placeholder="Masukkan Barang ID">
                    </div>
                    <div class="form-group">
                        <label for="stok_tanggal_masuk">Tanggal Masuk</label>
                        <input type="date" class="form-control" id="stock_tanggal_masuk" name="stock_tanggal_masuk" placeholder="Masukkan Tanggal Masuk">
                    </div>
                    <div class="form-group">
                        <label for="stok_jumlah">Jumlah</label>
                        <input type="number" class="form-control" id="stock_jumlah" name="stock_jumlah" placeholder="Masukkan Jumlah">
                    
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection