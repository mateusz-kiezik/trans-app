@extends('layout.main')

@section('content')
    <style>
        .pagination > li > a,
        .pagination > li > span {
            border: 1px solid grey;
            color: black;
        }

        .page-item.active .page-link {
            background-color: black;
            border-color: black;
        }
    </style>


    <div class="container">

        @if (session('status'))
            <div class="alert alert-success">
                {{ __('messages.freights-list-delete-alert') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header d-flex">

                <h2 class="me-auto p-2">{{ __('messages.freights-list-card-title') }}</h2>

                <div class="form-group p-2">
                    <label
                        class="form-label me-2"><strong>{{ __('messages.freights-list-sort-by-label') }}</strong></label>
                    <select class="" onchange="location = this.value;">
                        <option value="" style="display: none;">{{ __('messages.freights-list-sort-0') }}</option>
                        <option
                            value="?sortBy=loadingDateAsc" {{ (request('sortBy') == 'loadingDateAsc' ? 'selected=selected' : '') }}>{{ __('messages.freights-list-sort-1') }}</option>
                        <option
                            value="?sortBy=loadingDateDesc" {{ (request('sortBy') == 'loadingDateDesc' ? 'selected=selected' : '') }}>{{ __('messages.freights-list-sort-2') }}</option>
                        <option
                            value="??sortBy=unloadingDateAsc" {{ (request('sortBy') == 'unloadingDateAsc' ? 'selected=selected' : '') }}>{{ __('messages.freights-list-sort-3') }}</option>
                        <option
                            value="?sortBy=unloadingDateDesc" {{ (request('sortBy') == 'unloadingDateDesc' ? 'selected=selected' : '') }}>{{ __('messages.freights-list-sort-4') }}</option>
                    </select>
                </div>


            </div>
            {{--            <h2 class="card-header">FREIGHTS</h2>--}}
            <div class="card-body text-center">
                <div class="row">
                    <div class="col-3 border-end border-dark">
                        <strong>{{ __('messages.freights-list-loading-label') }}</strong>
                        <div class="row">
                            <div class="col-4">
                                <strong>{{ __('messages.freights-list-loading-date-label') }}</strong>
                            </div>
                            <div class="col-8">
                                <strong>{{ __('messages.freights-list-loading-place-label') }}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 border-end border-dark">
                        <strong>{{ __('messages.freights-list-unloading-label') }}</strong>
                        <div class="row">
                            <div class="col">
                                <strong>{{ __('messages.freights-list-unloading-date-label') }}</strong>
                            </div>
                            <div class="col">
                                <strong>{{ __('messages.freights-list-unloading-place-label') }}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 border-end border-dark">
                        <strong>{{ __('messages.freights-list-truck-label') }}</strong>
                    </div>
                    <div class="col-3 border-end border-dark">
                        <strong>{{ __('messages.freights-list-cargo-label') }}</strong>
                    </div>
                    <div class="col-1">
                        <strong>{{ __('messages.freights-list-actions-label') }}</strong>
                    </div>
                </div>
                <hr/>


                @foreach($freights ?? [] as $freight)
                    <div class="row">
                        <div class="col-3 border-end border-dark ">
                            <div class="row">
                                <div class="col-4">
                                    {{ $freight->start_date }}
                                </div>
                                <div class="col-8">
                                    {{ $freight->startAddress->country }}, {{ $freight->startAddress->city }}
                                </div>
                            </div>
                        </div>
                        <div class="col-3 border-end border-dark">
                            <div class="row">
                                <div class="col">
                                    {{ $freight->end_date }}
                                </div>
                                <div class="col">
                                    {{$freight->endAddress->country}}, {{ $freight->endAddress->city }}
                                </div>
                            </div>
                        </div>
                        <div class="col-2 border-end border-dark">
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
                        <div class="col-3 border-end border-dark">
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
                                    style="white-space: pre-wrap;">{{ __('messages.freights-list-description-label') }}{{ $freight->cargo->description }}</div>
                            @endif
                        </div>
                        <div class="col-1">
                            <div class="row mt-3">
                                <div class="col">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                         class="bi bi-credit-card-2-front-fill" viewBox="0 0 16 16">
                                        <a href="{{ route('freight.details', $freight->id) }}"
                                           style="text-decoration: none; color: black"
                                           data-toggle="tooltip" data-placement="top"
                                           title="{{ __('messages.freights-list-details-tooltip') }}">
                                            <path
                                                d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2.5 1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-2zm0 3a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z"/>
                                        </a>
                                    </svg>
                                </div>

                                @if (auth()->check())
                                    @if (auth()->user()->isForwarder())
                                        <div class="col">
                                            <form action="{{ route('freight.disable') }}" method="post"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <input hidden id="freightId" name="freightId"
                                                       value="{{ $freight->id }}">
                                                <a href='' onclick='this.parentNode.submit(); return false;'
                                                   style="text-decoration: none; color: black"
                                                   data-toggle="tooltip" data-placement="top"
                                                   title="{{ __('messages.freights-list-delete-tooltip') }}">

                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         fill="currentColor" class="bi bi-x-circle-fill"
                                                         viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                                    </svg>
                                                </a>
                                            </form>
                                        </div>
                                    @endif
                                @endif
                            </div>

                        </div>

                    </div>
                    <hr/>
                @endforeach
{{--                {{ $freights->links() }}--}}
                {{ $freights->appends(request()->query())->links() }}

            </div>
        </div>
    </div>
@endsection
