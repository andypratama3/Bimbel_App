@extends('layouts.app.dashboard')

@section('title','Grade Guru')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-md-12">
            <div class="card" id="card">
                <h5 class="card-title text-center"><a href="{{ route('dashboard.user.index') }}"
                        class="btn btn-warning btn-sm float-start" style="margin-left: 20px;">Kembali</a> Edit
                    Data</a>
                </h5>
                <div class="card-body">
                    <form action="{{ route('dashboard.user.update', $user->slug) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mt-2">
                                <label class="label" for="">Nama</label>
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                            </div>
                            <div class="col-md-6 mt-2">
                                <label class="label" for="">Email</label>
                                <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                            </div>
                            <div class="col-md-6 mt-2">
                                <label class="label" for="">Bergabung Pada</label>
                                <input type="text" class="form-control"  value="{{ $user->created_at->format('d:m:Y') }}">
                            </div>
                            <div class="col-md-6 mt-2">
                                <label for="">Role </label>
                                <select name="role" id="role" class="form-control">
                                    <option value="{{ $user->role }}">{{ $user->role == 1 ? 'Admin' : 'Guru' }}</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Guru</option>
                                </select>
                            </div>
                            <div class="col-md-12 mt-2">
                                <button class="btn btn-primary float-end" type="submit">Update </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</section>
@endsection
