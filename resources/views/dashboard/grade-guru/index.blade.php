@extends('layouts.app.dashboard')

@section('title','Grade')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-md-12">
            @if(Auth::user()->role == 1)
            <div class="card" id="card">
                <h5 class="card-title text-center">Grade Guru </h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-responsive table-hover text-center fon">
                                <thead>
                                    <tr>
                                        <td>Kategori</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="{{ route('dashboard.grade.guru.create') }}" class="btn btn-primary">Rating Guru</a></td>
                                    </tr>
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
                </div>
            </div>
            @else
            <div class="card" id="card">
                <h5 class="card-title text-center">Grade Guru </h5>
                <div class="card-body">
                    <div class="row">
                        <table class="table table-responsive table-hover text-center fon">
                            <thead>
                                <tr>
                                    <td>Nama Guru</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($grades as $grade)
                                <tr>
                                    <td>{{ $grade->guru->name }}</td>
                                    <td>
                                        <a href="#" data-id="{{ $grade->id }}" class="btn btn-danger btn-sm delete"
                                            title="Hapus">
                                            <form action="{{ route('dashboard.grade.guru.destroy', $grade->id) }}"
                                                id="delete-{{ $grade->id }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('delete')
                                            </form>
                                            <i class="bi bi-trash"></i>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="2">  <a href="{{ route('dashboard.grade.guru.create') }}" class="btn btn-primary">Rating Guru</a></td>
                                </tr>
                                @endforelse
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
            @endif
        </div>
</section>
@endsection
