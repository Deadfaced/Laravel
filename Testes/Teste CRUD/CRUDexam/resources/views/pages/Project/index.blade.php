@extends('master.main')
@section('content')
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="container">
        <a class="btn btn-primary mb-3" href="{{ route('project.create') }}">Create</a>
        @component('components.Project.table', [
            'projects' => $projects,
            ])
        @endcomponent
    </div>
@endsection
