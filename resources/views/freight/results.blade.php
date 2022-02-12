@extends('layout.main')

@section('content')
    <style>
        .hide {
            display: none;
        }

        .show {
            display: block;
        }
    </style>

    <div class="container">

        @if (!empty('status'))
            <div class="alert alert-success">
                {{ __('messages.freight-find-results-alert', ['numeric' => $count]) }}
            </div>
        @endif

        <div class="card">
            <h2 class="card-header">{{ __('messages.freight-find-cart-title') }}</h2>
            <div class="card-body text-center">


                <form autocomplete="off" action="{{ route('freight.find.results') }}" method="post"
                      enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-3">

                            <div class="row">
                                <label
                                    class="form-label"><strong>{{ __('messages.freight-find-loading-date-label') }}</strong></label>
                            </div>

                            <div class="row align-items-center">
                                <div class="col-3">
                                    <h6>{{ __('messages.freight-find-loading-from-label') }}</h6>
                                </div>

                                <div class="col">
                                    <div class="input-group date" id="datepicker1" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input ms-3"
                                               data-target="#datepicker1"
                                               name="loadingDateFrom"
                                               value="{{ $findValues->loadingDateFrom }}"
                                               data-toggle="datetimepicker"/>
                                        <div class="input-group-append" data-target="#datepicker1"
                                             data-toggle="datetimepicker">
                                            <div class="input-group-text">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     fill="currentColor" class="bi bi-calendar3"
                                                     viewBox="0 0 16 16">
                                                    <path
                                                        d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/>
                                                    <path
                                                        d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3 align-items-center">
                                <div class="col-3">
                                    <h6>{{ __('messages.freight-find-loading-to-label') }}</h6>
                                </div>

                                <div class="col">
                                    <div class="input-group date align-items-center" id="datepicker2"
                                         data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input ms-3
                                                    @error('loadingDateTo') is-invalid @enderror"
                                               data-target="#datepicker2"
                                               name="loadingDateTo"
                                               value="{{ $findValues->loadingDateTo }}"
                                               data-toggle="datetimepicker"/>
                                        <div class="input-group-append" data-target="#datepicker2"
                                             data-toggle="datetimepicker">
                                            <div class="input-group-text">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     fill="currentColor" class="bi bi-calendar3"
                                                     viewBox="0 0 16 16">
                                                    <path
                                                        d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/>
                                                    <path
                                                        d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-3 ms-5">
                            <div class="row">
                                <label
                                    class="form-label"><strong>{{ __('messages.freight-find-unloading-date-label') }}</strong></label>
                            </div>

                            <div class="row align-items-center">
                                <div class="col-3">
                                    <h6>{{ __('messages.freight-find-unloading-from-label') }}</h6>
                                </div>

                                <div class="col">
                                    <div class="input-group date align-items-center" id="datepicker3"
                                         data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input ms-3
                                                    @error('unloadingDateFrom') is-invalid @enderror"
                                               data-target="#datepicker3"
                                               name="unloadingDateFrom"
                                               value="{{ $findValues->unloadingDateFrom }}"
                                               data-toggle="datetimepicker"/>
                                        <div class="input-group-append" data-target="#datepicker3"
                                             data-toggle="datetimepicker">
                                            <div class="input-group-text">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     fill="currentColor" class="bi bi-calendar3"
                                                     viewBox="0 0 16 16">
                                                    <path
                                                        d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/>
                                                    <path
                                                        d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3 align-items-center">
                                <div class="col-3">
                                    <h6>{{ __('messages.freight-find-unloading-to-label') }}</h6>
                                </div>

                                <div class="col">
                                    <div class="input-group date align-items-center" id="datepicker4"
                                         data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input ms-3
                                                    @error('unloadingDateTo') is-invalid @enderror"
                                               data-target="#datepicker4"
                                               name="unloadingDateTo"
                                               value="{{ $findValues->unloadingDateTo }}"
                                               data-toggle="datetimepicker"/>
                                        <div class="input-group-append" data-target="#datepicker4"
                                             data-toggle="datetimepicker">
                                            <div class="input-group-text">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     fill="currentColor" class="bi bi-calendar3"
                                                     viewBox="0 0 16 16">
                                                    <path
                                                        d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/>
                                                    <path
                                                        d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>


                        <div class="col-5 mt-4">


                            <div class="row justify-content-end">
                                <input class="btn btn-dark" type="submit"
                                       value="{{ __('messages.freight-find-find-button') }}" style="width:30%;">
                            </div>
                            <div class="row mt-3 justify-content-end">
                                {{--                                <input id="filterButton" class="btn btn-light" value="Show filters" style="width:30%; text-decoration:none;" onclick="showFilters();">--}}
                                <button id="filterButton" type="button" class="btn btn-light" style="width:30%;"
                                        onclick="showFilters();">{{ __('messages.freight-find-more-filters-button') }}
                                </button>
                            </div>
                        </div>
                    </div>

                    <div id="filters" class="hide">
                        <hr/>
                        <div class="row">
                            <div class="col-3">
                                <label
                                    class="form-label"><strong>{{ __('messages.freight-find-truck-type-label') }}</strong></label>
                                <div class="input-group">
                                    <input
                                        @if($findValues->truckType != null) @if(in_array(1, $findValues->truckType)) checked
                                        @endif @endif class="form-check me-2" type="checkbox" name="truckType[]"
                                        value="1">
                                    <label
                                        class="form-check-label">{{ __('messages.freight-find-bus-check-label') }}</label>

                                    <input
                                        @if($findValues->truckType != null) @if(in_array(2, $findValues->truckType)) checked
                                        @endif @endif class="form-check ms-3 me-2" type="checkbox" name="truckType[]"
                                        value="2">
                                    <label
                                        class="form-check-label">{{ __('messages.freight-find-solo-check-label') }}</label>

                                    <input
                                        @if($findValues->truckType != null) @if(in_array(3, $findValues->truckType)) checked
                                        @endif @endif class="form-check ms-3 me-2" type="checkbox" name="truckType[]"
                                        value="3">
                                    <label
                                        class="form-check-label">{{ __('messages.freight-find-trailer-check-label') }}</label>
                                </div>
                            </div>

                            <div class="col-2">
                                <label
                                    class="form-label"><strong>{{ __('messages.freight-find-weight-label') }}</strong></label>
                                <input class="form-control" type="number" name="weight"
                                       value="{{ $findValues->weight }}">
                            </div>

                            <div class="col-3 ms-4">
                                <div class="row">
                                    <label
                                        class="form-label"><strong>{{ __('messages.freight-find-loading-address-label') }}</strong></label>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-4">
                                        <h6>{{ __('messages.freight-find-loading-city-label') }}</h6>
                                    </div>
                                    <div class="col">
                                        <input class="form-control" type="text" name="loadingCity"
                                               value="{{ $findValues->loadingCity }}">
                                    </div>
                                </div>
                                <div class="row align-items-center mt-3">
                                    <div class="col-4">
                                        <h6 class="me-2">{{ __('messages.freight-find-loading-country-label') }}</h6>
                                    </div>
                                    <div class="col">
                                        {{--                                        <input class="form-control" type="text" name="loadingCountry">--}}

                                        <select class="form-select"
                                                name="loadingCountry">
                                            <option
                                                value="%">{{ __('messages.freight-find-loading-country-select-all') }}</option>
                                            @foreach($loadingCountries ?? [] as $country)
                                                <option @if($findValues->loadingCountry == $country) selected
                                                        @endif value="{{ $country }}">{{ $country }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="col-3 ms-4">
                                <div class="row">
                                    <label
                                        class="form-label"><strong>{{ __('messages.freight-find-unloading-address-label' ) }}</strong></label>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-4">
                                        <h6 class="me-2">{{ __('messages.freight-find-unloading-city-label') }}</h6>
                                    </div>
                                    <div class="col">
                                        <input class="form-control" type="text" name="unloadingCity"
                                               value="{{ $findValues->unloadingCity }}">
                                    </div>
                                </div>
                                <div class="row align-items-center mt-3">
                                    <div class="col-4">
                                        <h6 class="me-2">{{ __('messages.freight-find-unloading-country-label') }}</h6>
                                    </div>
                                    <div class="col">
                                        {{--                                        <input class="form-control" type="text" name="unloadingCountry">--}}


                                        <select class="form-select"
                                                name="unloadingCountry">
                                            <option
                                                value="%">{{ __('messages.freight-find-unloading-country-select-all') }}</option>
                                            @foreach($unloadingCountries ?? [] as $country)
                                                <option @if($findValues->unloadingCountry == $country) selected
                                                        @endif value="{{ $country }}">{{ $country }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>


                <hr/>
                <div class="row">
                    <div class="col-2 border-end border-dark">
                        <strong>{{ __('messages.freight-find-loading-label') }}</strong>
                        <div class="row">
                            <div class="col">
                                <strong>{{ __('messages.freight-find-load-date-label') }}</strong>
                            </div>
                            <div class="col">
                                <strong>{{ __('messages.freight-find-load-place-label') }}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 border-end border-dark">
                        <strong>{{ __('messages.freight-find-unloading-label') }}</strong>
                        <div class="row">
                            <div class="col">
                                <strong>{{ __('messages.freight-find-unload-date-label') }}</strong>
                            </div>
                            <div class="col">
                                <strong>{{ __('messages.freight-find-unload-place-label') }}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 border-end border-dark">
                        <strong>{{ __('messages.freight-find-truck-label') }}</strong>
                    </div>
                    <div class="col-4 border-end border-dark">
                        <strong>{{ __('messages.freight-find-cargo-label') }}</strong>
                    </div>
                    <div class="col-1">
                        <strong>{{ __('messages.freight-find-actions-label') }}</strong>
                    </div>
                </div>
                <hr/>


                @foreach($freights ?? [] as $freight)
                    <div class="row">
                        <div class="col-2 border-end border-dark">
                            <div class="row">
                                <div class="col">
                                    {{ $freight->start_date }}
                                </div>
                                <div class="col">
                                    {{ $freight->startAddress->country }}, {{ $freight->startAddress->city }}
                                </div>
                            </div>
                        </div>
                        <div class="col-2 border-end border-dark">
                            <div class="row">
                                <div class="col">
                                    {{ $freight->end_date }}
                                </div>
                                <div class="col">
                                    {{$freight->endAddress->country}}, {{ $freight->endAddress->city }}
                                </div>
                            </div>
                        </div>
                        <div class="col-3 border-end border-dark">
                            @if($freight->truckType->id == 1)
                                <div>{{ __('messages.new-freight-truck-1-radio') }}</div>
                            @endif
                            @if($freight->truckType->id == 2)
                                <div>{{ __('messages.new-freight-truck-2-radio') }}</div>
                            @endif
                            @if($freight->truckType->id == 3)
                                <div>{{ __('messages.new-freight-truck-3-radio') }}</div>
                            @endif
                            <div>
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
                                @endforeach
                            </div>
                            {{ $freight->freightType->name }}
                        </div>
                        <div class="col-4 border-end border-dark">
                            <div>
                                @if($freight->cargo->cargoType->id == 1) {{ __('messages.new-freight-cargo-type-1-select') }} @endif
                                @if($freight->cargo->cargoType->id == 2) {{ __('messages.new-freight-cargo-type-2-select') }} @endif
                                @if($freight->cargo->cargoType->id == 3) {{ __('messages.new-freight-cargo-type-3-select') }} @endif
                                @if($freight->cargo->cargoType->id == 4) {{ __('messages.new-freight-cargo-type-4-select') }} @endif
                                @if($freight->cargo->cargoType->id == 5) {{ __('messages.new-freight-cargo-type-5-select') }} @endif
                                x {{ $freight->cargo->qty }}
                                / {{ $freight->cargo->weight }} kg
                            </div>
                            @if($freight->cargo->description != null)
                                <div
                                    style="white-space: pre-wrap;">{{ __('messages.freight-find-description-label') }}{{ $freight->cargo->description }}</div>
                            @endif
                        </div>
                        <div class="col-1">
                            <div class="row mt-3">
                                <div class="col">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                         class="bi bi-credit-card-2-front-fill" viewBox="0 0 16 16">

                                        <a href="{{ route('freight.details', $freight->id) }}"
                                           style="text-decoration: none; color: black;"
                                           data-toggle="tooltip" data-placement="bottom"
                                           title="{{ __('messages.freight-find-details-tooltip') }}">
                                            <path
                                                d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2.5 1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-2zm0 3a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z"/>
                                        </a>
                                    </svg>

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
