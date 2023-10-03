@extends('master.main')
@section('content')
    <div class="container">
        <h1>Product Info</h1>
        <form method="post" action="">
            @csrf
            {{-- Input --}}
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
                </div>

                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                       value="{{ $product ? $product->name : old('name') }}" disabled aria-label="Sizing example input"
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
                       value="{{ $product ? $product->details : old('details') }}" disabled aria-label="Sizing example input"
                       aria-describedby="inputGroup-sizing-default">

                @error('details')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </form>
    </div>
@endsection
