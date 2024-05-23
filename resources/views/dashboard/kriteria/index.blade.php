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
@section('title','kriteria Bimbel')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-md-12">
            <div class="card" id="card">
                <h5 class="card-title text-center">Data Kriteria <a
                        href="{{ route('dashboard.kriteria.create') }}" class="btn btn-primary float-end" style="margin-right: 20px;">Tambah</a>
                </h5>
                <div class="card-body">
                    <table class="table table-responsive table-hover text-center fon">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kriteria</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($kriterias as $kriteria)
                            <tr>
                                <td>{{ ++$no }}</td>
                        <td>{{ $kriteria->name }}</td>

                        <td>
                            <a href="{{ route('dashboard.kriteria.edit', $kriteria->slug) }}"
                                class="btn btn-warning btn-sm"><i class="bi bi-pen"></i></a>
                            <a href="#" data-id="{{ $kriteria->slug }}" class="btn btn-danger btn-sm delete" title="Hapus">
                                <form action="{{ route('dashboard.kriteria.destroy', $kriteria->slug) }}"
                                    id="delete-{{ $kriteria->slug }}" method="POST" enctype="multipart/form-data">
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
                        {{-- {{ $kriterias->onEachSide(1)->links() }} --}}
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection
