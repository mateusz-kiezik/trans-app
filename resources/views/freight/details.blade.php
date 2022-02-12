@extends('layout.main')

@section('content')
    <div class="container">

        @if (session('status'))
            <div class="alert alert-success">
                {{ __('messages.freight-details-freight-created-alert') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h2 class="">{{ __('messages.freight-details-card-title') }}{{ $freight->id }}</h2>
                    </div>
                    <div class="col-1">
                        <a class="btn btn-dark" href="{{ route('freight.list.active') }}">{{ __('messages.freight-details-back-button') }}</a>
                    </div>
                </div>
                <div class="row">
                    <i>{{ __('messages.freight-details-publication-date-label') }}{{ $freight->created_at }}</i>
                </div>

            </div>

            <div class="card-body">
                <div class="row text-center">
                    <div class="col">
                        <h5>{{ __('messages.freight-details-loading-label') }}</h5>
                    </div>
                    <div class="col">
                        <h5>{{ __('messages.freight-details-unloading-label') }}</h5>
                    </div>
                    <div class="col">
                        <h5>{{ __('messages.freight-details-truck-label') }}</h5>
                    </div>
                    <div class="col">
                        <h5>{{ __('messages.freight-details-cargo-label') }}</h5>
                    </div>
                    <div class="col">
                        <h5>{{ __('messages.freight-details-contact-label') }}</h5>
                    </div>
                    <hr/>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <span><strong>{{ __('messages.freight-details-loading-date-label') }}</strong> {{ $freight->start_date }}</span>
                        </div>
                        <div class="row">
                            <span><strong>{{ __('messages.freight-details-loading-time-label') }}</strong> {{ $freight->start_time_from }}</span>
                        </div>
                        <div class="row mt-3">
                            <span><strong>{{ __('messages.freight-details-loading-country-label') }}</strong> {{ $freight->startAddress->country }}</span>
                        </div>
                        @if($freight->startAddress->postcode != null)
                        <div class="row">
                            <span><strong>{{ __('messages.freight-details-loading-postcode-label') }}</strong> {{ $freight->startAddress->postcode }}</span>
                        </div>
                        @endif
                        <div class="row">
                            <span><strong>{{ __('messages.freight-details-loading-city-label') }}</strong> {{ $freight->startAddress->city }}</span>
                        </div>
                    </div>

                    <div class="col">
                        <div class="row">
                            <span><strong>{{ __('messages.freight-details-unloading-date-label') }}</strong> {{ $freight->end_date }}</span>
                        </div>
                        <div class="row">
                            <span><strong>{{ __('messages.freight-details-unloading-time-label') }}</strong> {{ $freight->end_time_from }}</span>
                        </div>
                        <div class="row mt-3">
                            <span><strong>{{ __('messages.freight-details-unloading-country-label') }}</strong> {{ $freight->endAddress->country }}</span>
                        </div>
                        @if($freight->endAddress->postcode != null)
                        <div class="row">
                            <span><strong>{{ __('messages.freight-details-unloading-postcode-label') }}</strong> {{ $freight->endAddress->postcode }}</span>
                        </div>
                        @endif
                        <div class="row">
                            <span><strong>{{ __('messages.freight-details-unloading-city-label') }}</strong> {{ $freight->endAddress->city }}</span>
                        </div>
                    </div>

                    <div class="col">
                        <div class="row">
                            <span><strong>{{ __('messages.freight-details-truck-size-label') }}</strong>
                            @if($freight->truckType->id == 1)
                                    {{ __('messages.new-freight-truck-1-radio') }}
                                @endif
                                @if($freight->truckType->id == 2)
                                    {{ __('messages.new-freight-truck-2-radio') }}
                                @endif
                                @if($freight->truckType->id == 3)
                                    {{ __('messages.new-freight-truck-3-radio') }}
                                @endif
                            </span>
                        </div>
                        <div class="row">
                            <span><strong>{{ __('messages.freight-details-truck-type-label') }}</strong>
                            @foreach($freight->truck_id ?? [] as $truck)
                                    @if($loop->index > 0)
                                        {{'|'}}
                                    @endif
                                        @if($truck['id'] == 1) {{ __('messages.type-standard') }} @endif
                                        @if($truck['id'] == 2) {{ __('messages.type-curtain') }} @endif
                                        @if($truck['id'] == 3) {{ __('messages.type-box') }} @endif
                                        @if($truck['id'] == 4) {{ __('messages.type-refrigerator') }} @endif
                                        @if($truck['id'] == 5) {{ __('messages.type-mega') }} @endif
                                        @if($truck['id'] == 6) {{ __('messages.type-container') }} @endif
                                @endforeach</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <span><strong>{{ __('messages.freight-details-quantity-label') }}</strong> {{ $freight->cargo->qty }} x
                            @if($freight->cargo->cargoType->id == 1) {{ __('messages.new-freight-cargo-type-1-select') }} @endif
                                @if($freight->cargo->cargoType->id == 2) {{ __('messages.new-freight-cargo-type-2-select') }} @endif
                                @if($freight->cargo->cargoType->id == 3) {{ __('messages.new-freight-cargo-type-3-select') }} @endif
                                @if($freight->cargo->cargoType->id == 4) {{ __('messages.new-freight-cargo-type-4-select') }} @endif
                                @if($freight->cargo->cargoType->id == 5) {{ __('messages.new-freight-cargo-type-5-select') }} @endif</span>
                        </div>
                        <div class="row">
                            <span><strong>{{ __('messages.freight-details-weight-label') }}</strong> {{ $freight->cargo->weight }} kg</span>
                        </div>
                        <div class="row">
                            <span><strong>{{ __('messages.freight-details-type-label') }}</strong> {{ $freight->freightType->name }}</span>
                        </div>
                        @if($freight->cargo->description != null)
                        <div class="row">
                            <strong>{{ __('messages.freight-details-description-label') }}</strong>
                            <span style="white-space: pre-wrap;">{{ $freight->cargo->description }}</span>
                        </div>
                        @endif
                    </div>
                    <div class="col">

                        @guest
                            <div class="row mt-5">
                                <strong><a href="{{ route('login') }}">{{ __('messages.freight-details-unauth-login-label') }}</a>{{ __('messages.freight-details-unauth-text-label') }}</strong>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                         class="bi bi-person-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                    </svg>
                                </div>
                                <div class="col">
                                    <span>{{ $freight->forwarder->name }}</span>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                         class="bi bi-telephone" viewBox="0 0 16 16">
                                        <path
                                            d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                    </svg>
                                </div>
                                <div class="col">
                                    <span>{{ $freight->forwarder->phone_number }}</span>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                         class="bi bi-envelope" viewBox="0 0 16 16">
                                        <path
                                            d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                    </svg>
                                </div>
                                <div class="col">
                                    <a href="{{ mailto($freight->forwarder->email)
                                            ->cc(["test@xyz.com"])
                                            ->subject("[RLTrans] Freight #".$freight->id)
                                            ->body("Hello,\n\nwhether the offer is still valid? \n\nBest regards,\n\n"
                                            .Auth::user()->getAttribute('name')."\ntel. ".Auth::user()->getAttribute('phone_number'))}}">
                                        {{ $freight->forwarder->email }}
                                    </a>
                                </div>
                            </div>
                        @endguest


                    </div>
                </div>


            </div>
        </div>
    </div>


@endsection
