@extends('layout.app')

@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{route('processor.index')}}" class="btn btn-primary">
        Back
    </a>
</div>
<div class="card">
    <div class="card-body">
        <div class="mb-3">
            <label class="form-label fw-bold">Processor Name</label>
            <p>{{ $processor->name }}</p>
        </div>
    </div>
</div>
@endsection
