<form action="{{ url('/supplier/ajax') }}" method="POST" id="form-tambah">
    @csrf
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: linear-gradient(-45deg, #3498db, #9b59b6, #1abc9c, #2980b9); background-size: 400% 400%; animation: gradient 15s ease infinite;">
                <h5 class="modal-title text-white font-weight-bold">Tambah Data Supplier</h5>
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
                        <input type="text" name="supplier_kode" id="supplier_kode" class="form-control" 
                            placeholder="Masukkan kode supplier" required>
                    </div>
                    <small id="error-supplier_kode" class="error-text form-text text-danger"></small>
                </div>
                
                <div class="form-group">
                    <label class="font-weight-bold">Nama Supplier</label>
                    <div class="input-group input-group-custom">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-info text-white"><i class="fas fa-tag"></i></span>
                        </div>
                        <input type="text" name="name_supplier" id="name_supplier" class="form-control" 
                            placeholder="Masukkan nama supplier" required>
                    </div>
                    <small id="error-name_supplier" class="error-text form-text text-danger"></small>
                </div>
                
                <div class="form-group">
                    <label class="font-weight-bold">Kontak</label>
                    <div class="input-group input-group-custom">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-success text-white"><i class="fas fa-phone"></i></span>
                        </div>
                        <input type="text" name="supplier_contact" id="supplier_contact" class="form-control" 
                            placeholder="Masukkan nomor kontak">
                    </div>
                    <small id="error-supplier_contact" class="error-text form-text text-danger"></small>
                </div>
                {{-- <input type="number" value="1" name="supplier_aktif" id="supplier_aktif" class="d-none form-control" 
                            placeholder="Masukkan status"> --}}
                <div class="form-group">
                    <label class="font-weight-bold">Alamat</label>
                    <div class="input-group input-group-custom">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-danger text-white"><i class="fas fa-map-marker-alt"></i></span>
                        </div>
                        <textarea name="supplier_alamat" id="supplier_alamat" class="form-control" 
                            placeholder="Masukkan alamat (opsional)" rows="3"></textarea>
                    </div>
                    <small id="error-supplier_alamat" class="error-text form-text text-danger"></small>
                </div>
                
                <div class="form-group">
                    <label class="font-weight-bold">Email</label>
                    <div class="input-group input-group-custom">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-warning text-white"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" name="supplier_email" id="supplier_email" class="form-control" 
                            placeholder="Masukkan email (opsional)">
                    </div>
                    <small id="error-supplier_email" class="error-text form-text text-danger"></small>
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Keterangan</label>
                    <div class="input-group input-group-custom">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-secondary text-white"><i class="fas fa-sticky-note"></i></span>
                        </div>
                        <textarea name="supplier_keterangan" id="supplier_keterangan" class="form-control" 
                            placeholder="Masukkan keterangan tambahan (opsional)" rows="3"></textarea>
                    </div>
                    <small id="error-supplier_keterangan" class="error-text form-text text-danger"></small>
                </div>
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

        $("#form-tambah").validate({
            rules: {
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
                    required: true,
                    minlength: 1,
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
                supplier_nama: {
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
                        console.log('response', response);
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