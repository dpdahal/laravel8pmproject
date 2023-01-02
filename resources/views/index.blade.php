@extends('master')

@section('content')
    <div class="col-md-12">
        @include('messages')
    </div>

    <div class="row">
        @foreach($categories as $category)
            <div class="col-md-12 mb-5">
                <h1>{{$category->category_name}}</h1>
                <table class="table">
                    <thead>
                    <tr>
                        <th>S.n</th>
                        <th>Brand Name</th>
                        <th>Color</th>
                        <th>Price</th>
                        <th>SH</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($category->products as $key=>$product)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$product->brand_name}}</td>
                            <td>{{$product->color}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->sh}}</td>
                            <td>
                                @if($product->image)
                                    <img src="{{url($product->image)}}" alt="" width="50">
                                @endif
                            </td>
                            <td>
                                <a href="{{route('edit',$product->id)}}" class="btn btn-success">Edit</a>
                                <a href="{{route('delete',$product->id)}}" class="btn btn-danger">Delete</a>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        @endforeach
    </div>

@endsection
