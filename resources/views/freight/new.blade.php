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

    <div class="container mt-5">
        <div class="card">
            <h2 class="card-header">NEW FREIGHT</h2>
            <div class="card-body">
                <form action="{{ route('freight.save') }}" method="post" enctype="multipart/form-data">
                    @csrf


                    <div class="row mb-5">


                        <div class="col">

                            <div class="row mt-3">
                                <div class="col">
                                    <h4>Loading</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label" for="datepicker1"><strong>Date</strong></label>
                                        <div class="input-group date" id="datepicker1" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input
                                                    @error('loadingDate') is-invalid @enderror"
                                                   data-target="#datepicker1"
                                                   name="loadingDate"
                                                   value="{{ old('loadingDate') }}"/>
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
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label" for="timepicker1"><strong>Time</strong></label>
                                        <div class="input-group date" id="timepicker1" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input
                                                    @error('loadingTime') is-invalid @enderror"
                                                   data-target="#timepicker1"
                                                   name="loadingTime"
                                                   value="{{ old('loadingTime') }}"/>
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
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col">
                                    <h4>Address</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="form-label" for="loading-country"><strong>Country</strong></label>
                                    <input type="text" class="form-control @error('loadingAddress.country') is-invalid @enderror" id="loading-country"
                                           name="loadingAddress[country]"
                                           value="{{ old('loadingAddress.country') }}">
                                    @error('loadingAddress.country')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label class="form-label" for="loading-postcode"><strong>Post code</strong></label>
                                    <input type="text" class="form-control" id="loading-postcode"
                                           name="loadingAddress[postcode]"
                                           value="{{ old('loadingAddress.postcode') }}">
                                </div>
                                <div class="col">
                                    <label class="form-label" for="loading-city"><strong>City</strong></label>
                                    <input type="text" class="form-control @error('loadingAddress.city') is-invalid @enderror" id="loading-city"
                                           name="loadingAddress[city]"
                                           value="{{ old('loadingAddress.city') }}">
                                    @error('loadingAddress.city')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="col">
                            <div class="row mt-3">
                                <div class="col">
                                    <h4>Unloading</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label" for="datepicker2"><strong>Date</strong></label>
                                        <div class="input-group date" id="datepicker2" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input
                                                   @error('unloadingDate') is-invalid @enderror"
                                                   data-target="#datepicker2"
                                                   name="unloadingDate"
                                                   value="{{ old('unloadingDate') }}"/>
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
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label" for="timepicker2"><strong>Time</strong></label>
                                        <div class="input-group date" id="timepicker2" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input
                                                   @error('unloadingTime') is-invalid @enderror"
                                                   data-target="#timepicker2"
                                                   name="unloadingTime"
                                                   value="{{ old('unloadingTime') }}"/>
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
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col">
                                    <h4>Address</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="form-label" for="unloading-country"><strong>Country</strong></label>
                                    <input type="text" class="form-control @error('unloadingAddress.country') is-invalid @enderror" id="unloading-country"
                                           name="unloadingAddress[country]"
                                           value="{{ old('unloadingAddress.country') }}">
                                    @error('unloadingAddress.country')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label class="form-label" for="unloading-postcode"><strong>Post
                                            code</strong></label>
                                    <input type="text" class="form-control" id="unloading-postcode"
                                           name="unloadingAddress[postcode]"
                                           value="{{ old('unloadingAddress.postcode') }}">
                                </div>
                                <div class="col">
                                    <label class="form-label" for="unloading-city"><strong>City</strong></label>
                                    <input type="text" class="form-control @error('unloadingAddress.city') is-invalid @enderror" id="unloading-city"
                                           name="unloadingAddress[city]"
                                           value="{{ old('unloadingAddress.city') }}">
                                    @error('unloadingAddress.city')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr/>

                    <div class="row">
                        <div class="col">
                            <div class="row mt-4">
                                <div class="col">
                                    <h4>Truck</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label class="form-label" for="truck-size"><strong>Truck
                                                    size</strong></label>
                                        </div>


                                        <div class="col">
                                            <div class="form-check">
                                                <input class="form-check-input @error('truckSize') is-invalid @enderror" type="radio" value="1"
                                                       name="truckSize"
                                                       id="truckSize1" onclick="onLoad();"
                                                       @if(old('truckSize') == 1) checked @endif>
                                                <label class="form-check-label" for="truckSize1">Bus</label>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div
                                                class="form-check">
                                                <input class="form-check-input @error('truckSize') is-invalid @enderror" type="radio" value="2" name="truckSize"
                                                       id="truckSize2" onclick="onLoad2();"
                                                       @if(old('truckSize') == 2) checked @endif>
                                                <label class="form-check-label" for="truckSize2">Solo</label>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-check">
                                                <input class="form-check-input @error('truckSize') is-invalid @enderror" type="radio" value="3" name="truckSize"
                                                       id="truckSize3" onclick="onLoad3();"
                                                       @if(old('truckSize') == 3) checked @endif>
                                                <label class="form-check-label" for="truckSize3">Semi-trailer</label>
                                            </div>
                                        </div>
                                    </div>
                                    @error('truckSize')
                                    <div class="invalid-feedback d-block d-flex justify-content-center">{{ $message }}</div>
                                    @enderror


                                    <div class="row mt-3">
                                        <div class="col">
                                            <label class="form-label"><strong>Truck
                                                    type</strong></label>
                                        </div>


                                        <div class="col-9">
                                            <div id="group1" class="@if(old('truckSize') == 1) show @else hide @endif">
                                                <select class="form-select @error('truckType') is-invalid @enderror" multiple="multiple" name="truckType[]"
                                                        size="6">
                                                    <option value="1" @if(collect(old('truckType'))->contains(1)) selected @endif>Standard</option>
                                                    <option value="2" @if(collect(old('truckType'))->contains(2)) selected @endif>Curtain</option>
                                                    <option value="3" @if(collect(old('truckType'))->contains(3)) selected @endif>Box</option>
                                                    <option value="4" @if(collect(old('truckType'))->contains(4)) selected @endif>Refrigerator</option>
                                                </select>
                                            </div>
                                            <div id="group2" class="@if(old('truckSize') == 2) show @else hide @endif">
                                                <select class="form-select @error('truckType') is-invalid @enderror" multiple="multiple" name="truckType[]"
                                                        size="6">
                                                    <option value="1" @if(collect(old('truckType'))->contains(1)) selected @endif>Standard</option>
                                                    <option value="2" @if(collect(old('truckType'))->contains(2)) selected @endif>Curtain</option>
                                                    <option value="3" @if(collect(old('truckType'))->contains(3)) selected @endif>Box</option>
                                                    <option value="4" @if(collect(old('truckType'))->contains(4)) selected @endif>Refrigerator</option>
                                                </select>
                                            </div>
                                            <div id="group3" class="@if(old('truckSize') == 3) show @else hide @endif">
                                                <select class="form-select @error('truckType') is-invalid @enderror" multiple="multiple" name="truckType[]"
                                                        size="6">
                                                    <option value="1" @if(collect(old('truckType'))->contains(1)) selected @endif>Standard</option>
                                                    <option value="2" @if(collect(old('truckType'))->contains(2)) selected @endif>Curtain</option>
                                                    <option value="3" @if(collect(old('truckType'))->contains(3)) selected @endif>Box</option>
                                                    <option value="4" @if(collect(old('truckType'))->contains(4)) selected @endif>Refrigerator</option>
                                                    <option value="5" @if(collect(old('truckType'))->contains(5)) selected @endif>Mega</option>
                                                    <option value="6" @if(collect(old('truckType'))->contains(6)) selected @endif>Container</option>
                                                </select>
                                            </div>
                                            <div id="group4" class="@if(old('truckSize')) hide @else show @endif">
                                                <select class="form-select @error('truckType') is-invalid @enderror" multiple="multiple" size="6"></select>
                                            </div>
                                        </div>
                                        @error('truckType')
                                        <div class="invalid-feedback d-block d-flex justify-content-center">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col">
                            <div class="row mt-4">
                                <div class="col">
                                    <h4>Cargo</h4>
                                </div>
                            </div>
                            <div class="row">


                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label class="form-label" for="cargo-type"><strong>Cargo
                                                    type</strong></label>
                                        </div>
                                        <div class="col-9">
                                            <select class="form-select @error('cargoType') is-invalid @enderror"
                                                    name="cargoType">
                                                <option class="hide" value="">Select cargo type</option>
                                                <option value="1">Pallet</option>
                                                <option value="2">Carton</option>
                                                <option value="3">Woodenbox</option>
                                                <option value="4">Big bag</option>
                                                <option value="5">Container</option>
                                            </select>
                                            @error('cargoType')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="row">
                                            <div class="col">
                                                <label class="form-label"
                                                       for="quantity"><strong>Quantity</strong></label>
                                            </div>
                                            <div class="col">
                                                <input type="text" class="form-control @error('quantity') is-invalid @enderror" id="quantity"
                                                       name="quantity"
                                                       value="{{ old('quantity') }}">
                                                @error('quantity')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <label class="form-label"
                                                       for="weight"><strong>Weight (kg)</strong></label>
                                            </div>
                                            <div class="col">
                                                <input type="text" class="form-control @error('weight') is-invalid @enderror" id="weight"
                                                       name="weight"
                                                       value="{{ old('weight') }}">
                                                @error('weight')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="row">
                                            <div class="col">
                                                <label class="form-label"
                                                       for="description"><strong>Description</strong></label>
                                            </div>
                                            <div class="col-9">
                                                <textarea class="form-control" id="description" rows="4"
                                                          style="resize: none"
                                                          name="description">{{ old('description') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="form-group">
                            <div class="row">
                                <div class="col"></div>
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <label class="form-label"
                                                   for="freight-type"><strong>Freight type</strong></label>
                                        </div>
                                        <div class="col">
                                            <div
                                                class="form-check">
                                                <input class="form-check-input @error('freightType') is-invalid @enderror" type="radio" name="freightType"
                                                       id="freight-type" value="1">
                                                <label class="form-check-label" for="freight-type">
                                                    LTL
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div
                                                class="form-check">
                                                <input class="form-check-input @error('freightType') is-invalid @enderror" type="radio" name="freightType"
                                                       id="freight-type" value="2">
                                                <label class="form-check-label" for="freight-type">
                                                    FTL
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    @error('freightType')
                                    <div class="invalid-feedback d-block d-flex justify-content-center">{{ $message }}</div>
                                    @enderror


                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="row">
                            <div class="col"></div>
                            <div class="col">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-dark">SAVE</button>
                                    <a href="{{ route('freight.list.active') }}" class="btn btn-secondary">CANCEL</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
