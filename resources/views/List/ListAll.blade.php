@extends('MainPage')

@section('title', 'Home Page')

@section('content')
    @if (session('message'))
        <div class="row">
            <div class="col-12">
                <div class="alert alert-danger" role="alert">
                    {{ session('message') }}
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card card-default">
                <div class="card-header bg-danger text-white text-center h3">
                    Work Not Done
                </div>
                <div class="card-body">

                    <ul class="list-group">
                        @foreach ($not_done as $item)
                            <li class="list-group-item" style="">
                                <div class="row">
                                    <div class="col-12">
                                        {{ $item->id }}. {{ $item->subject }}
                                        <br>
                                        <?php
                                        $deadline = new DateTime($item->deadline);
                                        ?>
                                        Deadline: {{ $deadline->format('M d, Y') }}
                                    </div>
                                    <hr class="border border-secondary">
                                    <div class="col-2">
                                        <form action="{{ url('done' . '/' . $item->id) }}" method="POST">
                                            @csrf
                                            <input name="" id="" class="btn btn-sm btn-success float-right" type="submit"
                                                value="Done">
                                        </form>
                                    </div>
                                    <div class="col-2">
                                        <form action="{{ url('view' . '/' . $item->id) }}" method="POST">
                                            @csrf
                                            <input name="" id="" class="btn btn-sm btn-primary float-right" type="submit"
                                                value="View">
                                        </form>
                                    </div>
                                    <div class="col-2">
                                        <form action="{{ url('modify' . '/' . $item->id) }}" method="POST">
                                            @csrf
                                            <input name="" id="" class="btn btn-sm btn-warning float-right" type="submit"
                                                value="Modify">
                                        </form>
                                    </div>
                                    <div class="col-2">
                                        {{-- {{ Form::open(['url' => 'delete/' . $item->id]) }}
                                        {{ Form::hidden('_method', 'DELETE') }}
                                        {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                        {{ Form::close() }} --}}
                                        <form action="{{ url('delete' . '/' . $item->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <input name="" id="" class="btn btn-sm btn-danger float-right" type="submit"
                                                value="Delete">
                                        </form>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <br>
                    <div>
                        {{ $not_done->appends(['done' => $done->currentPage()])->links() }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card card-default">
                <div class="card-header text-white bg-primary text-center h3">
                    Work Have Done
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($done as $item)
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-12">
                                        {{ $item->id }}. {{ $item->subject }}
                                    </div>
                                    <hr class="border border-secondary">
                                    <div class="col-2">
                                        <form action="{{ url('done' . '/' . $item->id) }}" method="POST">
                                            @csrf
                                            <input name="" id="" class="btn btn-sm btn-secondary float-right" type="submit"
                                                value="NOT Done">
                                        </form>
                                    </div>
                                    <div class="col-2">
                                        <form action="{{ url('view' . '/' . $item->id) }}" method="POST">
                                            @csrf
                                            <input name="" id="" class="btn btn-sm btn-primary float-right" type="submit"
                                                value="View">
                                        </form>
                                    </div>
                                    <div class="col-2">
                                        <form action="{{ url('modify' . '/' . $item->id) }}" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <input name="" id="" class="btn btn-sm btn-warning float-right" type="submit"
                                                value="Modify">
                                        </form>
                                    </div>
                                    <div class="col-2">
                                        <form action="{{ url('delete' . '/' . $item->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <input name="" id="" class="btn btn-sm btn-danger float-right" type="submit"
                                                value="Delete">
                                        </form>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <br>
                    <div>
                        {!! $done->appends(['not_done' => $not_done->currentPage()])->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
