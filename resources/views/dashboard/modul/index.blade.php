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
@section('title','Modul')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-md-12">
            <div class="card" id="card">
                <h5 class="card-title text-center">Data Permintaan Modul
                    <a href="{{ route('dashboard.modul.create') }}" class="btn btn-primary float-end"
                        style="margin-right: 20px;">
                        Tambah
                    </a>
                </h5>
                <div class="card-body">
                    <table class="table table-responsive table-hover text-center fon">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Modul</th>
                                <th scope="col">Nama Anak</th>

                                <th scope="col">Jenjang Anak</th>
                                <th scope="col">Nama Guru</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($moduls as $modul)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $modul->name }}</td>
                                <td>{{ $modul->bimbel->nama_anak }}</td>

                                <td>{{ $modul->bimbel->jenjang_sekolah }}</td>
                                <td>{{ $modul->guru->name }}</td>

                                <td>
                                    @if($modul->status == 2)
                                        <span class="btn btn-success">Selesai <i class="bi bi-check"></i></span>
                                        @else
                                        <span class="btn btn-warning">Pending <i class="bi bi-clock"></i></span>
                                    @endif
                                </td>
                                <td>
                                    @if(Auth::user()->role == 1)
                                     @if($modul->status == 2)
                                     <form action="{{ route('modul.change.status', $modul->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-warning btn-sm">Centang Pending</button>
                                    </form>
                                     @else
                                     <form action="{{ route('modul.change.status', $modul->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm">Centang Selesai</button>
                                    </form>
                                     @endif

                                    @elseif(Auth::user()->role == 2)
                                    @endif
                                        @if(Auth::user()->role == 2)
                                        <a href="{{ route('dashboard.modul.edit', $modul->slug) }}"
                                            class="btn btn-warning btn-sm"><i class="bi bi-pen"></i></a>
                                        <a href="#" data-id="{{ $modul->slug }}" class="btn btn-danger btn-sm delete"
                                            title="Hapus">
                                            <form action="{{ route('dashboard.modul.destroy', $modul->slug) }}"
                                                id="delete-{{ $modul->slug }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('delete')
                                            </form>
                                            <i class="bi bi-trash"></i>
                                            @else
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
                        {{ $moduls->onEachSide(1)->links() }}
                    </ul>
                </div>
            </div>
        </div>
</section>
@endsection
