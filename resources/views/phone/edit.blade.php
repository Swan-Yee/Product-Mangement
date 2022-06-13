@extends('layout.app')

@section('content')
<div class="card">
    <div class="card-body">
    <form action="{{route('phone.update',$phone->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Model Name</label>
            <input type="text" class="form-control" name="model_name" value="{{$phone->model_name}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Model Number</label>
            <input type="text" class="form-control" name="model_number" value="{{$phone->model_number}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control">{{$phone->description}}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Operation System</label>
            <select class="form-control" name="operation_system_id">
                <option value="">Choose OS</option>
                @foreach ($operation_systems as $os)
                    <option value="{{$os->id}}" @if ($os->id == $phone->operation_system_id) selected @endif>{{$os->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Brand</label>
            <select class="form-control" name="brand_id">
                <option value="">Choose Brand</option>
                @foreach ($brands as $brand)
                    <option value="{{$brand->id}}" @if ($brand->id == $phone->brand_id) selected @endif>{{$brand->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Color</label>
            <select class="form-control" name="color_id">
                <option value="">Choose Color</option>
                @foreach ($colors as $color)
                    <option value="{{$color->id}}" @if ($color->id == $phone->color_id) selected @endif>{{$color->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Processor</label>
            <select class="form-control" name="processor_id">
                <option value="">Choose Processor</option>
                @foreach ($processors as $processor)
                    <option value="{{$processor->id}}" @if ($processor->id == $phone->processor_id) selected @endif>{{$processor->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</div>
@endsection
