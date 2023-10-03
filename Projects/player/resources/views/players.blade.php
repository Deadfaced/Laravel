@extends('master.main')

@section('styles')
@endsection

@section('scripts')
@endsection

@section('content')


    @component('components.table', [
    'players' => $players,
    ])



    @endcomponent
@endsection
