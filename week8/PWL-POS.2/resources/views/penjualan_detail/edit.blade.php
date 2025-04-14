@extends('layouts.app')

@section('subtitle', 'Penjualan_Detail')
@section('content_header_title', 'Penjualan_Detail')
@section('content_header_subtitle', 'Edit')

@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Penjualan_Detail</h3>
            </div>
            <form method="post" action="{{ route('penjualan_detail.update', $penjualan_detail->penjualan_detail_id) }}">
                @csrf
                @method('PUT')
                <div class="card-body">
/*************  ✨ Codeium Command ⭐  *************/
                    <div class="form-group">
                        <label for="penjualan_id">Penjualan ID</label>
                        <input type="number" class="form-control" id="penjualan_id" name="penjualan_id"
                            value="{{ $penjualan_detail->penjualan_id }}" placeholder="Masukkan Penjualan ID">
                    </div>
                    <div class="form-group">
                        <label for="barang_id">Barang ID</label>
                        <input type="number" class="form-control" id="barang_id" name="barang_id"
                            value="{{ $penjualan_detail->barang_id }}" placeholder="Masukkan Barang ID">
                    </div>
                    <div class="form-group">
                        <label for="jumlah_barang">Jumlah Barang</label>
                        <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang"
                            value="{{ $penjualan_detail->jumlah_barang }}" placeholder="Masukkan Jumlah Barang">
                    </div>
                    <div class="form-group">
                        <label for="harga_barang">Harga Barang</label>
                        <input type="number" class="form-control" id="harga_barang" name="harga_barang"
                            value="{{ $penjualan_detail->harga_barang }}" placeholder="Masukkan Harga Barang">
                    </div>
                    
/******  f4721444-7533-41fd-8416-350f64727b88  *******/
                    
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection