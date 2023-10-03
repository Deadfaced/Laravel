@extends('master.main')

@section('content')
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Color</th>
                <th scope="col">Birthdate</th>
                <th scope="col">Person Name</th>
                <th scope="col">Person Birthdate</th>
                <th scope="col">Person Email</th>
                <th scope="col">Person Address</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($pets as $pet)

            <tr>
                <th scope="row">{{ $pet->id }}</th>
                <td>{{ $pet->name }}</td>
                <td> {{ $pet->color }} </td>
                <td> {{ $pet->birthdate }} </td>
                <td> {{ $pet->person->name }} </td>
                <td> {{ $pet->person->birthdate }} </td>
                <td> {{ $pet->person->email }} </td>
                <td> {{ $pet->person->address->address . ' | ' . $pet->person->address->city . ' | ' . $pet->person->address->country . ' | ' . $pet->person->address->postal_code }} </td>
            </tr>

            @endforeach

        </tbody>
    </table>
@endsection
