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
@section('title','User')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-md-12">
            <div class="card" id="card">
                <h5 class="card-title text-center">Data User</h5>
                <div class="card-body">
                    <table class="table table-responsive table-hover text-center fon">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Email</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ ++$no }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        <a href="{{ route('dashboard.user.show', $user->slug) }}" class="btn btn-warning btn-sm"><i class="bi bi-pen"></i></a>
                                        <a href="#" data-id="{{ $user->slug }}" class="btn btn-danger btn-sm delete"
                                            title="Hapus">
                                            <form action="{{ route('dashboard.user.destroy', $user->slug) }}"
                                                id="delete-{{ $user->slug }}" method="POST" enctype="multipart/form-data">
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
                        {{ $users->onEachSide(1)->links() }}
                    </ul>
                </div>
            </div>
        </div>
</section>
@endsection
