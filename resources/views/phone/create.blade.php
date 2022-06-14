@extends('layout.app')

@section('content')
<div class="card">
    <div class="card-body">
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    @if(session('error'))
        <div class="alert alert-warning" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <form action="{{route('phone.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Model Name</label>
            <input type="text" class="form-control" name="model_name">
        </div>
        <div class="mb-3">
            <label class="form-label">Model Number</label>
            <input type="text" class="form-control" name="model_number">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" id="summernote"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Operation System</label>
            <select class="form-control" name="operation_system_id">
                <option value="">Choose OS</option>
                @foreach ($operation_systems as $os)
                    <option value="{{$os->id}}">{{$os->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Brand</label>
            <select class="form-control" name="brand_id">
                <option value="">Choose Brand</option>
                @foreach ($brands as $brand)
                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Color</label>
            <select class="form-control" name="color_id">
                <option value="">Choose Color</option>
                @foreach ($colors as $color)
                    <option value="{{$color->id}}">{{$color->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Processor</label>
            <select class="form-control" name="processor_id">
                <option value="">Choose Processor</option>
                @foreach ($processors as $processor)
                    <option value="{{$processor->id}}">{{$processor->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
@endsection
