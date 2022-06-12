@extends('layout.app')

@section('content')
<div class="card">
    <div class="card-body">
    @if(session('error'))
        <div class="alert alert-warning" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <form action="{{route('os.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Os Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
</div>
@endsection
