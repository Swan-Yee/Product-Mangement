@extends('layout.app')

@section('content')
<div class="card">
        <div class="card-header">
            <h3>Product Detail</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <label for="name" class="fw-bolder">Phone Model</label>
                    <p>{{ $phone->model_name }}</p>
                </div>
                <div class="col-md-6">
                    <label for="name" class="fw-bolder">Phone Versin</label>
                    <p>{{ $phone->model_number }}</p>
                </div>
                <div class="col-12">
                    <label for="" class="fw-bolder">description</label>
                    <p>
                        {!! $phone->description !!}
                    </p>
                </div>
                <div class="col-md-6">
                    <label for="" class="fw-bolder">Operation System</label>
                    <p>
                        {{ $phone->operation_system->name }}
                    </p>
                </div>
                <div class="col-md-6">
                    <label for="" class="fw-bolder">Processor</label>
                    <p>
                        {{ $phone->operation_system->name }}
                    </p>
                </div>
                <div class="col-md-6">
                    <label for="" class="fw-bolder">Color</label>
                    <p>
                        {{ $phone->color->name }}
                    </p>
                </div>
                <div class="col-md-6">
                    <label for="" class="fw-bolder">Brand</label>
                    <p>
                        {{ $phone->brand->name }}
                    </p>
                </div>
                <div class="col-12">
                    <a href="#" class="btn btn-primary">
                        Add To Carts
                    </a>
                </div>
            </div>
        </div>
</div>
@endsection
