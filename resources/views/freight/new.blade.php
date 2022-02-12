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
    <style>
        .autocomplete-container {
            /*the container must be positioned relative:*/
            position: relative;
        }

        .autocomplete-container input {
            width: calc(100% - 43px);
            height: 2.4em;
            outline: none;

            border: 1px solid rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            padding: 10px;
            padding-right: 31px;
            font-size: 16px;
        }

        .autocomplete-items {
            position: absolute;
            border: 1px solid rgba(0, 0, 0, 0.1);
            box-shadow: 0px 2px 10px 2px rgba(0, 0, 0, 0.1);
            border-top: none;
            background-color: #fff;

            z-index: 99;
            top: calc(100% + 2px);
            left: 0;
            right: 0;
        }

        .autocomplete-items div {
            padding: 10px;
            cursor: pointer;
        }

        .autocomplete-items div:hover {
            /*when hovering an item:*/
            background-color: rgba(0, 0, 0, 0.1);
        }
    </style>


    <div class="container">
        <div class="card">
            <h2 class="card-header">{{ __('messages.new-freight-title') }}</h2>
            <div class="card-body">
                <form autocomplete="off" action="{{ route('freight.save') }}" method="post"
                      enctype="multipart/form-data">
                    <button type=submit onclick="return false;" style="display:none;"></button>
                    @csrf

                    <div class="row">
                        <div class="row">
                            <h4>{{ __('messages.new-freight-loading-label') }}</h4>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <label class="form-label" for="datepicker1"><strong>{{ __('messages.new-freight-loading-date-label') }}</strong></label>
                                <div class="input-group date" id="datepicker1" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"
                                           data-target="#datepicker1"
                                           name="loadingDate"
                                           value="{{ old('loadingDate') }}"
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
                                    @error('loadingDate')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-2">
                                <label class="form-label" for="timepicker1"><strong>{{ __('messages.new-freight-loading-time-label') }}</strong></label>
                                <div class="input-group date" id="timepicker1" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"
                                           data-target="#timepicker1"
                                           name="loadingTime"
                                           value="{{ old('loadingTime') }}"
                                           data-toggle="datetimepicker"/>
                                    <div class="input-group-append" data-target="#timepicker1"
                                         data-toggle="datetimepicker">
                                        <div class="input-group-text">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 fill="currentColor" class="bi bi-stopwatch"
                                                 viewBox="0 0 16 16">
                                                <path
                                                    d="M8.5 5.6a.5.5 0 1 0-1 0v2.9h-3a.5.5 0 0 0 0 1H8a.5.5 0 0 0 .5-.5V5.6z"/>
                                                <path
                                                    d="M6.5 1A.5.5 0 0 1 7 .5h2a.5.5 0 0 1 0 1v.57c1.36.196 2.594.78 3.584 1.64a.715.715 0 0 1 .012-.013l.354-.354-.354-.353a.5.5 0 0 1 .707-.708l1.414 1.415a.5.5 0 1 1-.707.707l-.353-.354-.354.354a.512.512 0 0 1-.013.012A7 7 0 1 1 7 2.071V1.5a.5.5 0 0 1-.5-.5zM8 3a6 6 0 1 0 .001 12A6 6 0 0 0 8 3z"/>
                                            </svg>
                                        </div>
                                    </div>
                                    @error('loadingTime')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <label class="form-label" for="loading-address"><strong>{{ __('messages.new-freight-loading-address-label') }}</strong></label>
                                <div class="autocomplete-container" id="autocomplete-container-loading"></div>
                                <input hidden id="loading-country" name="loadingCountry" value="{{ old('loadingCountry') }}">
                                <input hidden id="loading-city" name="loadingCity" value="{{ old('loadingCity') }}">
                                <input hidden id="loading-postcode" name="loadingPostcode" value="{{ old('loadingPostcode') }}">
                                <input hidden id="loading-lat" name="loadingLat" value="{{ old('loadingLat') }}">
                                <input hidden id="loading-lon" name="loadingLon" value="{{ old('loadingLon') }}">
                                @error('loadingAddress')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                @error('loadingCity')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                @error('loadingCountry')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>


                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="row">
                            <h4>{{ __('messages.new-freight-unloading-label') }}</h4>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <label class="form-label" for="datepicker2"><strong>{{ __('messages.new-freight-unloading-date-label') }}</strong></label>
                                <div class="input-group date" id="datepicker2" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"
                                           data-target="#datepicker2"
                                           name="unloadingDate"
                                           value="{{ old('unloadingDate') }}"
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
                                    @error('unloadingDate')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-2">
                                <label class="form-label" for="timepicker2"><strong>{{ __('messages.new-freight-unloading-time-label') }}</strong></label>
                                <div class="input-group date" id="timepicker2" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"
                                           data-target="#timepicker2"
                                           name="unloadingTime"
                                           value="{{ old('unloadingTime') }}"
                                           data-toggle="datetimepicker"/>
                                    <div class="input-group-append" data-target="#timepicker2"
                                         data-toggle="datetimepicker">
                                        <div class="input-group-text">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 fill="currentColor" class="bi bi-stopwatch"
                                                 viewBox="0 0 16 16">
                                                <path
                                                    d="M8.5 5.6a.5.5 0 1 0-1 0v2.9h-3a.5.5 0 0 0 0 1H8a.5.5 0 0 0 .5-.5V5.6z"/>
                                                <path
                                                    d="M6.5 1A.5.5 0 0 1 7 .5h2a.5.5 0 0 1 0 1v.57c1.36.196 2.594.78 3.584 1.64a.715.715 0 0 1 .012-.013l.354-.354-.354-.353a.5.5 0 0 1 .707-.708l1.414 1.415a.5.5 0 1 1-.707.707l-.353-.354-.354.354a.512.512 0 0 1-.013.012A7 7 0 1 1 7 2.071V1.5a.5.5 0 0 1-.5-.5zM8 3a6 6 0 1 0 .001 12A6 6 0 0 0 8 3z"/>
                                            </svg>
                                        </div>
                                    </div>
                                    @error('unloadingTime')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <label class="form-label" for="unloading-address"><strong>{{ __('messages.new-freight-unloading-address-label') }}</strong></label>
                                <div class="autocomplete-container" id="autocomplete-container-unloading"></div>
                                <input hidden id="unloading-country" name="unloadingCountry" value="{{ old('unloadingCountry') }}">
                                <input hidden id="unloading-city" name="unloadingCity" value="{{ old('unloadingCity') }}">
                                <input hidden id="unloading-postcode" name="unloadingPostcode" value="{{ old('unloadingPostocode') }}">
                                <input hidden id="unloading-lat" name="unloadingLat" value="{{ old('unloadingLat') }}">
                                <input hidden id="unloading-lon" name="unloadingLon" value="{{ old('unloadingLon') }}">
                                @error('unloadingAddress')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                @error('unloadingCity')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                @error('unloadingCountry')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror

                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <div class="row">
                                <h4>{{ __('messages.new-freight-truck-label') }}</h4>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="form-label" for="truck-size"><strong>{{ __('messages.new-freight-truck-size-label') }}</strong></label>
                                </div>
                                <div class="col">
                                    <input class="form-check-input"
                                           type="radio" value="1"
                                           name="truckSize"
                                           id="truckSize1" onclick="onLoad();"
                                           @if(old('truckSize') == 1) checked @endif>
                                    <label class="form-check-label" for="truckSize1">{{ __('messages.new-freight-truck-1-radio') }}</label>
                                </div>
                                <div class="col">
                                    <input class="form-check-input"
                                           type="radio" value="2" name="truckSize"
                                           id="truckSize2" onclick="onLoad2();"
                                           @if(old('truckSize') == 2) checked @endif>
                                    <label class="form-check-label" for="truckSize2">{{ __('messages.new-freight-truck-2-radio') }}</label>
                                </div>
                                <div class="col">
                                    <input class="form-check-input"
                                           type="radio" value="3" name="truckSize"
                                           id="truckSize3" onclick="onLoad3();"
                                           @if(old('truckSize') == 3) checked @endif>
                                    <label class="form-check-label" for="truckSize3">{{ __('messages.new-freight-truck-3-radio') }}</label>
                                </div>
                                @error('truckSize')
                                <div class="invalid-feedback d-block d-flex justify-content-center">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <label class="form-label"><strong>{{ __('messages.new-freight-truck-type-label') }}</strong></label>
                                </div>
                                <div class="col-9">
                                    <div id="group1" class="@if(old('truckSize') == 1) show @else hide @endif">
                                        <select class="form-select"
                                                multiple="multiple" name="truckType[]"
                                                size="6">
                                            <option value="1"
                                                    @if(collect(old('truckType'))->contains(1)) selected @endif>
                                                {{ __('messages.type-standard') }}
                                            </option>
                                            <option value="2"
                                                    @if(collect(old('truckType'))->contains(2)) selected @endif>
                                                {{ __('messages.type-curtain') }}
                                            </option>
                                            <option value="3"
                                                    @if(collect(old('truckType'))->contains(3)) selected @endif>
                                                {{ __('messages.type-box') }}
                                            </option>
                                            <option value="4"
                                                    @if(collect(old('truckType'))->contains(4)) selected @endif>
                                                {{ __('messages.type-refrigerator') }}
                                            </option>
                                        </select>
                                    </div>
                                    <div id="group2" class="@if(old('truckSize') == 2) show @else hide @endif">
                                        <select class="form-select"
                                                multiple="multiple" name="truckType[]"
                                                size="6">
                                            <option value="1"
                                                    @if(collect(old('truckType'))->contains(1)) selected @endif>
                                                {{ __('messages.type-standard') }}
                                            </option>
                                            <option value="2"
                                                    @if(collect(old('truckType'))->contains(2)) selected @endif>
                                                {{ __('messages.type-curtain') }}
                                            </option>
                                            <option value="3"
                                                    @if(collect(old('truckType'))->contains(3)) selected @endif>
                                                {{ __('messages.type-box') }}
                                            </option>
                                            <option value="4"
                                                    @if(collect(old('truckType'))->contains(4)) selected @endif>
                                                {{ __('messages.type-refrigerator') }}
                                            </option>
                                        </select>
                                    </div>
                                    <div id="group3" class="@if(old('truckSize') == 3) show @else hide @endif">
                                        <select class="form-select"
                                                multiple="multiple" name="truckType[]"
                                                size="6">
                                            <option value="1"
                                                    @if(collect(old('truckType'))->contains(1)) selected @endif>
                                                {{ __('messages.type-standard') }}
                                            </option>
                                            <option value="2"
                                                    @if(collect(old('truckType'))->contains(2)) selected @endif>
                                                {{ __('messages.type-curtain') }}
                                            </option>
                                            <option value="3"
                                                    @if(collect(old('truckType'))->contains(3)) selected @endif>
                                                {{ __('messages.type-box') }}
                                            </option>
                                            <option value="4"
                                                    @if(collect(old('truckType'))->contains(4)) selected @endif>
                                                {{ __('messages.type-refrigerator') }}
                                            </option>
                                            <option value="5"
                                                    @if(collect(old('truckType'))->contains(5)) selected @endif>
                                                {{ __('messages.type-mega') }}
                                            </option>
                                            <option value="6"
                                                    @if(collect(old('truckType'))->contains(6)) selected @endif>
                                                {{ __('messages.type-container') }}
                                            </option>
                                        </select>
                                    </div>
                                    <div id="group4" class="@if(old('truckSize')) hide @else show @endif">
                                        <select class="form-select"
                                                multiple="multiple" size="6"></select>
                                    </div>
                                </div>
                            </div>
                            @error('truckType')
                            <div class="invalid-feedback d-block d-flex justify-content-center">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <div class="row">
                                <h4>{{ __('messages.new-freight-cargo-label') }}</h4>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="form-label" for="cargo-type"><strong>{{ __('messages.new-freight-cargo-type-label') }}</strong></label>
                                </div>
                                <div class="col-9">
                                    <select class="form-select"
                                            name="cargoType">
                                        <option class="hide" value="">{{ __('messages.new-freight-cargo-type-0-select') }}</option>
                                        <option @if(old('cargoType') == 1) selected @endif value="1">{{ __('messages.new-freight-cargo-type-1-select') }}</option>
                                        <option @if(old('cargoType') == 2) selected @endif value="2">{{ __('messages.new-freight-cargo-type-2-select') }}</option>
                                        <option @if(old('cargoType') == 3) selected @endif value="3">{{ __('messages.new-freight-cargo-type-3-select') }}</option>
                                        <option @if(old('cargoType') == 4) selected @endif value="4">{{ __('messages.new-freight-cargo-type-4-select') }}</option>
                                        <option @if(old('cargoType') == 5) selected @endif value="5">{{ __('messages.new-freight-cargo-type-5-select') }}</option>
                                    </select>
                                    @error('cargoType')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-4">
                                    <label class="form-label"
                                           for="quantity"><strong>{{ __('messages.new-freight-quantity-label') }}</strong></label>
                                    <input type="text" class="form-control"
                                           id="quantity"
                                           name="quantity"
                                           value="{{ old('quantity') }}">
                                    @error('quantity')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label class="form-label"
                                           for="weight"><strong>{{ __('messages.new-freight-weight-label') }}</strong></label>
                                    <input type="text" class="form-control"
                                           id="weight"
                                           name="weight"
                                           value="{{ old('weight') }}">
                                    @error('weight')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row-cols-auto mt-4">
                                <label class="form-label"
                                       for="description"><strong>{{ __('messages.new-freight-description-label') }}</strong></label>
                                <textarea class="form-control" id="description" rows="4"
                                          style="resize: none;"
                                          name="description">{{ old('description') }}</textarea>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <label class="form-label"
                                           for="freight-type"><strong>{{ __('messages.new-freight-freight-type-label') }}</strong></label>
                                </div>
                                <div class="col">
                                    <input class="form-check-input"
                                           type="radio" name="freightType"
                                           id="freight-type" value="1"
                                           @if(old('freightType') == 1) checked @endif>
                                    <label class="form-check-label" for="freight-type">
                                        LTL
                                    </label>
                                </div>
                                <div class="col">
                                    <input class="form-check-input"
                                           type="radio" name="freightType"
                                           id="freight-type" value="2"
                                           @if(old('freightType') == 2) checked @endif>
                                    <label class="form-check-label" for="freight-type">
                                        FTL
                                    </label>
                                </div>
                                @error('freightType')
                                <div class="invalid-feedback d-block d-flex justify-content-center">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <button type="submit" class="btn btn-dark">{{ __('messages.new-freight-save-button') }}</button>
                                    <a href="{{ route('freight.list.active') }}" class="btn btn-secondary">{{ __('messages.new-freight-cancel-button') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>















@endsection
