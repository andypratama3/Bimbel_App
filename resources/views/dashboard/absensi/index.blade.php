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
@section('title','Absensi')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-md-12">
            <div class="card" id="card">
                <h5 class="card-title text-center">Data Absensi
                    <a href="{{ route('dashboard.absensi.create') }}" class="btn btn-primary float-end"
                        style="margin-right: 20px;">
                        Tambah
                    </a>
                </h5>
                <div class="card-body">
                    <table class="table table-responsive table-hover text-center fon">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal Mulai</th>
                                <th scope="col">Tanggal Selesai</th>
                                <th scope="col">Sesi</th>
                                <th scope="col">Nama Guru</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($absensis as $absen)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ date('d-m-Y', strtotime($absen->tanggal_mulai)) }}</td>
                                <td>{{ date('d-m-Y', strtotime($absen->tanggal_selesai)) }}</td>
                                <td>{{ $absen->sesi }}</td>
                                <td>{{ $absen->guru->name }}</td>
                                <td><a href="{{ asset('storage/absen/img/'. $absen->foto_absen) }}" target="_blank" class="btn btn-primary btn-sm">Lihat Foto <i class="bi bi-files"></i></a></td>
                                <td>
                                    @if(Auth::user()->role == 2)
                                        <a href="{{ route('dashboard.absensi.edit', $absen->id) }}"
                                            class="btn btn-warning btn-sm"><i class="bi bi-pen"></i></a>
                                        <a href="#" data-id="{{ $absen->id }}" class="btn btn-danger btn-sm delete"
                                            title="Hapus">
                                            <form action="{{ route('dashboard.absensi.destroy', $absen->id) }}"
                                                id="delete-{{ $absen->id }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('delete')
                                            </form>
                                            <i class="bi bi-trash"></i>
                                            @else
                                            <a href="{{ route('dashboard.absensi.show', $absen->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i></a>
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
                        {{ $absensis->onEachSide(1)->links() }}
                    </ul>
                </div>
            </div>
        </div>
</section>
@endsection
