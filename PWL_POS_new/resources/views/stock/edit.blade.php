@extends('layouts.app')

@section('subtitle', 'Stock')
@section('content_header_title', 'Stock')
@section('content_header_subtitle', 'Edit')

@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Stock</h3>
            </div>
            <form method="post" action="{{ route('stock.update', $stock->stock_id) }}">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="stock_id">Stock ID</label>
                        <input type="number" class="form-control" id="stock_id" name="stock_id"
                            value="{{ $stock->stock_id }}" placeholder="Masukkan Stock ID">
                    </div>
                    <div class="form-group">
                        <label for="barang_id">Barang ID</label>
                        <input type="number" class="form-control" id="barang_id" name="barang_id"
                            value="{{ $stock->barang_id }}" placeholder="Masukkan Barang ID">
                    </div>
                    <div class="form-group">
                        <label for="user_id">User ID</label>
                        <input type="number" class="form-control" id="user_id" name="user_id"
                            value="{{ $stock->user_id }}" placeholder="Masukkan User ID">
                    </div>
                    <div class="form-group">
                        <label for="stok_tanggal_masuk">Tanggal Masuk</label>
                        <input type="date" class="form-control" id="stock_tanggal_masuk" name="stock_tanggal_masuk"
                            value="{{ $stock->stock_tanggal_masuk }}" placeholder="Masukkan Tanggal Masuk">
                    </div>
                    <div class="form-group">
                        <label for="stok_jumlah">Jumlah</label>
                        <input type="number" class="form-control" id="stock_jumlah" name="stock_jumlah"
                            value="{{ $stock->stock_jumlah }}" placeholder="Masukkan Jumlah">
                    </div>
                    
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection