@extends('layout.main')

@section('content')
    <div class="container">
        <div class="card">
            <h2 class="card-header">{{ __('messages.new-user-card-title') }}</h2>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form autocomplete="off" action="{{ route('user.save') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-6">
                            <div class="row mt-1">
                                <div class="form-group">
                                    <label class="form-label" for="company"><strong>{{ __('messages.company-label') }}</strong></label>
                                    <input class="form-control @error('company') is-invalid @enderror" id="company" type="text"
                                           value="{{ old('company') }}"
                                           name="company">
                                    @error('company')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="name"><strong>{{ __('messages.name-label') }}</strong></label>
                                    <input class="form-control @error('name') is-invalid @enderror" id="name" type="text"
                                           value="{{ old('name') }}"
                                           name="name">
                                    @error('name')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="email"><strong>{{ __('messages.email-label') }}</strong></label>
                                    <input class="form-control @error('email') is-invalid @enderror" id="email" type="email"
                                           value="{{ old('email') }}"
                                           name="email">
                                    @error('email')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>



                            <div class="row mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="phone"><strong>{{ __('messages.phone-number-label') }}</strong></label>
                                    <input class="form-control @error('phone') is-invalid @enderror" id="phone" type="number"
                                           value="{{ old('phone') }}"
                                           name="phone">
                                    @error('phone')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            @if (auth()->check())
                                @if (auth()->user()->isAdmin())
                                    <div class="row mt-3">
                                        <div class="form-group">
                                            <label class="form-label" for="accountType"><strong>{{ __('messages.account-type-label') }}</strong></label>
                                            <select class="form-select" id="accountType" name="accountType">
                                                <option selected value="user">{{ __('messages.user-label') }}</option>
                                                <option value="forwarder">{{ __('messages.forwarder-label') }}</option>
                                                <option value="admin">{{ __('messages.admin-label') }}</option>
                                            </select>
                                            @error('accountType')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                @elseif(auth()->user()->isForwarder())
                                    <div class="row mt-3">
                                        <div class="form-group">
                                            <label class="form-label" for="accountType"><strong>Account type</strong></label>
                                            <select class="form-select" id="accountType" name="accountType">
                                                <option selected value="user">User</option>
                                            </select>
                                            @error('accountType')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                @endif
                            @endif


                            <div class="row mt-3">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-dark">{{ __('messages.save-button') }}</button>
                                    <a href="{{ route('user.list') }}" class="btn btn-secondary">{{ __('messages.cancel-button') }}</a>
                                </div>
                            </div>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>















@endsection
