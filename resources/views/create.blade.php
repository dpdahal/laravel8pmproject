@extends('master')

@section('content')
    <div class="col-row">
        <div class="col-md-12">
            @include('messages')
        </div>
        <div class="col-md-12">
            <form action="{{route('store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="category_id">Select Category:
                        <a style="color: red;text-decoration: none;">
                            {{$errors->first('category_id')}}
                        </a>
                    </label>
                    <select name="category_id" class="form-control" id="category_id">
                        <option value="">---Select Category---</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}"
                                {{old('category_id') == $category->id ? 'selected' : ''}}
                            >{{$category->category_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="brand_name">brand name:
                        <a style="color: red;text-decoration: none;">
                            {{$errors->first('brand_name')}}
                        </a>
                    </label>
                    <input type="text" name="brand_name" class="form-control" id="brand_name"
                           value="{{old('brand_name')}}">
                </div>
                <div class="form-group mb-3">
                    <label for="color">color:
                        <a style="color: red;text-decoration: none;">
                            {{$errors->first('color')}}
                        </a>
                    </label>
                    <input type="text" name="color" class="form-control" id="color"
                           value="{{old('color')}}">
                </div>
                <div class="form-group mb-3">
                    <label for="price">price:
                        <a style="color: red;text-decoration: none;">
                            {{$errors->first('price')}}
                        </a>
                    </label>
                    <input type="number" name="price" class="form-control" id="price"
                           value="{{old('price')}}">
                </div>
                <div class="form-group mb-3">
                    <label for="sh">Serial Number / Heel Size:
                        <a style="color: red;text-decoration: none;">
                            {{$errors->first('sh')}}
                        </a>
                    </label>
                    <input type="number" name="sh" class="form-control" id="sh"
                           value="{{old('sh')}}">
                </div>
                <div class="form-group mb-3">
                    <label for="image">Image:
                        <a style="color: red;text-decoration: none;">
                            {{$errors->first('image')}}
                        </a>
                    </label>
                    <input type="file" name="image" class="form-control" id="image"
                           value="{{old('image')}}">
                </div>
                <div class="form-group mb-3">
                    <button class="btn btn-success">Add Product</button>
                </div>
            </form>
        </div>
    </div>

@endsection
