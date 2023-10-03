@extends('master.main')

@section('content')
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">birthdate</th>
                <th scope="col">email</th>
                <th scope="col">address</th>
                <th scope="col">pets</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($people as $person)

            <tr>
                <th scope="row">{{ $person->id }}</th>
                <td>{{ $person->name }}</td>
                <td> {{ $person->birthdate }} </td>
                <td> {{ $person->email }} </td>
                <td> {{ $person->address->address . ' | ' . $person->address->city . ' | ' . $person->address->country . ' | ' . $person->address->postal_code }} </td>
                <td>
                    @foreach ($person->pets as $pet)
                        <ul>
                            <li> {{ $pet->name }}</li>
                            <li> {{ $pet->color }} </li>
                            <li> {{ $pet->birthdate }} </li>
                        </ul>
                    @endforeach
                </td>
            </tr>

            @endforeach

        </tbody>
    </table>
@endsection
