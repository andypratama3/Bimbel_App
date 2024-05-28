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
@section('title','Grade Guru Karakter')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-md-12">
            <div class="card" id="card">
                <h5 class="card-title text-center"><a href="{{ route('dashboard.grade.guru.index') }}" class="btn btn-warning float-start" style="margin-left: 10px;">Kembali</a> Data Grade Karakter</h5>
                <div class="card-body">
                    <table class="table table-responsive table-hover text-center fon">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Guru</th>
                                <th scope="col">Total</th>
                                <th scope="col">Rating</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($grades_by_guru as $guruId => $counts)
                            @php
                            $starRating = $starRatings_by_karakter->get($guruId, 0);
                            @endphp
                                <tr>
                                    <td>{{ ++$no }}</td>
                                    <td>{{ $grades->where('guru_id', $guruId)->first()->guru->name ?? 'Unknown' }}</td>
                                    <td>{{ $counts->sum() }}</td>
                                    <td>

                                        @for ($i = 0; $i < 5; $i++)
                                            @if($starRating >= ($i + 0.5))
                                                <i class="bi bi-star"></i>
                                            @else
                                                <i class="bi bi-star"></i>
                                            @endif
                                        @endfor
                                    </td>

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
                        {{ $grades->onEachSide(1)->links() }}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
