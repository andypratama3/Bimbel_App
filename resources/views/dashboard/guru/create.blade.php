@extends('layouts.app.dashboard')
@section('title','Pilih Guru')
@push('css_dashboard')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    @import url('https://fonts.googleapis.com/css2?family=Fira+Sans+Extra+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Heebo:wght@100;200;300;400;500;600;700;800;900&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

    :root {
        --font1: 'Heebo', sans-serif;
        --font2: 'Fira Sans Extra Condensed', sans-serif;
        --font3: 'Roboto', sans-serif
    }

    body {
        font-family: var(--font3);
        background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%)
    }

    h2 {
        font-weight: 900
    }

    .container-fluid {
        max-width: 1200px
    }

    .card {
        background: #fff;
        box-shadow: 0 6px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);
        transition: .3s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12);
        border: 0;
        border-radius: 1rem
    }

    .card-img,
    .card-img-top {
        border-top-left-radius: calc(1rem - 1px);
        border-top-right-radius: calc(1rem - 1px)
    }

    .card h5 {
        overflow: hidden;
        height: 56px;
        font-weight: 900;
        font-size: 1rem
    }

    .card-img-top {
        width: 100%;
        max-height: 180px;
        object-fit: contain;
        padding: 30px
    }

    .card h2 {
        font-size: 1rem
    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06)
    }

    .label-top {
        position: absolute;
        background-color: #8bc34a;
        color: #fff;
        top: 8px;
        right: 8px;
        padding: 5px 10px 5px 10px;
        font-size: .7rem;
        font-weight: 600;
        border-radius: 3px;
        text-transform: uppercase
    }

    .top-right {
        position: absolute;
        top: 24px;
        left: 24px;
        width: 90px;
        height: 90px;
        border-radius: 50%;
        font-size: 1rem;
        font-weight: 900;
        background: #ff5722;
        line-height: 90px;
        text-align: center;
        color: white
    }

    .top-right span {
        display: inline-block;
        vertical-align: middle
    }

    @media (max-width: 768px) {
        .card-img-top {
            max-height: 250px
        }
    }

    .over-bg {
        background: rgba(53, 53, 53, 0.85);
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        backdrop-filter: blur(0.0px);
        -webkit-backdrop-filter: blur(0.0px);
        border-radius: 10px
    }

    .btn {
        font-size: 1rem;
        font-weight: 500;
        text-transform: uppercase;
        padding: 5px 50px 5px 50px
    }

    .box .btn {
        font-size: 1.5rem
    }
    .border {
        border: 1px solid #0767c7!important
    }
    @media (max-width: 1025px) {
        .btn {
            padding: 5px 40px 5px 40px
        }
    }

    @media (max-width: 250px) {
        .btn {
            padding: 5px 30px 5px 30px
        }
    }

    .btn-warning {
        background: none #f7810a;
        color: #ffffff;
        fill: #ffffff;
        border: none;
        text-decoration: none;
        outline: 0;
        box-shadow: -1px 6px 19px rgba(247, 129, 10, 0.25);
        border-radius: 100px
    }

    .btn-warning:hover {
        background: none #ff962b;
        color: #ffffff;
        box-shadow: -1px 6px 13px rgba(255, 150, 43, 0.35)
    }

    .bg-success {
        font-size: 1rem;
        background-color: #f7810a !important
    }

    .bg-danger {
        font-size: 1rem
    }

    .price-hp {
        font-size: 1rem;
        font-weight: 600;
        color: darkgray
    }

    .amz-hp {
        font-size: .7rem;
        font-weight: 600;
        color: darkgray
    }

    .fa-question-circle:before {
        color: darkgray
    }

    .fa-plus:before {
        color: darkgray
    }

    .box {
        border-radius: 1rem;
        background: #fff;
        box-shadow: 0 6px 10px rgb(0 0 0 / 8%), 0 0 6px rgb(0 0 0 / 5%);
        transition: .3s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12)
    }

    .box-img {
        max-width: 300px
    }

    .thumb-sec {
        max-width: 300px
    }

    @media (max-width: 576px) {
        .box-img {
            max-width: 200px
        }

        .thumb-sec {
            max-width: 200px
        }
    }

    .inner-gallery {
        width: 60px;
        height: 60px;
        border: 1px solid #ddd;
        border-radius: 3px;
        margin: 1px;
        display: inline-block;
        overflow: hidden;
        -o-object-fit: cover;
        object-fit: cover
    }

    @media (max-width: 370px) {
        .box .btn {
            padding: 5px 40px 5px 40px;
            font-size: 1rem
        }
    }

    .disclaimer {
        font-size: .9rem;
        color: darkgray
    }

    .related h3 {
        font-weight: 900
    }
