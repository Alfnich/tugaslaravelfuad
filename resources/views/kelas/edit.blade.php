@extends('layout.main')

@section('content')
  <h1>{{ $title }}</h1>

  @if($errors->any())
    <div class="alert alert-danger" role="alert">
      <ul>
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="post" action="/dashboard/updateKelas/{{ $kelas->id }}">
    @csrf

    <div class="mb-3">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $kelas->nama) }}">
    </div>
    <button type="submit" class="btn btn-primary">Update Item</button>
  </form>
@endsection
