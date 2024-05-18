@extends('layouts.app.dashboard')
@push('css_dashboard')
<style>
    .table tr th {
        font-size: 14px;
    }

    .table tr td {
        font-size: 14px;
    }
</style>
@endpush
@section('title','dokumentasi')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-md-12">
            <div class="card" id="card">
                <h5 class="card-title text-center">Data Dokumentasi
                    <a href="{{ route('dashboard.dokumentasi.create') }}" class="btn btn-primary float-end"
                        style="margin-right: 20px;">
                        Tambah
                    </a>
                </h5>
                <div class="card-body">
                    <table class="table table-responsive table-hover text-center fon">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Title</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Nama Guru</th>
                                <th scope="col">Nama Anak</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($dokumentasis as $dokumentasi)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $dokumentasi->name }}</td>
                                <td>{{ date('d-m-Y', strtotime($dokumentasi->tanggal_selesai)) }}</td>
                                <td>{{ $dokumentasi->guru->name }}</td>
                                <td>{{ $dokumentasi->bimbel->nama_anak }}</td>
                                <td>
                                    @if(Auth::user()->role == 2)
                                        <a href="{{ route('dashboard.dokumentasi.edit', $dokumentasi->slug) }}"
                                            class="btn btn-warning btn-sm"><i class="bi bi-pen"></i></a>
                                        <a href="#" data-id="{{ $dokumentasi->slug }}" class="btn btn-danger btn-sm delete"
                                            title="Hapus">
                                            <form action="{{ route('dashboard.dokumentasi.destroy', $dokumentasi->slug) }}"
                                                id="delete-{{ $dokumentasi->slug }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('delete')
                                            </form>
                                            <i class="bi bi-trash"></i>
                                            @else
                                            <a href="{{ route('dashboard.dokumentasi.show', $dokumentasi->slug) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i></a>
                                            @endif
                                </td>
                            </tr>
                            @empty
                                
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <ul class="pagination pagination-sm m-0 " style="float: right !important;">
                        {{ $dokumentasis->onEachSide(1)->links() }}
                    </ul>
                </div>
            </div>
        </div>
</section>
@endsection
