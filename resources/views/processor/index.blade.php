@extends('layout.app')

@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{route('processor.create')}}" class="btn btn-primary">
        Create
    </a>
</div>
<div class="card">
    <div class="card-body">
        <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
            @if($processors->count() > 0)
                @foreach ($processors as $processor)
                <tr>
                    <th scope="row">{{ $processor->id }}</th>
                    <td>{{ $processor->name }}</td>
                    <td>
                        <a href="{{ route('processor.show',$processor->id) }}" class="btn btn-sm btn-info">more info</a>
                        <a href="{{ route('processor.edit',$processor->id) }}" class="btn btn-sm btn-success">Edit</a>
                        <form action="{{ route('processor.destroy', $processor->id) }}" method="post" onsubmit="return confirm('Are U sure to Delete processor -> {{ $processor->name }}');"
                        class="d-inline" id="delete{{$processor->id}}">
                        @csrf
                        @method('delete')
                            <a href="#" class="btn btn-sm btn-danger" onclick="confirm('Delete?') ? document.getElementById('delete{{$processor->id}}').submit():false;">Delete</a>
                        </form>
                    </td>
                </tr>
                @endforeach
            @else
                <th>
                    No Data To Show
                </th>
            @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
