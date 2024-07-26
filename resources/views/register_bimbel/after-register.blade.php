@extends('layouts.app.user')
@section('title', 'Daftar Bimbel')
@push('css')
    <style>
        .ul-font-size{
            font-size: 14px;
        }
        .ul-font-size-pelajaran{
            font-size: 12.5px;
        }
    </style>
@endpush
@section('content')
<!-- ======= About Section ======= -->
<section id="about" class="about mt-5">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="col-md-12 text-center">
                    <h2>Pendaftaran Sukses</h2>
                    <h6>Silahkan Menunggu Konfirmasi Dari Admin, Jika Telah Di Konfirmasi Maka Pada Bagian Atas Akan Ada Tombol Dashboard <br> Terima Kasih</h6>
                    <a href="/" class="btn btn-danger">Halaman Utama</a>
                </div>
            </div>
        </div>
    </div>
</section><!-- End About Section -->
@push('js')
    <script>
       document.addEventListener('DOMContentLoaded', function () {
        const Button_next = document.getElementById('form-1-btn');
        const btn_prev = document.getElementById('btn_prev');
        const form_1 = document.getElementById('form-1'); // Selecting the individual element
        const form_2 = document.getElementById('form-2'); // Selecting the individual element
        Button_next.addEventListener('click', function() {
            form_1.classList.remove("show", "active");
            form_2.classList.add('show', 'active');
            const nav_form_1 = document.getElementById('pills-home-tab');
            nav_form_1.classList.remove('active');
            const nav_link_form_2 = document.getElementById('pills-form-2-tab');
            nav_link_form_2.classList.add('active');
            window.scrollTo(0, 0); // Scroll to the top of the page

        });
        btn_prev.addEventListener('click', function() {
            form_2.classList.remove("show", "active");
            form_1.classList.add('show', 'active');
            const nav_link_form_2 = document.getElementById('pills-form-2-tab');
            nav_link_form_2.classList.remove('active');
            const nav_form_1 = document.getElementById('pills-home-tab');
            nav_form_1.classList.add('active');
            window.scrollTo(0, 0); // Scroll to the top of the page

        });
    });

    </script>
@endpush
@endsection
