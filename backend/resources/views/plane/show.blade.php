@extends('layouts.main')

@section('title', isset($title) ? $title : 'Nincs title!')

@section('content')
    <div class="row">
        <div class="col-12">
            <table class="table table-responsive table-striped">
                <tbody>
                    <tr>
                        <td>Típus</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Hajtóművek száma</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Első felszállás</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Maximum ülések száma</td>
                        <td><span class="badge text-bg-primary"> ülés</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-12">
            <h2>A család típusai</h2>
            @isset($plane['variants'])    
                <ul>
                    
                </ul>
            @endisset
        </div>
        <div class="col-12">
            <img src="" alt="" class="w-100 " >
        </div>
    </div>
@endsection