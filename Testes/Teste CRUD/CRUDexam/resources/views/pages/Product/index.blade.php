@extends('master.main')
@section('content')
    <div class="container">
        <a class="btn btn-primary mb-3" href="{{ route('product.create') }}">Create</a>
        @component('components.Product.table', [
            'products' => $products,
            ])
        @endcomponent
    </div>
@endsection
