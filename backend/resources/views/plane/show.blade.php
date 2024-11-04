@extends('layouts.main')

@section('title', isset($title) ? $title : 'Nincs title!')

@section('content')
<div class="row">
    <div class="col-12">
        <table class="table table-responsive table-striped">
            <tbody>
                <tr>
                    <td>Típus</td>
                    @if ($plane["type"] === "narrow_body")
                    <td>Keskenytörzsű</td>
                    @else
                    <td>Szélestörzsű</td>
                    @endif

                </tr>
                <tr>
                    <td>Hajtóművek száma</td>
                    <td>{{$plane["engines"]}}</td>
                </tr>
                <tr>
                    <td>Első felszállás</td>
                    <td>{{$plane["first_flight"]}}</td>
                </tr>
                <tr>
                    <td>Maximum ülések száma</td>
                    <td><span class="badge text-bg-primary">{{$plane["seats"]}} ülés</span></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-12">
        <h2>A család típusai</h2>
        @isset($plane['variants'])
        <ul>
            @foreach($plane['variants'] as $variant)
            <li>{{$variant}}</li>
            @endforeach
        </ul>
        @endisset
    </div>
    <div class="col-12">
        <img src="{{ asset('/images/' . strtolower($plane['family']) . '.jpg')}}" alt="" class="w-100 rounded">
    </div>
</div>
@endsection