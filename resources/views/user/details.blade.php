@extends('layout.main')

@section('content')
    <div class="container">
        <div class="card">
            <h2 class="card-header">{{ __('messages.user-details-card-title') }}</h2>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ __('messages.profile-updated-alert') }}
                    </div>
                @endif
                <div class="row">
                    <strong>{{ __('messages.user-details-company-label') }}</strong>
                    <span>{{ $user->company }}</span>
                </div>
                <div class="row mt-2">
                    <strong>{{ __('messages.user-details-name-label') }}</strong>
                    <span>{{ $user->name }}</span>
                </div>
                <div class="row mt-2">
                    <strong>{{ __('messages.user-details-email-label') }}</strong>
                    <span>{{ $user->email }}</span>
                </div>
                <div class="row mt-2">
                    <strong>{{ __('messages.user-details-phone-number-label') }}</strong>
                    <span>{{ $user->phone_number }}</span>
                </div>
                <div class="row mt-2">
                    <strong>{{ __('messages.user-details-account-type-label') }}</strong>
                    @if($user->admin == 1)
                        <span>{{ __('messages.user-label') }}</span>
                    @elseif($user->forwarder == 1)
                        <span>{{ __('messages.forwarder-label') }}</span>
                    @else
                        <span>{{ __('messages.admin-label') }}</span>
                    @endif
                </div>

                <div class="row mt-4">
                    <div class="col-1">
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-dark">{{ __('messages.edit-button') }}</a>
                    </div>
                    <div class="col-1">
                        <a href="{{ route('user.list') }}" class="btn btn-secondary">{{ __('messages.cancel-button') }}</a>
                    </div>
                </div>
            </div>

        </div>

    </div>


@endsection
