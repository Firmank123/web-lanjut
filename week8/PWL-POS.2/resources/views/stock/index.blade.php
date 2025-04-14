@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Stock')

@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Stock')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Manage Stock</div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
            <div class="card-tools p-3 border-bottom">
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('stock.create') }}" class="btn btn-sm btn-success rounded-pill shadow-sm">
                        <i class="fas fa-plus-circle mr-1"></i> Tambah Stock
                    </a>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush
