
<html>
<head>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <h1> All Products </h1>
    <div class="container w-50 m-auto">
        @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif
        <table class="table table-striped table-dark ">
            <thead>
              <tr>
                <th scope="col">product_id</th>
                <th scope="col">product_name</th>
                <th scope="col">description</th>
                <th scope="col"> category </th>
                <th scope="col">price</th>
                <th >image</th>
              </tr>
            </thead>
            <tbody>
     @foreach ($all_products as $product)

        <tr>
            <th scope="row">{{$product->id}}</th>
            <td>{{$product->name}}</td>
            <td>{{$product->description}}</td>
            <td> {{ $product->category->category}}</td>
            <td> {{ $product->price}}</td>
            <td> <img style="width:20%" src="public/image/{{ $product->image}}"/></td>

          </tr>

     @endforeach
    </tbody>
    </table>
    </div>
</body>
</html>


