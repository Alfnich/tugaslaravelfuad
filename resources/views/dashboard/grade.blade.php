@extends('layout.mainDashboard')

@section('conten')
<h1>Ini adalah halaman Kelas!</h1>

<a href="/dashboard/tambahKelas">
    <button class="btn btn-success" >Tambah</button>
</a>
    @if (session()->has('success'))
        <div class="alert alert-success col-lg-12" role="alert">
            {{session ('success')}}
        </div>
    @endif


<div class="container mt-5">
       
    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
        $no = 1;
    @endphp
           @foreach ($kelas as $classs )
           
           <tr>
           <td>{{$no}}</td>
           <td>{{ $classs->nama }}</td>
           <td class="d-flex gap-2">
            <form  method="POST" action="/dashboard/deleteKelas/{{ $classs->id }}" >
            @method('delete')
            @csrf
            <button class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data siswa ini?')">Delete</button>
        </form>
        <a href="/dashboard/editKelas/{{ $classs->id }}">
            <button class="btn btn-warning">Edit</button>
        </a>
    </td>
        </tr> 
       
       @php
        $no++;
        @endphp
           @endforeach
        </tbody>
    </table>
</div>
@endsection