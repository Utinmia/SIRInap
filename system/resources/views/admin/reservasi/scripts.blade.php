<script>
    $(document).ready(function() {
        $(".single-select").select2();

        $('#editModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id_reservasi = button.data('id_reservasi');
            var id_pelanggan = button.data('id_pelanggan');
            var nama_pelanggan = button.data('nama_pelanggan');
            var id_kamars = button.data('id_kamars');
            var tanggal_check_in = button.data('tanggal_check_in');
            var tanggal_check_out = button.data('tanggal_check_out');
            var total_biaya = button.data('total_biaya');
            var status = button.data('status');

            var modal = $(this);
            modal.find('#edit_id_reservasi').val(id_reservasi);
            modal.find('#edit_id_pelanggan').val(id_pelanggan);
            modal.find('#edit_nama_pelanggan').val(nama_pelanggan);
            modal.find('#edit_id_kamars').val(id_kamars).trigger(
                'change'); // Trigger select2 untuk update nilai
            modal.find('#edit_tanggal_check_in').val(tanggal_check_in);
            modal.find('#edit_tanggal_check_out').val(tanggal_check_out);
            modal.find('#edit_total_biaya').val(total_biaya);
            modal.find('#edit_status').val(status);

            // Set action form sesuai dengan id reservasi yang akan diedit
            $('#editForm').attr('action', 'reservasi/' + id_reservasi);
        });

        $('#detailModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id_reservasi = button.data('id_reservasi');
            var id_pelanggan = button.data('id_pelanggan');
            // var id_kamars = button.data('id_kamars').split(',');
            var id_kamars = button.data('id-kamars');
            if (id_kamars && typeof id_kamars === 'string') {
                id_kamars = id_kamars.split(','); // Split only if it's a string
            } else {
                id_kamars = id_kamars; // Handle cases where id_kamars might not be a string or not set
            }
            var tanggal_check_in = button.data('tanggal_check_in');
            var tanggal_check_out = button.data('tanggal_check_out');
            var total_biaya = button.data('total_biaya');
            var status = button.data('status');

            var modal = $(this);
            modal.find('#detail_id_reservasi').val(id_reservasi);
            modal.find('#detail_id_pelanggan').val(id_pelanggan)
            modal.find('#detail_id_kamars').val(id_kamars).trigger('change');
            modal.find('#detail_tanggal_check_in').val(tanggal_check_in);
            modal.find('#detail_tanggal_check_out').val(tanggal_check_out);
            modal.find('#detail_total_biaya').val(total_biaya);
            modal.find('#detail_status').val(status);

            // Set action form sesuai dengan id reservasi yang akan didetail
            $('#detailForm').attr('action', 'reservasi/' + id_reservasi);
        });

        $('#deleteModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            $('#deleteForm').attr('action', 'reservasi/' + id);
        });


        function calculateTotalBiaya() {
            const hargaKamar = $('#id_kamars option:selected').map(function() {
                return parseFloat($(this).data('harga'));
            }).get();
            const checkInDate = new Date($('#tanggal_check_in').val());
            const checkOutDate = new Date($('#tanggal_check_out').val());

            if (!checkInDate || !checkOutDate || hargaKamar.length === 0) {
                $('#total_biaya').val('');
                return;
            }

            const timeDiff = checkOutDate.getTime() - checkInDate.getTime();
            const daysDiff = Math.ceil(timeDiff / (1000 * 3600 * 24));

            if (daysDiff > 0) {
                const totalBiaya = hargaKamar.reduce((acc, harga) => acc + (daysDiff * harga), 0);
                $('#total_biaya').val('Rp' + totalBiaya);
            } else {
                $('#total_biaya').val('');
            }
        }

        $('#id_kamars, #tanggal_check_in, #tanggal_check_out').on('change', calculateTotalBiaya);

        $('#createForm, #editForm').each(function() {
            $(this).validate({
                rules: {
                    id_pelanggan: {
                        required: true
                    },
                    id_kamars: {
                        required: true
                    },
                    tanggal_check_in: {
                        required: true
                    },
                    tanggal_check_out: {
                        required: true
                    },
                    status: {
                        required: true
                    }
                },
                messages: {
                    id_pelanggan: {
                        required: "Data tidak boleh kosong"
                    },
                    id_kamars: {
                        required: "Data tidak boleh kosong"
                    },
                    tanggal_check_in: {
                        required: "Data tidak boleh kosong"
                    },
                    tanggal_check_out: {
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
    });
</script>
