@extends('MainPage')

@section('title', 'Home Page');

@section('content')
    <div class="row card">
        <div class="card card-default">
            <div class="card-header text-center h3">
                Not Done
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach ($abc as $item)
                        <li class="list-group-item">
                            {{ $item->subject }}
                            {{-- <button type="button" class="btn btn-sm btn-primary float-right">View</button> --}}
                            <form action="{{ url('/') }}/detail/{{ $item->id }}" method="POST">
                                {{-- <input type="submit" /> --}}
                                <input name="" id="" class="btn btn-sm btn-primary float-right" type="submit" value="View">
                            </form>
                        </li>
                        <hr>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>
@endsection
