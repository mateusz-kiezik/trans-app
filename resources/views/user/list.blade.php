@extends('layout.main')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <h2 class="card-header">USERS</h2>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col">
                        <strong>Company</strong>
                    </div>
                    <div class="col">
                        <strong>Name</strong>
                    </div>
                    <div class="col">
                        <strong>Email</strong>
                    </div>
                    <div class="col">
                        <strong>Phone number</strong>
                    </div>
                    <div class="col">
                        <strong>Account type</strong>
                    </div>
                    <div class="col">
                        <strong>Actions</strong>
                    </div>
                </div>
                <hr/>

                @foreach($users ?? [] as $user)
                    <div class="row">
                        <div class="col">
                            {{ $user->company }}
                        </div>
                        <div class="col">
                            {{ $user->name }}
                        </div>
                        <div class="col">
                            {{ $user->email }}
                        </div>
                        <div class="col">
                            {{ $user->phone_number }}
                        </div>
                        <div class="col">
                            @if($user->admin == 1)
                                Admin
                            @elseif($user->forwarder == 1)
                                Forwarder
                            @else
                                User
                            @endif
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                         class="bi bi-credit-card-2-front-fill" viewBox="0 0 16 16">
                                        <a href="{{ route('user.details', $user->id) }}"
                                           style="text-decoration: none; color: black"
                                           data-toggle="tooltip" data-placement="top" title="Details">
                                            <path
                                                d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2.5 1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-2zm0 3a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z"/>
                                        </a>
                                    </svg>
                                </div>
                                <div class="col">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                         class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <a href="{{ route('user.edit', $user->id) }}"
                                           style="text-decoration: none; color: black"
                                           data-toggle="tooltip" data-placement="top" title="Edit">
                                            <path
                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd"
                                                  d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </a>
                                    </svg>
                                </div>
                                <div class="col">
                                    <form action="{{ route('user.disable') }}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <input hidden id="userId" name="userId" value="{{$user->id}}">
                                        <a href='' onclick='this.parentNode.submit(); return false;'
                                           style="text-decoration: none; color: black"
                                           data-toggle="tooltip" data-placement="top" title="Delete">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                            </svg>
                                        </a>
                                    </form>
                                </div>
                            </div>


                        </div>

                    </div>
                    <hr/>
                @endforeach

            </div>

        </div>

    </div>








@endsection
