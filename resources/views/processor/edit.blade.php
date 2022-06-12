@extends('layout.app')

@section('content')
<div class="card">
    <div class="card-body">
    <form action="{{route('processor.update',$processor->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
    @method('PUT')
        <div class="mb-3">
            <label class="form-label">Processor Name</label>
            <input type="text" class="form-control" name="name" value="{{ $processor->name }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</div>
@endsection
