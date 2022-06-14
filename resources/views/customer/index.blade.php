@extends('customer.layout.app')

@section('content')
    <h1>Customer Home</h1>

    <div class="row">
        @foreach ($phones as $p)
            <div class="col-4 mb-3">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">
                        {{ $p->model_name }}
                    </h4>
                    <p class="card-text">{!! $p->model_number !!}</p>
                    <a href="{{ route('customer.see.more',$p->id) }}" class="btn btn-primary">See more</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
