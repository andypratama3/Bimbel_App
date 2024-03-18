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
@section('title','Paket Bimbel')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-md-12">
            <div class="card" id="card">
                <h5 class="card-title text-center">Data Paket Bimbel <a
                        href="{{ route('dashboard.paket.bimbel.create') }}" class="btn btn-primary float-end mr-2">Tambah</a>
                </h5>
                <div class="card-body">
                    <table class="table table-responsive table-hover text-center fon">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Paket</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($pakets as $paket)
                            <tr>
                                <td>{{ ++$no }}</td>
                        <td>{{ $paket->name }}</td>
                        <td><a href="{{ asset('storage/paket/img/'.$paket->foto) }}" target="__blank" class="btn btn-success btn-sm">Lihat Foto</a></td>
                        <td>
                            <a href="{{ route('dashboard.paket.bimbel.edit', $paket->slug) }}"
                                class="btn btn-warning btn-sm"><i class="bi bi-pen"></i></a>
                            <a href="#" data-id="{{ $paket->slug }}" class="btn btn-danger btn-sm delete" title="Hapus">
                                <form action="{{ route('dashboard.paket.bimbel.destroy', $paket->slug) }}"
                                    id="delete-{{ $paket->slug }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('delete')
                                </form>
                                <i class="bi bi-trash"></i>
                        </td>
                        </tr>
                        @empty

                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <ul class="pagination pagination-sm m-0 " style="float: right !important;">
                        {{ $pakets->onEachSide(1)->links() }}
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection
