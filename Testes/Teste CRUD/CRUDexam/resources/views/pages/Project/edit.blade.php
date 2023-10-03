@extends('master.main')
@section('content')
    <div class="container">
        <h1>Project</h1>
        <form method="post" action="{{ route('project.update', $project->id) }}">
            @csrf
            @method('PUT')

            {{-- Input --}}
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
                </div>

                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                       value="{{ $project ? $project->name : old('name') }}" required aria-label="Sizing example input"
                       aria-describedby="inputGroup-sizing-default">

                @error('name')
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

