@extends('layout.main')

@section('content')
    <div class="card mt-3">
        <div class="card">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Users</div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr align="center" valign="middle">
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone number</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th colspan="3">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users ?? [] as $user)
                            <tr align="center" valign="middle">
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone_number }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{ $user->updated_at }}</td>
                                <td>

                                    <a class="btn btn-dark"
                                       href="{{ route('user.details', $user->id) }}">DETAILS</a>
                                </td>
                                <td>
{{--                                    <form action="{{ route('user.edit') }}" method="post" enctype="multipart/form-data">--}}
{{--                                        @csrf--}}
{{--                                       <input hidden id="userId" name="userId" value="{{$user->id}}">--}}
{{--                                        <button type="submit" class="btn btn-dark">EDIT</button>--}}
{{--                                    </form>--}}




                                    <a class="btn btn-dark"
                                       href="{{ route('user.edit', $user->id) }}">EDIT</a>


                                </td>


                                <td>DELETE</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
{{--                {{ $users->links() }}--}}
            </div>
        </div>
    </div>


@endsection
