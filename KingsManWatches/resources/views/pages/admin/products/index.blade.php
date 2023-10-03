@extends('layouts.admin')

@section('additionalCss')
    @include('partials.datatables-css')
@endsection

@section('contentHeader')
    <h1>Products</h1>
@endsection

@section('content')
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3">Add new product</a>
    @include('partials.messages')
    <div class="table-responsive">
        <table id="foodTable" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Brand</th>
                <th>Price</th>
                <th class="large-column">Created At</th>
                <th class="large-column">Updated At</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $key=>$product)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>
                        <div class="food-image">
                            <img class="img-fluid rounded-circle" src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}"/>
                        </div>
                    </td>
                    <td>{{ $product->brandName }}</td>
                    <td>${{ $product->price }}</td>
                    <td>{{ $product->created_at }}</td>
                    <td>{{ $product->updated_at ? : 'N/A' }}</td>
                    <td><a href="{{ route('admin.products.edit',["productID"=>$product->id])}}"><i class="fas fa-edit"></i></a></td>
                    <td>
                        <form action="{{ route('admin.products.delete', ["productID"=>$product->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-link"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$products->links()}}
    </div>
@endsection

@section('additionalScripts')
    <script>
        const table = "foodTable";
    </script>
    @include('partials.datatables-scripts')
@endsection
