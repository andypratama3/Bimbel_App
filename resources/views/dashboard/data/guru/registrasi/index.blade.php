@extends('layouts.app.dashboard')
@push('css_dashboard')
    <style>
        .table tr th {
            font-size: 14px;
        }
        .table tr td{
            font-size: 14px;
        }
    </style>
@endpush
@section('title','Registrasi Guru')
@section('content')

<div class="col-md-12" id="">
    <div class="row">
        <div class="card" id="card">
            <h5 class="card-title text-center">Data Pendaftar Guru</h5>
            <div class="card-body">
              <table class="table table-responsive table-hover text-center fon">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">CV</th>
                    <th scope="col">WhatsApp</th>
                    <th scope="col">Mata Pelajaran</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse($gurus as $guru)
                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>{{ $guru->name }}</td>
                            <td>{{ $guru->cv }}</td>
                            <td>{{  $guru->whatsapp }}</td>
                            <td>{{ $guru->mata_pelajaran }}</td>
                            <td>
                                <a href="{{ route('dashboard.datamaster.pendaftar.guru.edit', $guru->slug) }}" class="btn btn-warning btn-sm"><i class="bi bi-pen"></i></a>
                                <a href="#" data-id="{{ $guru->slug }}" class="btn btn-danger btn-sm delete"
                                    title="Hapus">
                                    <form action="{{ route('dashboard.datamaster.pendaftar.guru.destroy', $guru->slug) }}"
                                        id="delete-{{ $guru->slug }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('delete')
                                    </form>
                                    <i class="bi bi-trash"></i>
                            </td>
                        </tr>
                    @empty
                    <td colspan="8">
                        <strong>0 Data Found</strong>
                    </td>
                    @endforelse
                </tbody>
              </table>
            </div>
            <div class="card-footer">
                <ul class="pagination pagination-sm m-0 " style="float: right !important;">
                    {{ $gurus->onEachSide(1)->links() }}
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
