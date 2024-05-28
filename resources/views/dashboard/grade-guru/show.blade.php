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
@section('title','Grade Guru')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-md-12">
            <div class="card" id="card">
                <h5 class="card-title text-center"><a href="{{ route('dashboard.grade.guru.rating') }}" class="btn btn-warning float-start" style="margin-left: 10px;">Kembali</a> Data Grade {{ $grades->first()->guru->name }}</a>
                </h5>
                <div class="card-body">
                    <table class="table table-responsive table-hover text-center fon">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Murid</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($grades as $data)
                                <tr>
                                    <td>{{ ++$no }}</td>
                                    <td>{{ $data->bimbel->nama_anak }}</td>
                                    <td>
                                        <a href="#" data-id="{{ $data->bimbel_id }}" class="btn btn-danger btn-sm delete" title="Hapus">
                                            <form action="{{ route('dashboard.grade.guru.destroy', $data->bimbel_id) }}"
                                                id="delete-{{ $data->bimbel_id }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('delete')
                                            </form>
                                            <i class="bi bi-trash"></i>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <ul class="pagination pagination-sm m-0 " style="float: right !important;">
                        {{ $grades->onEachSide(1)->links() }}
                    </ul>
                </div>

            </div>
        </div>
</section>
@endsection
