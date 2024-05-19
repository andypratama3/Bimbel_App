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
@section('title','Siswa Bimbel')
@section('content')

<div class="col-md-12" id="">
    <div class="row">
        <div class="col-md-12">
                <div class="form-group">

                    <a href="{{ route('dashboard.datamaster.siswa.bimbel.export') }}" class="btn btn-success btn-sm"><i class="bi bi-file-excel-fill"></i> Export Excel </a>
                    <a href="{{ route('dashboard.datamaster.siswa.bimbel.create') }}" class="btn btn-primary btn-sm float-end"><bi class="bi bi-plus"></bi> Tambah </a>
                </div>
        </div>
        <div class="card mt-2" id="card">
            <h5 class="card-title text-center mb-3">Data Siswa Bimbel</h5>
            <div class="card-body">

              <table class="table table-responsive table-hover text-center">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Kelas Berjalan</th>
                    <th scope="col">Program Les</th>
                    <th scope="col">Janjang Sekolah</th>
                    <th scope="col">Tanggal Mulai</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse($register_Data as $data)
                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>{{ $data->nama_anak }}</td>
                            <td>{{ $data->jk }}</td>
                            <td>{{ $data->kelas_berjalan }}</td>
                            <td>{{ $data->program_les }}</td>
                            <td>{{ $data->jenjang_sekolah }}</td>
                            <td>{{ $data->tanggal_mulai }}</td>
                            <td>
                                <a href="{{ route('dashboard.datamaster.siswa.bimbel.show', $data->slug) }}" class="btn btn-secondary btn-sm"><i class="bi bi-eye"></i></a>
                                <a href="{{ route('dashboard.datamaster.siswa.bimbel.edit', $data->slug) }}" class="btn btn-warning btn-sm"><i class="bi bi-pen"></i></a>
                                <a href="#" data-id="{{ $data->slug }}" class="btn btn-danger btn-sm delete"
                                    title="Hapus">
                                    <form action="{{ route('dashboard.datamaster.siswa.bimbel.destroy', $data->slug) }}"
                                        id="delete-{{ $data->slug }}" method="POST" enctype="multipart/form-data">
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
                    {{ $register_Data->onEachSide(1)->links() }}
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
