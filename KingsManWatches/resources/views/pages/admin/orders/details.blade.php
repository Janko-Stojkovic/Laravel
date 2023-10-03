@extends('layouts.admin')

@section('additionalCss')
    @include('partials.datatables-css')
@endsection

@section('contentHeader')
    <h1>Order details</h1>
@endsection

@section('content')
    @include('partials.messages')
    <div class="table-responsive">
        <table id="detailsTable" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Product</th>
                <th>Image</th>
                <th class="large-column">Price</th>
                <th>Amount</th>
                <th class="large-column">Created At</th>
            </tr>
            </thead>
            <tbody>
            @foreach($details as $key=>$d)

                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $d->name }}</td>
                    <td>
                        <div class="food-image">
                            <img class="img-fluid rounded-circle" src="{{ asset('images/' . $d->image) }}" alt="{{ $d->name }}"/>
                        </div>
                    </td>
                    <td>${{ $d->price }}</td>
                    <td>x{{ $d->quantity }}</td>
                    <td>{{ $d->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$details->links()}}
    </div>
@endsection

@section('additionalScripts')
    <script>
        const table = "detailsTable";
    </script>
    @include('partials.datatables-scripts')
@endsection
