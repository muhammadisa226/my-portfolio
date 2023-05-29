@extends('dashboard.layout')

@section('content')
<p class="card-title">Pages</p>
<div class="pb-3"><a href="{{ route('pages.create') }}" class="btn btn-primary">+ Add Pages </a></div>
<div class="table-responsive">
    <table class="table table-stripped">
        <thead>
            <tr>
                <th class="col-1">No</th>
                <th>Judul</th>
                <th class="col-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
