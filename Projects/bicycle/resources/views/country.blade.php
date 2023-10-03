@extends('master.main')

@section('content')


<table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
      </tr>
    </thead>

    <tbody>

        @foreach ($countries as $country)
            <tr>
                <td>{{ $country->id }}</td>
                <td>{{ $country->name }}</td>
            </tr>
        @endforeach
    </tbody>
  </table>

@endsection
