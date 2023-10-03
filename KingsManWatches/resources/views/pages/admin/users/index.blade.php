@extends('layouts.admin')

@section('additionalCss')
    @include('partials.datatables-css')
@endsection

@section('contentHeader')
    <h1>Users</h1>
@endsection

@section('content')
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-3">Add new user</a>
    @include('partials.messages')
    <div class="table-responsive">
        <table id="usersTable" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th class="large-column">Created At</th>
                <th class="large-column">Updated At</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $key=>$u)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $u->username }}</td>
                    <td>{{ $u->email }}</td>
                    <td>{{ $u->role_name }}</td>
                    <td>{{ $u->created_at }}</td>
                    <td>{{ $u->updated_at ? : 'N/A' }}</td>
                    <td><a href="{{ route('admin.users.edit',["userID"=>$u->id]) }}"><i class="fas fa-edit"></i></a></td>
                    <td>
                        <form action="{{ route('admin.users.delete', ["userID"=>$u->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-link"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$users->links()}}
    </div>
@endsection

@section('additionalScripts')
    <script>
        const table = "usersTable";
    </script>
    @include('partials.datatables-scripts')
@endsection
