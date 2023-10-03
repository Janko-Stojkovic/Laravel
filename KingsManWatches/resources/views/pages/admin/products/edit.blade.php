@extends('layouts.admin')

@section('contentHeader')
    <h1>Edit product</h1>
@endsection

@section('content')
    <form class="standard-form" action="{{route('admin.products.update',["productID"=>$product->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PATCH")
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}"/>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" id="price" name="price" value="{{$product->price}}"/>
        </div>
        <div class="mb-3">
            <label for="brandName" class="form-label">Brand Name</label>
            <select id="brandId" class="form-control" name="brandId">
                <option value="0">Choose...</option>
                @foreach($brands as $b)
                    <option @if($b->id == $product->brandId) selected @endif value="{{$b->id}}" @if(old('brandId') == $b->id) selected @endif>{{$b->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea type="text" class="form-control" id="description" name="description"
                      value="{{$product->description}}">{{$product->description}}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" id="image" name="image"/>
        </div>
        <div class="mb-3">
            <label for="imageHover" class="form-label">imageHover</label>
            <input type="file" id="imageHover" name="imageHover"/>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
        @include('partials.messages')
    </form>
@endsection

@section('additionalScripts')
    <script src="{{ asset('assets/js/form-validation.min.js') }}"></script>
    <script>
        const edit = true;
    </script>
    <script src="{{ asset('assets/js/admin/products.min.js') }}"></script>
@endsection
