@extends('layouts.app.user')
@section('title', 'Daftar Bimbel')
@section('content')
<!-- ======= About Section ======= -->
<section id="about" class="about mt-5">
    <div class="container">
        <a href="/" class="btn btn-primary mb-2"><i class="bi bi-arrow-left"></i> Kembali</a>
        <div class="card">
            <div class="card-body">
                @include('layouts.flashmessage')
                <form action="{{ route('register.guru.store') }}" id="form-register" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <h5 class="card-title text-center"><strong>Daftar Guru</strong></h5>
                        <div class="col-md-12 mt-2 form-field">
                            <div class="form-group">
                                <label for="">Nama <code>*</code></label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                    placeholder="Nama Anda">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-2 form-field">
                            <div class="form-group">
                                <label for="">CV <code>*</code></label>
                                <input type="file" class="form-control" name="cv" id="cv" value="{{ old('cv') }}">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-2 form-field">
                            <div class="form-group">
                                <label for="">Nomor WhatsApp <code>*</code></label>
                                <input type="text" class="form-control" name="whatsapp" value="{{ old('whatsapp') }}"
                                    placeholder="contoh : 822263674827">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-2 form-field">
                            <div class="form-group">
                                <label for="">Mata Pelajaran<code>*</code></label>
                                <input type="text" class="form-control" name="mata_pelajaran"
                                    value="{{ old('mata_pelajaran') }}" placeholder="Contoh : Ipa,Ips">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-2">
                            <a href="/" class="btn btn-danger">Kembali</a>
                            <button type="button" id="submit-form" class="btn btn-success float-end">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@push('js')
<script>
    $(document).ready(function () {
        $('#submit-form').click(function (event) {
            event.preventDefault(); // prevent default form submission

            // Reset error messages
            $(".invalid-feedback").text('').hide();

            // Your validation logic here
            var name = $("input[name='name']").val().trim();
            var cv = $("input[name='cv']").val().trim();
            var whatsapp = $("input[name='whatsapp']").val().trim();
            var mata_pelajaran = $("input[name='mata_pelajaran']").val().trim();

            if (name === '') {
                $(".form-field input[name='name']").siblings(".invalid-feedback").text("Nama tidak boleh kosong").show();
                return;
            }

            if (cv === '') {
                $(".form-field input[name='cv']").siblings(".invalid-feedback").text("CV tidak boleh kosong").show();
                return;
            }

            if (whatsapp === '') {
                $(".form-field input[name='whatsapp']").siblings(".invalid-feedback").text("Nomor WhatsApp tidak boleh kosong").show();
                return;
            }

            if (mata_pelajaran === '') {
                $(".form-field input[name='mata_pelajaran']").siblings(".invalid-feedback").text("Mata Pelajaran tidak boleh kosong").show();
                return;
            }

            // If all fields are valid, proceed with form submission confirmation
            Swal.fire({
                title: "Apakah Data Sudah Benar ?",
                text: "Data Tidak Bisa Di Rubah!",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Submit",
                customClass: {
                    actions: 'my-actions',
                    cancelButton: 'order-1 right-gap',
                    confirmButton: 'order-2',
                    denyButton: 'order-3',
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#form-register').submit();
                    Swal.fire({
                        title: "Data Berhasil Di Submit!",
                        icon: "success"
                    });
                }
            });
        });
    });
</script>
@endpush
@endsection
