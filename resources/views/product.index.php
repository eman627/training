@extends('layouts.app');
@section('content');
<div class="container w-50 m-auto">
    @if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
    <table class="table table-striped table-dark">
        <thead>
          <tr>
            <th scope="col">product_id</th>
            <th scope="col">product_name</th>
            <th scope="col">description</th>
            <th scope="col"> category </th>
            <th scope="col">price</th>
            <th scope="col">image</th>
          </tr>
        </thead>
        <tbody>
 @foreach ($all_products as $product)

    <tr>
        <th scope="row">{{$product->product_id}}</th>
        <td>{{$product->product_name}}</td>
        <td>{{$product->product_description}}</td>
        <td> {{ $product->category}}</td>
        <td> {{ $product->price}}</td>
        <td> <img src="public/image/{{ $product->product_image}}"/></td>
        {{-- @can('update',$user_phone)
        <td> <a href="{{route('userPhones.edit',$user_phone->id)}}">edit</a></td>
        @endcan --}}

        {{-- @can('delete',$user_phone)
             {!! Form::open(['route' => ['userPhones.destroy',$user_phone->id], 'method' => 'DELETE']) !!}

             <td><input type="submit" value="delete" class="btn btn-primary"/></td>

             {!! Form::close() !!}
        @endcan --}}
      </tr>

 @endforeach
</tbody>
</table>
</div>
@endsection;
