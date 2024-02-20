@extends('layout.main')

@section('content')
  <h1>{{ $title }}</h1>
  <!-- <a href="/kelas/create" class="btn btn-primary mb-3">ADD data</a> -->
  @if(session('success'))
    <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
  @endif

  @if(count($kelas) > 0)
    <h2>Existing Items</h2>
    <div class="container-fluid">
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>Timestamp</th>
        </tr>
      </thead>
      <tbody>
        @foreach($kelas as $item)
          <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->created_at }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
    </div>
  @else
    <p>No items found.</p>
  @endif
@endsection