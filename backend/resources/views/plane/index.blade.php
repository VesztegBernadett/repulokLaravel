@extends('layouts.main')

@section('title', isset($title) ? $title : 'Nincs title!')

@section('content')

    @include('plane.partials.form')

    <div class="row my-1">


        @foreach($planes as $plane)
            @isset($plane)
                @include('plane.partials.card', ['plane' => $plane])
            @endisset
        @endforeach


    </div>

    <div class="row my-1">

        @isset($maxSeats)
            @include('plane.partials.info', ['title' => 'Legnagyobb kapacitás', 'plane' => $maxSeats])
        @endisset

        @isset($oldest)
            @include('plane.partials.info', ['title' => 'Legelőször szállt fel', 'plane' => $oldest])
        @endisset

        @isset($averageSeats)
            @include('plane.partials.average', ['averageSeats' => $averageSeats])
        @endisset

    </div>

@endsection