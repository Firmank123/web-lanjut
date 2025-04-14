@empty($supplier)
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: linear-gradient(-45deg, #ff7675, #d63031); background-size: 400% 400%; animation: gradient 15s ease infinite;">
                <h5 class="modal-title text-white font-weight-bold">
                    <i class="fas fa-exclamation-triangle mr-2"></i> Kesalahan
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <div class="alert alert-danger animate__animated animate__fadeIn">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-ban fa-2x mr-3"></i>
                        <div>
                            <h5 class="mb-1">Data Tidak Ditemukan</h5>
                            <p class="mb-0">Maaf, data supplier yang Anda cari tidak ada dalam database.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-back btn-outline-secondary" data-dismiss="modal">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali
                </button>
            </div>
        </div>
    </div>
@else
    <form action="{{ url('/supplier/' . $supplier->supplier_id . '/update_ajax') }}" method="POST" id="form-edit">
        @csrf
        @method('PUT')
        <div id="modal-master" class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: linear-gradient(-45deg, #4a69bd, #6a89cc, #1e3799, #0c2461); background-size: 400% 400%; animation: gradient 15s ease infinite;">
                    <h5 class="modal-title text-white font-weight-bold">
                        <i class="fas fa-edit mr-2"></i> Edit Data Supplier
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <div class="form-group">
                        <label class="font-weight-bold">Kode Supplier</label>
                        <div class="input-group input-group-custom">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary text-white"><i class="fas fa-code"></i></span>
                            </div>
                            <input value="{{ $supplier->supplier_kode }}" type="text" name="supplier_kode" id="supplier_kode" 
                                class="form-control" placeholder="Masukkan kode supplier" required>
                        </div>
                        <small id="error-supplier_kode" class="error-text form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Nama Supplier</label>
                        <div class="input-group input-group-custom">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-info text-white"><i class="fas fa-tag"></i></span>
                            </div>
                            <input value="{{ $supplier->name_supplier }}" type="text" name="name_supplier" id="name_supplier" 
                                class="form-control" placeholder="Masukkan nama supplier" required>
                        </div>
                        <small id="error-name_supplier" class="error-text form-text text-danger"></small>
                    </div>
                    
                    <div class="form-group">
                        <label class="font-weight-bold">Kontak</label>
                        <div class="input-group input-group-custom">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-success text-white"><i class="fas fa-phone"></i></span>
                            </div>
                            <input value="{{ $supplier->supplier_contact }}" type="text" name="supplier_contact" id="supplier_contact" 
                                class="form-control" placeholder="Masukkan nomor kontak">
                        </div>
                        <small id="error-supplier_contact" class="error-text form-text text-danger"></small>
                    </div>
                    
                    <div class="form-group">
                        <label class="font-weight-bold">Alamat</label>
                        <div class="input-group input-group-custom">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary text-white"><i class="fas fa-map-marked-alt"></i></span>
                            </div>
                            <textarea name="supplier_alamat" id="supplier_alamat" class="form-control" 
                                placeholder="Masukkan alamat supplier">{{ $supplier->supplier_alamat }}</textarea>
                        </div>
                        <small id="error-supplier_alamat" class="error-text form-text text-danger"></small>
                    </div>
                    
                    <div class="form-group">
                        <label class="font-weight-bold">Email</label>
                        <div class="input-group input-group-custom">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-secondary text-white"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input value="{{ $supplier->supplier_email }}" type="text" name="supplier_email" id="supplier_email" 
                                class="form-control" placeholder="Masukkan email supplier">
                        </div>
                        <small id="error-supplier_email" class="error-text form-text text-danger"></small>
                    </div>
                    
                    <div class="form-group">
                        <label class="font-weight-bold">Status Aktif</label>
                        <div class="input-group input-group-custom">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-success text-white"><i class="fas fa-check"></i></span>
                            </div>
                            <select name="supplier_aktif" id="supplier_aktif" class="form-control" required>
                                <option value='1' {{ $supplier->supplier_aktif == 1 ? 'selected' : '' }}>
                                    Aktif
                                </option>
                                <option value='0' {{ $supplier->supplier_aktif == 0 ? 'selected' : '' }}>
                                    Tidak Aktif
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Keterangan</label>
                        <div class="input-group input-group-custom">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-info text-white"><i class="fas fa-sticky-note"></i></span>
                            </div>
                            <textarea name="supplier_keterangan" id="supplier_keterangan" class="form-control" 
                                placeholder="Masukkan keterangan tambahan (opsional)" rows="3">{{ $supplier->supplier_keterangan }}</textarea>
                        </div>
                        <small id="error-supplier_keterangan" class="error-text form-text text-danger"></small>
                    </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" data-dismiss="modal" class="btn btn-back btn-outline-secondary">
                        <i class="fas fa-times mr-2"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fas fa-save mr-2"></i> Simpan
                    </button>
                </div>
            </div>
        </div>
    </form>
    <script>
        $(document).ready(function() {
            // Add animation to form elements when modal loads
            $('.form-group').each(function(i) {
                $(this).css({
                    'opacity': 0,
                    'transform': 'translateY(20px)'
                });

                setTimeout(function() {
                    $('.form-group').eq(i).css({
                        'opacity': 1,
                        'transform': 'translateY(0)',
                        'transition': 'all 0.4s ease-out'
                    });
                }, 100 * (i + 1));
            });

            $("#form-edit").validate({
                rules: {
                    supplier_id: {
                        required: true,
                        number: true
                    },
                    supplier_kode: {
                        required: true,
                        minlength: 1,
                        maxlength: 10
                    },
                    name_supplier: {
                        required: true,
                        minlength: 1,
                        maxlength: 100
                    },
                    supplier_contact: {
                        required: false,
                        minlength: 0,
                        maxlength: 20
                    },
                    supplier_alamat: {
                        required: false,
                        minlength: 0,
                        maxlength: 255
                    },
                    supplier_email: {
                        required: false,
                        email: true,
                        minlength: 0,
                        maxlength: 255
                    },
                    supplier_aktif: {
                        required: true,
                        number: true
                    },
                    supplier_keterangan: {
                        required: false,
                        minlength: 0,
                        maxlength: 255
                    }
                },
                messages: {
                    supplier_kode: {
                        required: "Kode supplier tidak boleh kosong",
                        minlength: "Kode supplier minimal 1 karakter",
                        maxlength: "Kode supplier maksimal 10 karakter"
                    },
                    name_supplier: {
                        required: "Nama supplier tidak boleh kosong",
                        minlength: "Nama supplier minimal 1 karakter",
                        maxlength: "Nama supplier maksimal 100 karakter"
                    }
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: form.action,
                        type: form.method,
                        data: $(form).serialize(),
                        success: function(response) {
                            if (response.status) {
                                $('#myModal').modal('hide');
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: response.message,
                                    timer: 1500,
                                    showConfirmButton: false
                                });
                                dataSupplier.ajax.reload();
                            } else {
                                $('.error-text').text('');
                                $.each(response.msgField, function(prefix, val) {
                                    $('#error-' + prefix).text(val[0]);
                                });
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Terjadi Kesalahan',
                                    text: response.message
                                });
                            }
                        }
                    });
                    return false;
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endempty