@extends('layout.main')

@section('content')
  <h1>Edit Student</h1>

  <form method="POST" action="/dashboard/update/{{ $student->id }}">
    @csrf
    @method('post')
    <div class="form">
        <div class="form-group">
            <label for="nis">NIS</label>
            <input type="text" class="form-control" name="nis" id="nis" value="{{ $student->nis }}" >
        </div>
        <div class="form-group">
            <label for="nama">Name</label>
            <input type="text" class="form-control" name="nama" id="nama" value="{{ $student->nama }}" >
        </div>
        <div class="form-group">
            <label for="tanggal_lahir">Date of Birth</label>
            <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="{{ $student->tanggal_lahir }}" >
        </div>
        <div class="form-group">
        <label for="kelas_id" class="form-label">Kelas</label>
        <select class="form-select" name="kelas_id" id="kelas">
        @foreach($grades as $class)
            <option name="kelas_id" value="{{$class -> id}}" {{$class->nama == $student -> kelas ? 'selected' : ''}}>{{$class ->nama}}</option>
            @endforeach
        </select>
        </div>

         <div class="form-group">
            <label for="kelas">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $student->alamat }}" >
        </div>
        <div class="mt-2 d-flex justify-content-center">
            <button type="submit" class="btn btn-primary btn-lg">Edit</button>
        </div>
    </div>
  </form>
@endsection