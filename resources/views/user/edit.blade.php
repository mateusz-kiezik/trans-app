@extends('layout.main')

@section('content')
    <div class="card mt-3">
        <h5 class="card-header">EDIT USER</h5>
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('user.update') }}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="form-group" style="margin: 20px">
                    <label for="name">Name</label>
                    <input
                        type="text"
                        class="form-control @error('name') is-invalid @enderror"
                        id="name"
                        name="name"
                        value="{{ old('name', $user->name) }}"
                    />
                    @error('name')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>


                <div class="form-group" style="margin: 20px">
                    <label for="email">Email</label>
                    <input
                        type="email"
                        class="form-control @error('email') is-invalid @enderror"
                        id="email"
                        name="email"
                        value="{{ old('email', $user->email) }}"
                    >
                    @error('email')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group" style="margin: 20px">
                    <label for="phone">Phone number</label>
                    <input
                        type="text"
                        class="form-control @error('phone') is-invalid @enderror"
                        id="phone"
                        name="phone"
                        value="{{ old('phone', $user->phone_number) }}"
                    >
                    @error('phone')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group" style="margin: 20px">
                    <input hidden id="userId" name="userId" value="{{ $user->id }}">
                    <button type="submit" class="btn btn-dark">SAVE</button>
                    <a href="{{ route('user.list') }}" class="btn btn-secondary">CANCEL</a>
                </div>
            </form>


        </div>
    </div>

@endsection
