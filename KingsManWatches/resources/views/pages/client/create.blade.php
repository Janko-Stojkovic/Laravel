@extends('layouts.client')
@section('videoWrapper')
    <div class="videoWrapper">
        <video autoplay="" loop="" muted="" class="custom-video" poster="images/videos/bg3.jpg">
            <source src="images/videos/bg3.jpg" type="video/mp4">
        </video>
    </div>
@endsection
@section('txtSec')
    <p class="text-secondary-white-color" data-aos="fade-up" data-aos-delay="100">
        Long-standing <strong class="custom-underline">Legacy</strong>
    </p>
@endsection
@section('content')
    <div class="container mt-4 min-vh-100 w-50">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>
            </div>
        @endif

        @if (session('success-msg'))
            <div class="alert alert-success">
                <p>{{session('success-msg')}}</p>
            </div>
        @endif

        <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}"/>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price" value="{{old('price')}}"/>
            </div>
            <div class="mb-3">
                <label for="brandName" class="form-label">Brand Name</label>
                <select id="brandId" class="form-control" name="brandId">
                    <option value="0">Choose...</option>
                    @foreach($brands as $b)
                        <option value="{{$b->id}}" @if(old('brandId') == $b->id) selected @endif>{{$b->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea type="text" class="form-control" id="description" name="description"
                          value="{{old('description')}}"></textarea>
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
        </form>
    </div>
@endsection
