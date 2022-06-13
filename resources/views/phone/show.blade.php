@extends('layout.app')

@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{route('phone.index')}}" class="btn btn-primary">
        Back
    </a>
</div>
<div class="card">
    <div class="card-body">
        <div class="mb-3">
            <label class="form-label fw-bold">Phone Name</label>
            <p>{{ $phone->model_name }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Model Name</label>
            <p>{{ $phone->model_number }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Description</label>
            <p>{{ $phone->description }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Operation System</label>
            <p>{{ $phone->operation_system_id }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Processor</label>
            <p>{{ $phone->processor->name }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Color</label>
            <p>{{ $phone->color->name }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Brand</label>
            <p>{{ $phone->brand->name }}</p>
        </div>
    </div>
</div>
@endsection
