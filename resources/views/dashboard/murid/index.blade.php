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
                <h5 class="card-title text-center">Data Murid
                    {{-- <a href="{{ route('dashboard.modul.create') }}" class="btn btn-primary float-end"
                        style="margin-right: 20px;">
                        Tambah
                    </a> --}}
                </h5>
                <div class="card-body">
                    <table class="table table-responsive table-hover text-center fon">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Anak</th>
                                <th scope="col">Jenjang Anak</th>
                                <th scope="col">Jam</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($murid_list as $murid)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $murid->bimbel->nama_anak }}</td>
                                <td>{{ $murid->bimbel->jenjang_sekolah }}</td>
                                <td>{{ $murid->jam_les }}</td>
                            </tr>
                            @empty
                            <tr></tr>
                                <td colspan="4">Tidak Ada Data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <ul class="pagination pagination-sm m-0 " style="float: right !important;">
                        {{ $murid_list->onEachSide(1)->links() }}
                    </ul>
                </div>
            </div>
        </div>
</section>
@endsection
