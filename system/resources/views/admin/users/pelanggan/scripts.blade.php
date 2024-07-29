<script>
    $('#editModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var nama = button.data('nama');
        var email = button.data('email');
        var telepon = button.data('telepon');
        var jenis_kelamin = button.data('jk');
        var alamat = button.data('alamat');
        var tgl_lahir = button.data('tgl');

        var modal = $(this);
        modal.find('#editNama').val(nama);
        modal.find('#editEmail').val(email);
        modal.find('#editTelepon').val(telepon);
        modal.find('#editJenisKelamin').val(jenis_kelamin);
        modal.find('#editAlamat').val(alamat);
        modal.find('#editTglLahir').val(tgl_lahir);
        $('#editForm').attr('action', 'konsumen/' + id);
    });

    $('#createForm').validate({
        rules: {
            nama: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 3
            },
            password_confirmation: {
                required: true,
                equalTo: '[name="password"]'
            },
            tgl_lahir: {
                required: true
            },
            jenis_kelamin: {
                required: true
            },
            telepon: {
                required: true
            },
            alamat: {
                required: true
            }
        },
        messages: {
            nama: {
                required: "Data tidak boleh kosong"
            },
            email: {
                required: "Data tidak boleh kosong"
                email: "Silahkan isi alamat email yang valid"
            },
            password: {
                required: "Data tidak boleh kosong"
                minlength: "Password harus terdiri dari minimal 3 karakter"
            },
            password_confirmation: {
                required: "Data tidak boleh kosong"
                equalTo: "Password dan konfirmasi password tidak cocok"
            },
            tgl_lahir: {
                required: "Data tidak boleh kosong"
            },
            jenis_kelamin: {
                required: "Data tidak boleh kosong"
            },
            telepon: {
                required: "Data tidak boleh kosong"
            },
            alamat: {
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

    $('#editForm').validate({
        rules: {
            nama: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: {
                    depends: function(element) {
                        // Password is required only if the field is not empty
                        return $(element).val().length > 0;
                    }
                },
                minlength: 3
            },
            password_confirmation: {
                required: {
                    depends: function(element) {
                        // Password confirmation is required only if password field is not empty
                        return $('[name="password"]').val().length > 0;
                    }
                },
                equalTo: '[name="password"]'
            },
            tgl_lahir: {
                required: true
            },
            jenis_kelamin: {
                required: true
            },
            telepon: {
                required: true
            },
            alamat: {
                required: true
            }
        },
        messages: {
            nama: {
                required: "Data tidak boleh kosong"
            },
            email: {
                required: "Data tidak boleh kosong"
                email: "Silahkan isi alamat email yang valid"
            },
            password: {
                required: "Data tidak boleh kosong"
                minlength: "Password harus terdiri dari minimal 3 karakter"
            },
            password_confirmation: {
                required: "Data tidak boleh kosong"
                equalTo: "Password dan konfirmasi password tidak cocok"
            },
            tgl_lahir: {
                required: "Data tidak boleh kosong"
            },
            jenis_kelamin: {
                required: "Data tidak boleh kosong"
            },
            telepon: {
                required: "Data tidak boleh kosong"
            },
            alamat: {
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

    $('#deleteModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        $('#deleteForm').attr('action', 'konsumen/' + id);
    });
</script>
