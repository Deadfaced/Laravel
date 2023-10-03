@extends('master.main')
@section('content')
    <div class="container">
        <h1>Create Product</h1>
        <form method="post" action="{{ route('product.store') }}">
            @csrf
            @method('POST')

            {{-- Input --}}
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
                </div>

                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name') }}" required aria-label="Sizing example input"
                       aria-describedby="inputGroup-sizing-default">

                @error('name')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Details</span>
                </div>

                <input type="text" id="details" name="details" class="form-control @error('details') is-invalid @enderror"
                       value="{{ old('details') }}" required aria-label="Sizing example input"
                       aria-describedby="inputGroup-sizing-default">

                @error('details')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Category Id</span>
                </div>

                <select name="category_id" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->category_id }}">{{ $category->category_id }}</option>
                    @endforeach
                </select>

                @error('category_id')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Project Id</span>
                </div>

                <select name="project_id" required>
                    @foreach($projects as $project)
                        <option value="{{ $project->project_id }}">{{ $project->project_id }}</option>
                    @endforeach
                </select>
                @error('project_id')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            {{-- Submit --}}
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
