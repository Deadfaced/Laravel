@extends('master.main')

@section('content')


<table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">User ID</th>
        <th scope="col">Brand</th>
        <th scope="col">Model</th>
        <th scope="col">Color</th>
        <th scope="col">Price</th>
      </tr>
    </thead>

    <tbody>

        @foreach ($bicycles as $bicycle)
            <tr>
                <td>{{ $bicycle->id }}</td>
                <td>{{ $bicycle->user->id }}</td>
                <td>{{ $bicycle->brand }}</td>
                <td>{{ $bicycle->model }}</td>
                <td>{{ $bicycle->color }}</td>
                <td>{{ $bicycle->price }}</td>
            </tr>
        @endforeach
    </tbody>
  </table>

@endsection
