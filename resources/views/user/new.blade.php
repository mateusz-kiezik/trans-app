@extends('layout.main')

@section('content')
    <div class="card mt-3">
        <h5 class="card-header">ADD USER</h5>
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

            <form action="{{ route('user.save') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="company">Company name</label>
                    <input
                        type="text"
                        class="form-control @error('company') is-invalid @enderror"
                        id="company"
                        name="company"
                        value="{{ old('company') }}"
                    />
                    @error('name')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group" style="margin: 20px">
                    <label for="name">Name</label>
                    <input
                        type="text"
                        class="form-control @error('name') is-invalid @enderror"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
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
                        value="{{ old('email') }}"
                    >
                    @error('email')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>



                <div class="form-group" style="margin: 20px">
                    <label for="password">Password</label>
                    <input
                        type="oassword"
                        class="form-control @error('password') is-invalid @enderror"
                        id="password"
                        name="password"
                        value=""
                    >
                    @error('password')
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
                        value="{{ old('phone') }}"
                    >
                    @error('phone')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group" style="margin: 20px">
                    <label for="accountType">Account type</label>
                    <select class="form-select" id="accountType" name="accountType">
                        <option selected value="user">User</option>
                        <option value="forwarder">Forwarder</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>

                <div class="form-group" style="margin: 20px">
                    <button type="submit" class="btn btn-dark">SAVE</button>
                    <a href="{{ route('user.list') }}" class="btn btn-secondary">CANCEL</a>
                </div>
            </form>


        </div>
    </div>

@endsection
