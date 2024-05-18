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
@section('title','Deskripsi Anak')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-md-12">
            <div class="card" id="card">
                <h5 class="card-title text-center">Data Deskripsi
                    <a href="{{ route('dashboard.deskripsi.anak.create') }}" class="btn btn-primary float-end"
                        style="margin-right: 20px;">
                        Tambah
                    </a>
                </h5>
                <div class="card-body">
                    <table class="table table-responsive table-hover text-center fon">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Anak</th>
                                <th scope="col">Nama Guru</th>
                                <th scope="col">Sesi</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($deskripsis as $deskripsi)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $deskripsi->bimbel->nama_anak }}</td>
                                <td>{{ $deskripsi->guru->name }}</td>
                                <td>{{ $deskripsi->sesi }}</td>
                                <td>{{ $deskripsi->description }}</td>
                                <td>
                                @if(Auth::user()->role == 2)
                                    <a href="{{ route('dashboard.deskripsi.anak.edit', $deskripsi->slug) }}"
                                        class="btn btn-warning btn-sm"><i class="bi bi-pen"></i></a>
                                    <a href="#" data-id="{{ $deskripsi->slug }}" class="btn btn-danger btn-sm delete"
                                        title="Hapus">
                                        <form action="{{ route('dashboard.deskripsi.anak.destroy', $deskripsi->slug) }}"
                                            id="delete-{{ $deskripsi->slug }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('delete')
                                        </form>
                                        <i class="bi bi-trash"></i>
                                @else
                                <a href="{{ route('dashboard.deskripsi.anak.show', $deskripsi->slug) }}"
                                    class="btn btn-warning btn-sm"><i class="bi bi-eye"></i></a>
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
                        {{ $deskripsis->onEachSide(1)->links() }}
                    </ul>
                </div>
            </div>
        </div>
</section>
@endsection
