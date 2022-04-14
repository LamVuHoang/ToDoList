@extends('MainPage')

@section('title', 'Detail')

@section('content')
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <div class="card card-default">
                @if ($work->completed == 1)
                    <div class="card-header text-center text-white bg-primary h3">
                        Work Have Done
                    </div>
                @else
                    <div class="card-header text-center text-white bg-danger h3">
                        Work NOT Done
                    </div>
                @endif
                <div class="card-body">
                    {{ $work->id }}. {{ $work->subject }}
                    <hr>
                    {{ $work->detail }}
                    <hr>
                    <?php
                    $deadline = new DateTime($work->deadline);
                    ?>
                    Deadline: {{ $deadline->format('M d, Y') }}
                </div>
            </div>
        </div>
        <div class="col-4"></div>
    </div>
@endsection
