@extends('layouts.app')
{{-- Customize layout sections --}}
@section('subtitle', 'Kategori')
@section('content_header_title', 'Data Kategori')
@section('content_header_subtitle', 'Manajemen Data Kategori')
@section('content')
    <div class="container my-4">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="card shadow">
            <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
                <h5 class="mb-0"><i class="fas fa-tags mr-2"></i>Daftar Kategori</h5>
            </div>
            <div class="card-tools p-3 border-bottom">
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('kategori.create') }}" class="btn btn-sm btn-success rounded-pill shadow-sm">
                        <i class="fas fa-plus-circle mr-1"></i> Tambah Kategori
                    </a>

                </div>
            </div>
            <div class="card-body">
                <div class="table-resonsive">
                    @if (isset($dataTable))
                        {!! $dataTable->table(['class' => 'table table-striped table-hover border']) !!}
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-database fa-3x text-muted mb-3"></i>
                            <p>Tidak ada data kategori yang tersedia.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    @if (isset($dataTable))
        {!! $dataTable->scripts() !!}
    @endif
@endpush
