@extends('MainPage')

@section('title', 'Home Page');

@section('content')
    <div class="row card">
        <div class="card card-default">
            <div class="card-header bg-danger text-white text-center h3">
                Work Not Done
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach ($not_done as $item)
                        <li class="list-group-item">
                            {{ $item->id }}. {{ $item->subject }}
                            <form action="{{ url('detail' . '/' . $item->id) }}" method="POST">
                                @csrf
                                <input name="" id="" class="btn btn-sm btn-primary float-right" type="submit" value="View">
                            </form>
                        </li>
                        <hr>
                    @endforeach

                </ul>
            </div>
        </div>
        <div class="col-12">
            {{ $not_done->appends(['done' => $done->currentPage()])->links('vendor.pagination.Pagination') }}
        </div>
    </div>

    <hr class="border border-danger">

    <div class="row card">
        <div class="card card-default">
            <div class="card-header text-white bg-primary text-center h3">
                Work Have Done
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach ($done as $item)
                        <li class="list-group-item">
                            {{ $item->id }}. {{ $item->subject }}
                            <form action="{{ url('detail' . '/' . $item->id) }}" method="POST">
                                @csrf
                                <input name="" id="" class="btn btn-sm btn-primary float-right" type="submit" value="View">
                            </form>
                        </li>
                        <hr>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-12">
            {!! $done->appends(['not_done' => $not_done->currentPage()])->links() !!}
        </div>
    </div>
@endsection
