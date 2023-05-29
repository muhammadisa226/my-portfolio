@extends('dashboard.layout')

@section('content')
<div class="pb-3"><a href="{{ route('pages.index') }}" class="btn btn-secondary "> << Back </a></div>
    <form action="{{ route('pages.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="judul" class="form-label">Judul</label>
        <input type="text" class="form-control" name="judul" id="judul" aria-describedby="helpId" placeholder="Judul" value="{{ Session::get('judul') }}">
    </div>
    <div class="mb-3">
        <label for="isi" class="form-label">Isi</label>
    <textarea class="form-control" rows="5" name="isi"></textarea>
    </div>
    <button class="btn btn-primary">Simpan</button>
    </form>
@endsection
