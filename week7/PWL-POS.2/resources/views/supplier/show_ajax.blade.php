@empty($supplier)
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white">Error</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger mb-0">
                    <i class="fas fa-exclamation-triangle mr-2"></i> Data supplier tidak ditemukan.
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
@else
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header"
                style="background: linear-gradient(-45deg, #3498db, #9b59b6, #1abc9c, #2980b9); background-size: 400% 400%; animation: gradient 15s ease infinite;">
                <h5 class="modal-title text-white font-weight-bold">Detail Supplier</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="user-detail-container">
                    <div class="row mb-4">
                        <div class="col-md-3 text-center">
                            <div class="user-avatar-container mb-3">
                                <div class="user-avatar">
                                    <i class="fas fa-layer-group"></i>
                                </div>
                            </div>
                            <h4 class="font-weight-bold mb-1">{{ $supplier->name_supplier }}</h4>
                            <span class="badge badge-info px-3 py-2">{{ $supplier->supplier_kode }}</span>
                        </div>
                        <div class="col-md-9">
                            <div class="user-info-card">
                                <div class="user-info-item">
                                    <div class="info-label">
                                        <i class="fas fa-hashtag text-primary"></i>
                                        <span>ID Supplier</span>
                                    </div>
                                    <div class="info-value">{{ $supplier->supplier_id }}</div>
                                </div>
                                <div class="user-info-item">
                                    <div class="info-label">
                                        <i class="fas fa-code text-info"></i>
                                        <span>Kode Supplier</span>
                                    </div>
                                    <div class="info-value">{{ $supplier->supplier_kode }}</div>
                                </div>
                                <div class="user-info-item">
                                    <div class="info-label">
                                        <i class="fas fa-tag text-success"></i>
                                        <span>Nama Supplier</span>
                                    </div>
                                    <div class="info-value">{{ $supplier->name_supplier }}</div>
                                </div>
                                <div class="user-info-item">
                                    <div class="info-label">
                                        <i class="fas fa-phone text-warning"></i>
                                        <span>Kontak</span>
                                    </div>
                                    <div class="info-value">{{ $supplier->supplier_contact }}</div>
                                </div>
                                <div class="user-info-item">
                                    <div class="info-label">
                                        <i class="fas fa-map-marker-alt text-secondary"></i>
                                        <span>Alamat</span>
                                    </div>
                                    <div class="info-value">{{ $supplier->supplier_alamat ?? '-' }}</div>
                                </div>
                                <div class="user-info-item">
                                    <div class="info-label">
                                        <i class="fas fa-envelope text-danger"></i>
                                        <span>Email</span>
                                    </div>
                                    <div class="info-value">{{ $supplier->supplier_email ?? '-' }}</div>
                                </div>
                                <div class="user-info-item">
                                    <div class="info-label">
                                        <i class="fas fa-toggle-on text-success"></i>
                                        <span>Supplier Aktif?</span>
                                    </div>
                                    <div class="info-value">{{ $supplier->supplier_aktif ? 'Ya' : 'Tidak' }}</div>
                                </div>
                                <div class="user-info-item">
                                    <div class="info-label">
                                        <i class="fas fa-sticky-note text-info"></i>
                                        <span>Keterangan</span>
                                    </div>
                                    <div class="info-value">{{ $supplier->supplier_keterangan ?? '-' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <div>
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                        <i class="fas fa-times mr-1"></i> Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Animation for modal content
        $(document).ready(function() {
            $('.user-detail-container').css({
                'opacity': 0,
                'transform': 'translateY(20px)'
            });

            setTimeout(function() {
                $('.user-detail-container').css({
                    'opacity': 1,
                    'transform': 'translateY(0)',
                    'transition': 'all 0.6s ease-out'
                });
            }, 300);
        });
    </script>
@endempty