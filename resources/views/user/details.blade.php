@extends('layout.main')

@section('content')
    <div style="padding: 25px">
        <div style="margin: 15px">

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <div>
                <b>Id: </b>
                <span>{{ $user->id }}</span>
            </div>
            <div>
                <b>Name: </b>
                <span>{{ $user->name }}</span>
            </div>
        </div>
        <div style="margin: 15px">
            <div>
                <b>Email: </b>
                <span>{{ $user->email }}</span>
            </div>
            <div>
                <b>Phone number: </b>
                <span>{{ $user->phone_number }}</span>
            </div>
        </div>
        <div style="margin: 15px">
            <div>
                <b>Created at: </b>
                <span>{{ $user->created_at }}</span>
            </div>
            <div>
                <b>Updated at: </b>
                <span>{{ $user->updated_at }}</span>
            </div>
        </div>

        <div style="margin: 15px">
            <a class="btn btn-dark" href="{{ route('user.list') }}">BACK</a>
        </div>
    </div>

@endsection
