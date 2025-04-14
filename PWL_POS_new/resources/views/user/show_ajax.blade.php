@empty($user)
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
                    <i class="fas fa-exclamation-triangle mr-2"></i> Data user tidak ditemukan.
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
                <h5 class="modal-title text-white font-weight-bold">Detail User</h5>
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
                            <h4 class="font-weight-bold mb-1">{{ $user->user_nama }}</h4>
                            <span class="badge badge-info px-3 py-2">{{ $user->user_kode }}</span>
                        </div>
                        <div class="col-md-9">
                            <div class="user-info-card">
                                <div class="user-info-item">
                                    <div class="info-label">
                                        <i class="fas fa-hashtag text-primary"></i>
                                        <span>ID User</span>
                                    </div>
                                    <div class="info-value">{{ $user->user_id }}</div>
                                </div>
                                
                                <div class="user-info-item">
                                    <div class="info-label">
                                        <i class="fas fa-layer-group text-warning"></i>
                                        <span>Level</span>
                                    </div>
                                    <div class="info-value">{{ $user->level->level_nama }}</div>
                                </div>
                                <div class="user-info-item">
                                    <div class="info-label">
                                        <i class="fas fa-user text-info"></i>
                                        <span>Username</span>
                                    </div>
                                    <div class="info-value">{{ $user->username }}</div>
                                </div>
                                <div class="user-info-item">
                                    <div class="info-label">
                                        <i class="fas fa-id-card text-success"></i>
                                        <span>Nama Lengkap</span>
                                    </div>
                                    <div class="info-value">{{ $user->nama }}</div>
                                </div>
                                <div class="user-info-item">
                                    <div class="info-label">
                                        <i class="fas fa-lock text-danger"></i>
                                        <span>Password</span>
                                    </div>
                                    <div class="info-value">••••••••••</div>
                                </div>
                                <div class="user-info-item">
                                    <div class="info-label">
                                        <i class="fas fa-calendar-alt text-danger"></i>
                                        <span>Dibuat Pada</span>
                                    </div>
                                    <div class="info-value">
                                        {{ $user->created_at ? $user->created_at->format('d M Y H:i') : 'N/A' }}
                                    </div>
                                </div>
                                <div class="user-info-item">
                                    <div class="info-label">
                                        <i class="fas fa-edit text-secondary"></i>
                                        <span>Diperbarui Pada</span>
                                    </div>
                                    <div class="info-value">
                                        {{ $user->updated_at ? $user->updated_at->format('d M Y H:i') : 'N/A' }}
                                    </div>
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