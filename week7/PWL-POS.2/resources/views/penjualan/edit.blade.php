@extends('layouts.app')

@section('subtitle', 'Penjualan')
@section('content_header_title', 'Penjualan')
@section('content_header_subtitle', 'Edit')

@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Penjualan</h3>
            </div>
            <form method="post" action="{{ route('penjualan.update', $penjualan->penjualan_id) }}">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="user_id">User ID</label>
                        <input type="number" class="form-control" id="user_id" name="user_id"
                            value="{{ $penjualan->user_id }}" placeholder="Masukkan User ID">
                    </div>
                    <div class="form-group">
                        <label for="pembeli">Pembeli</label>
                        <input type="text" class="form-control" id="pembeli" name="pembeli"
                            value="{{ $penjualan->pembeli }}" placeholder="Masukkan nama pembeli">
                    </div>
                    <div class="form-group">
                        <label for="penjualan_kode">Kode Penjualan</label>
                        <input type="text" class="form-control" id="penjualan_kode" name="penjualan_kode"
                            value="{{ $penjualan->penjualan_kode }}" placeholder="Masukkan kode penjualan">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_penjualan">Tanggal Penjualan</label>
                        <input type="date" class="form-control" id="tanggal_penjualan" name="tanggal_penjualan"
                            value="{{ $penjualan->tanggal_penjualan }}" placeholder="Masukkan tanggal penjualan">
                    </div>
                    
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection