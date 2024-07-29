<script>
    $('#editAdminModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var nama = button.data('nama');
        var email = button.data('email');
        var role = button.data('role');
        var status = button.data('status');

        var modal = $(this);
        modal.find('#editNama').val(nama);
        modal.find('#editEmail').val(email);
        modal.find('#editRole').val(role);
        modal.find('#editStatus').val(status);
        $('#editAdminForm').attr('action', 'admin/' + id);
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
            role: {
                required: true
            },
            status: {
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
            role: {
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

    $('#editAdminForm').validate({
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
            role: {
                required: true
            },
            status: {
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
            role: {
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

    $('#deleteAdminModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        $('#deleteAdminForm').attr('action', 'admin/' + id);
    });
</script>
