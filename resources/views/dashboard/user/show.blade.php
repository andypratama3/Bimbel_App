@extends('layouts.app.dashboard')

@section('title','Grade Guru')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-md-12">
            <div class="card" id="card">
                <h5 class="card-title text-center"><a href="{{ route('dashboard.user.index') }}"
                        class="btn btn-warning btn-sm float-start" style="margin-left: 20px;">Kembali</a> Detail
                    Data</a>
                </h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mt-2">
                            <label class="label" for="">Nama</label>
                            <input type="text" class="form-control" value="{{ $user->name }}" readonly>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label class="label" for="">Email</label>
                            <input type="text" class="form-control" value="{{ $user->email }}" readonly>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label class="label" for="">Bergabung Pada</label>
                            <input type="text" class="form-control" value="{{ $user->created_at->format('d:m:Y') }}" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection
