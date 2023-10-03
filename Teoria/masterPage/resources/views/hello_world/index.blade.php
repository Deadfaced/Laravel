<h1> {{ "Hello World" }} </h1>

@extends('master.main')

@section('styles')

@stop

@section('scripts')

@stop

@section('content')

    @component('components.carousel.car')
    @endcomponent

    @component('components.cards.cardsAgainsHumanity')
    @endcomponent

    @component('components.text-image.text-image')
    @endcomponent

@stop
