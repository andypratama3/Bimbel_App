@extends('layouts.app.dashboard')
@push('css_dashboard')
<style>
    .table tr th {
        font-size: 14px;
    }

    .table tr td {
        font-size: 14px;
    }
    .bi-star{
        color: yellow;
        font-size: 20px;
    }
</style>
@endpush
@section('title','Data Anak')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-md-12">
            <div class="card" id="card">
                <h5 class="card-title text-center">Data Anak </h5>
                <div class="card-body">
                    <table class="table table-responsive table-hover text-center fon">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bimbel as $bim)
                                <tr>
                                    <td>{{ ++$no }}</td>
                                    <td>{{ $bim->nama_anak }}</td>
                                    <td>{{ $count }}</td>

                                    <td>
                                        <a href="{{ route('dashboard.grade.guru.show', $guruId) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <ul class="pagination pagination-sm m-0 " style="float: right !important;">
                        {{-- {{ $grades->onEachSide(1)->links() }} --}}
                    </ul>
                </div>
            </div>
        </div>
</section>
@endsection
