@extends('MainPage')

@section('title', 'Detail');

@section('content')
    <div class="row card">
        <div class="card card-default">
            <div class="card-header text-center h3">
                {{ $work->subject }}
            </div>
            <div class="card-body">
                {{ $work->detail }}
            </div>
        </div>
    </div>
@endsection
