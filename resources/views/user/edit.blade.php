@extends('layout.main')

@section('content')
    <div class="container">
        <div class="card">
            <h2 class="card-header">{{ __('messages.edit-user-card-title') }}</h2>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                    <form autocomplete="off" action="{{ route('user.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="row mt-1">
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-label" for="company"><strong>{{ __('messages.company-label') }}</strong></label>
                                            <input class="form-control @error('company') is-invalid @enderror" id="company" type="text"
                                                   value="{{ old('company', $user->company) }}"
                                                   name="company">
                                            @error('company')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-label" for="name"><strong>{{ __('messages.name-label') }}</strong></label>
                                            <input class="form-control @error('name') is-invalid @enderror" id="name" type="text"
                                                   value="{{ old('name', $user->name) }}"
                                                   name="name">
                                            @error('name')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-label" for="email"><strong>{{ __('messages.email-label') }}</strong></label>
                                            <input class="form-control" id="email" type="text"
                                                   value="{{ $user->email }}"
                                                   name="name" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-label" for="phone"><strong>{{ __('messages.phone-number-label') }}</strong></label>
                                            <input class="form-control @error('phone') is-invalid @enderror" id="phone" type="tel"
                                                   value="{{ old('phone', $user->phone_number) }}"
                                                   name="phone">
                                            @error('phone')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="row mt-1">
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-label" for="password"><strong>{{ __('messages.new-password-label') }}</strong></label>
                                            <input class="form-control @error('password') is-invalid @enderror" id="password" type="password"
                                                   value=""
                                                   name="password">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-label" for="password_confirmation"><strong>{{ __('messages.confirm-new-password-label') }}</strong></label>
                                            <input class="form-control @error('password') is-invalid @enderror" id="password_confirmation" type="password"
                                                   value=""
                                                   name="password_confirmation">
                                            @error('password')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col">
                                        <div class="form-group">
                                            <input hidden id="userId" name="userId" value="{{$user->id}}">
                                            <button type="submit" class="btn btn-dark">{{ __('messages.update-button') }}</button>
                                            <a href="{{ route('user.list') }}" class="btn btn-secondary">{{ __('messages.cancel-button') }}</a>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>



                    </form>

            </div>
        </div>

    </div>


@endsection
