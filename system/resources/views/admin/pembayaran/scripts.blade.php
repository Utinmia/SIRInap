<script>
    $(".single-select").select2();

    $('#editModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var id_reservasi = button.data('id_reservasi');
        var jumlah = button.data('jumlah');
        var metode_bayar = button.data('metode_bayar');
        var tgl_bayar = button.data('tgl_bayar');
        var status = button.data('status');

        var modal = $(this);
        modal.find('#edit_id_reservasi').val(id_reservasi);
        modal.find('#edit_jumlah').val(jumlah);
        modal.find('#edit_metode_bayar').val(metode_bayar);
        modal.find('#edit_tgl_bayar').val(tgl_bayar);
        modal.find('#edit_status').val(status);

        $(".single-select").select2();

        $('#editForm').attr('action', 'pembayaran/' + id);
    });

    $('#createForm, #editForm').each(function() {
        $(this).validate({
            rules: {
                id_reservasi: {
                    required: true
                    // minlength: 2
                },
                jumlah: {
                    required: true
                },
                metode_bayar: {
                    required: true
                },
                tgl_bayar: {
                    required: true
                },
                bukti_bayar: {
                    required: true
                },
                status: {
                    required: true
                }
            },
            messages: {
                id_reservasi: {
                    required: "Data tidak boleh kosong"
                },
                jumlah: {
                    required: "Data tidak boleh kosong"
                },
                metode_bayar: {
                    required: "Data tidak boleh kosong"
                },
                tgl_bayar: {
                    required: "Data tidak boleh kosong"
                },
                bukti_bayar: {
                    required: "Data tidak boleh kosong"
                },
                status: {
                    required: "Data tidak boleh kosong"
                }
            },
            errorClass: 'is-invalid',
            validClass: 'is-valid',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element) {
                $(element).addClass('is-invalid').removeClass('is-valid');
            },
            unhighlight: function(element) {
                $(element).addClass('is-valid').removeClass('is-invalid');
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });

    $('#deleteModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        $('#deleteForm').attr('action', 'pembayaran/' + id);
    });

    $('#id_reservasi').on('change', function(){
        var jumlah = $(this).find(':selected').data('jumlah');
        $('#jumlah').val(jumlah);
    })
</script>
