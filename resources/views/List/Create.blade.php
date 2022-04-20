@extends('MainPage')

@section('title')
    {{ $title = 'Add activity' }}
@endsection

@section('content')
    <form action="" method="post">
        @csrf
        <div class="row">
            @if (count($errors) > 0)
                <div class="col-12">
                    <div class="alert alert-danger text-center" role="alert">
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                            <br>
                        @endforeach
                    </div>
                </div>
            @endif
            @if (session('alert'))
                <div class="col-12">
                    {!! session('alert') !!}
                </div>
            @endif
            <div class="col-2"></div>
            <div class="col-8">
                <div class="card card-default">
                    <div class="card-header text-center text-white bg-success h3">
                        {{ $title }}
                    </div>
                    <div class="card-body row">
                        <div class="col-12 form-group">
                            <label for="">Subject <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="subject" id="" aria-describedby=""
                                placeholder="" value="{{ old('subject') }}">
                        </div>
                        <div class="col-12 form-group">
                            <label for="detail">Detail</label>
                            <textarea class="form-control" name="detail" id="detail" rows="3">{{ old('detail') }}</textarea>
                        </div>
                        <div class="col-6 form-group">
                            <label for="deadline">Deadline <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="deadline" id="deadline"
                                aria-describedby="helpId" placeholder="" value="{{ old('deadline') }}">
                        </div>
                        <div class="col-6 text-center form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="completed" id="completed" value="1"
                                    @if (old('completed') == 1) checked @endif>
                                Completed
                            </label>
                        </div>
                    </div>
                    <div class="card-body row text-center">
                        <div class="col-6 h4">
                            <a href="{{ url('/') }}" class="badge badge-warning">Back to Home Page</a>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary font-weight-bold">Add activity</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
    </form>
@endsection
