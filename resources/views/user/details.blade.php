@extends('layout.main')

@section('content')
    <div class="container">
        <div class="card">
            <h2 class="card-header">USER DETAILS</h2>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="row">
                    <strong>Company: </strong>
                    <span>{{ $user->company }}</span>
                </div>
                <div class="row mt-2">
                    <strong>Name: </strong>
                    <span>{{ $user->name }}</span>
                </div>
                <div class="row mt-2">
                    <strong>Email: </strong>
                    <span>{{ $user->email }}</span>
                </div>
                <div class="row mt-2">
                    <strong>Phone number: </strong>
                    <span>{{ $user->phone_number }}</span>
                </div>
                <div class="row mt-2">
                    <strong>Account type: </strong>
                    @if($user->admin == 1)
                        <span>Admin</span>
                    @elseif($user->forwarder == 1)
                        <span>Forwarder</span>
                    @else
                        <span>User</span>
                    @endif
                </div>

                <div class="row mt-4">
                    <div class="col-1">
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-dark">EDIT</a>
                    </div>
                    <div class="col-1">
                        <a href="{{ route('user.list') }}" class="btn btn-secondary">CANCEL</a>
                    </div>
                </div>
            </div>

        </div>

    </div>


@endsection
