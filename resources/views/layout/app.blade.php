<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product | Category</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    @if($errors->any())
   @foreach ($errors->all() as $error)
                    <script>
                       alert('{{ $error }}')
                    </script>
    @endforeach
@endif

@if(session()->has('success'))
<script>
    alert("{{ session()->get('success') }}")
 </script>
@endif
    {{-- header --}}
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Product | Category</a>
        </div>
    </nav>
    {{-- content --}}
    <div class="container">
        <div class="row">
            <div class="col-2">
                <ul class="list-group">
                <li class="list-group-item">
                    <a href="{{route('product.index')}}">
                        Product
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="{{route('sub-category.index')}}">
                        Sub Category
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="{{route('category.index')}}">
                        Category
                    </a>
                </li>
                </ul>
            </div>
            <div class="col-10">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
