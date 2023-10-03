@extends('master.main')

@section('content')
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Address</th>
                <th scope="col">City</th>
                <th scope="col">Country</th>
                <th scope="col">Postal Code</th>
                <th scope="col">Person Name</th>
                <th scope="col">Person Birthdate</th>
                <th scope="col">Person Email</th>
                <th scope="col">Address->person->pets</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($addresses as $address)

            <tr>
                <th scope="row">{{ $address->id }}</th>
                <td>{{ $address->address }}</td>
                <td> {{ $address->city }} </td>
                <td> {{ $address->country }} </td>
                <td> {{ $address->postal_code }} </td>
                <td> {{ $address->person->name }} </td>
                <td> {{ $address->person->birthdate }} </td>
                <td> {{ $address->person->email }} </td>
                <td>
                    @foreach ($address->person->pets as $pet)
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
