@extends('layout.main')

@section('content')
    <h1>Ini adalah halaman student</h1>
   <!-- <a href="/student/create" class="btn btn-primary mb-3">ADD data</a> -->

   @if (session()->has('success'))
    <div class="alert alert-success col-lg-12" role="alert">
        {{ session('success') }}
    </div>
   @endif

    <table class="table table-striped table-bordered">
        <thead>
            <tr class="table-dark">
                <th>NIS</th>
                <th>NAMA</th>
                <th>KELAS</th>
                <th>ALAMAT</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <th>{{ $student->nis }}</th>
                    <td>{{ $student->nama }}</td>
                    <td>{{ $student->kelas_id ?? "Class Not Found" }}</td>
                    <td>{{ $student->alamat }}</td>
                    <td>
                            <a href= "/student/detail/{{ $student->id }}" class="btn btn-primary">Detail</a>
                            <!-- <a href="/student/edit/{{ $student->id }}" class="btn btn-warning">Edit</a>
                            <form action="/student/delete/{{ $student->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                        </form> -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
