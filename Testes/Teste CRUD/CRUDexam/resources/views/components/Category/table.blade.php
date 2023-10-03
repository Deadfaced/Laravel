<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
                <th scope="row">{{ $category->id }}</th>
                <td>{{ $category->name }}</td>

                <td class="d-flex justify-content-center">
                    <a class="btn btn-primary mr-2" href="{{ route('category.show', $category->id) }}">Show</a>
                <a class="btn btn-success mr-2" href="{{ route('category.edit', $category->id) }}">Edit</a>
                <form method="post" action="{{route('category.destroy', $category->id)}}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