</style>
@endpush
@section('content')
<div class="col-md-12">
    <div class="row">
        <h5 class="card-title text-center">Pilih Guru</h5>
        <div class="row">
            <div class="col-md-12 mt-2">
                <div class="form-group mb-2">
                    <div class="input-group">
                        <input type="text" class="form-control" name="name" placeholder="Search"
                            value="{{ old('name') }}">
                        <span class="input-group-text" id="basic-addon2"><button class="btn btn-primary"
                                type="submit"><i class="bi bi-search"></i></button></span>
                    </div>
                </div>
                <form action="{{ route('dashboard.guru.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <label for="name" class="mb-4">Guru<code>*</code></label>
                        <input type="hidden" name="guru_id" id="guru_id">
                        @foreach ($gurus as $guru)
                        <div class="col-md-4" id="col-data">
                            <div class="card shadow-sm" id="card-data-<?= $guru->id ?>" >
                                <img src="{{ asset('storage/guru/img/'. $guru->foto) }}" class="card-img-top">
                                <div class="card-body">
                                    <div class="clearfix mb-3">
                                        <span class="float-start badge rounded-pill bg-primary"></span>
                                    </div>
                                    <h5 class="card-title">{{ $guru->name }}</h5>
                                    <h5 class="card-title">Mata Pelajaran</h5>
                                    <p>{{ $guru->mata_pelajaran }}</p>
                                    <h5 class="card-title">Kriteria</h5>
                                    @foreach ($guru->kriteria as $kriteria)
                                    <p>{{ $kriteria->name }}</p>
                                    @endforeach
                                    <div class="text-center my-4"><button class="btn btn-primary"
                                            type="button" id="data-id" data-id="<?= $guru->id ?>">Pilih</button></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-md-12 mt-2">
                        <div class="form-group">
                            <label for="name">Pilih Semua <code>*</code></label>
                            <input class="form-check-input" type="checkbox" id="checkAll" @if(count(old('jadwal_hari',
                                []))>
                            0) {{ 'checked' }} @endif>
                            <label class="form-check-label" for="checkAll">Select All</label>
                            <input type="checkbox" name="jadwal_hari[]" id="Senin" value="Senin" @if(in_array('Senin',
                                old('jadwal_hari', []))) {{ 'checked' }} @endif>
                            <label class="form-check-label" for="Senin">Senin</label>
                            <input type="checkbox" name="jadwal_hari[]" id="Selasa" value="Selasa"
                                @if(in_array('Selasa', old('jadwal_hari', []))) {{ 'checked' }} @endif>
                            <label class="form-check-label" for="Selasa">Selasa</label>
                            <input type="checkbox" name="jadwal_hari[]" id="Rabu" value="Rabu" @if(in_array('Rabu',
                                old('jadwal_hari', []))) {{ 'checked' }} @endif>
                            <label class="form-check-label" for="Rabu">Rabu</label>
                            <input type="checkbox" name="jadwal_hari[]" id="Kamis" value="Kamis" @if(in_array('Kamis',
                                old('jadwal_hari', []))) {{ 'checked' }} @endif>
                            <label class="form-check-label" for="Kamis">Kamis</label>
                            <input type="checkbox" name="jadwal_hari[]" id="Jum'at" value="Jum'at"
                                @if(in_array("Jum'at", old('jadwal_hari', []))) {{ 'checked' }} @endif>
                            <label class="form-check-label" for="Jum'at">Jum'at</label>
                            <input type="checkbox" name="jadwal_hari[]" id="Sabtu" value="Sabtu" @if(in_array('Sabtu',
                                old('jadwal_hari', []))) {{ 'checked' }} @endif>
                            <label class="form-check-label" for="Sabtu">Sabtu</label>
                        </div>
                    </div>
                    <div class="col-md-12 mt-2">
                        <div class="form-group">
                            <label for="name">Jam Les<code>*</code></label>
                            <input type="time" class="form-control" name="jam_les" value="{{ old('jam_les') }}">
                            @error('guru_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 mt-5">
                        <a href="{{ route('dashboard.guru.index') }}" class="btn btn-danger">Kembali</a>
                        <button type="submit" class="btn btn-primary float-end">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('js_dashboard')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        $('.select2').select2({
            placeholder: 'Select an option',
        });
        $('#checkAll').click(function () {
            if ($(this).prop('checked')) {
                $('input[name="jadwal_hari[]"]').prop('checked', true);
            } else {
                $('input[name="jadwal_hari[]"]').prop('checked', false);
            }
        });
        $('.card').on('click','#data-id', function (e) {
            let select_data = $(e.currentTarget).data('id');
            if(select_data){
                // Remove 'selected' class from previously selected card
                $('.card').removeClass('border');
                $(this).closest('.card').addClass('border');
                $('#guru_id').val(select_data);
            }
        });
    });
</script>

@endpush
@endsection
