@extends('master.main')
@section('content')
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="container">
        <a class="btn btn-primary mb-3" href="{{ route('category.create') }}">Create</a>
        @component('components.Category.table', [
            'categories' => $categories,
            ])
        @endcomponent
    </div>
@endsection
