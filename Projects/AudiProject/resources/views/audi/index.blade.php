@extends('master.main')

@section('styles')

@stop



@section('scripts')

@stop



@section('content')

    <div class="container">

        <div class="row">


            @component('components.carousel.carousel')

            @endcomponent


        </div>

    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                @component('components.cards.card')

                @endcomponent
            </div>
            <div class="col">
                @component('components.cards.card')

                @endcomponent
            </div>
            <div class="col">
                @component('components.cards.card')

                @endcomponent
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row mt-3">
                @component('components.textImage.textImage')

                @endcomponent


                @component('components.textImage.imageText')

                @endcomponent
        </div>
    </div>

    <div class="container">

    </div>

@stop
