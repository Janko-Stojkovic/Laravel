@extends('layouts.admin')

@section('additionalCss')
    @include('partials.datatables-css')
@endsection

@section('contentHeader')
    <h1>Brands</h1>
@endsection

@section('content')
    <a href="{{ route('admin.brands.create') }}" class="btn btn-primary mb-3">Add new brand</a>
    @include('partials.messages')
    <div class="table-responsive">
        <table id="categoriesTable" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>Name</th>
                <th>Listed</th>
                <th class="large-column">Created At</th>
                <th class="large-column">Updated At</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($brands as $key=>$b)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $b->id }}</td>
                    <td>{{ $b->name }}</td>
                    <td>{{ $b->listed }}</td>
                    <td>{{ $b->created_at }}</td>
                    <td>{{ $b->updated_at ? : 'N/A' }}</td>
                    <td><a href="{{ route('admin.brands.edit', ["brandID"=>$b->id]) }}"><i class="fas fa-edit"></i></a></td>
                    <td>
                        <form action="{{ route('admin.brands.delete', ["brandID"=>$b->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-link"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$brands->links()}}
    </div>
@endsection

@section('additionalScripts')
    <script>
        const table = "categoriesTable";
    </script>
    @include('partials.datatables-scripts')
@endsection
