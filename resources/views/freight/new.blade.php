@extends('layout.main')

@section('content')
    <div class="container">
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
                                            <input type="text" class="form-control datetimepicker-input"
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
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label" for="timepicker1"><strong>Time</strong></label>
                                        <div class="input-group date" id="timepicker1" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input"
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
                                    <input type="text" class="form-control" id="loading-country"
                                           name="loadingCountry"
                                           value="{{ old('loadingCountry') }}">
                                </div>
                                <div class="col">
                                    <label class="form-label" for="loading-zipcode"><strong>Zip code</strong></label>
                                    <input type="text" class="form-control" id="loading-zipcode"
                                           name="loadingZipcode"
                                           value="{{ old('loadingZipcode') }}">
                                </div>
                                <div class="col">
                                    <label class="form-label" for="loading-city"><strong>City</strong></label>
                                    <input type="text" class="form-control" id="loading-city"
                                           name="loadingCity"
                                           value="{{ old('loadingCity') }}">
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
                                            <input type="text" class="form-control datetimepicker-input"
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
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label" for="timepicker2"><strong>Time</strong></label>
                                        <div class="input-group date" id="timepicker2" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input"
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
                                    <input type="text" class="form-control" id="unloading-country"
                                           name="unloadingCountry"
                                           value="{{ old('unloadingCountry') }}">
                                </div>
                                <div class="col">
                                    <label class="form-label" for="unloading-zipcode"><strong>Zip code</strong></label>
                                    <input type="text" class="form-control" id="unloading-zipcode"
                                           name="unloadingZipcode"
                                           value="{{ old('unloadingZipcode') }}">
                                </div>
                                <div class="col">
                                    <label class="form-label" for="unloading-city"><strong>City</strong></label>
                                    <input type="text" class="form-control" id="unloading-city"
                                           name="unloadingCity"
                                           value="{{ old('unloadingCity') }}">
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

                                            <div
                                                class="form-check">
                                                <input class="form-check-input" type="radio" name="truckSize"
                                                       id="truckSize1"
                                                       value="1">
                                                <label class="form-check-label" for="truckSize1">
                                                    Bus
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div
                                                class="form-check">
                                                <input class="form-check-input" type="radio" name="truckSize"
                                                       id="truckSize2"
                                                       value="2">
                                                <label class="form-check-label" for="truckSize2">
                                                    Solo
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="truckSize"
                                                       id="truckSize3"
                                                       value="3">
                                                <label class="form-check-label" for="truckSize3">
                                                    Semi-trailer
                                                </label>
                                            </div>
                                        </div>




                                    </div>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <label class="form-label" for="loading-country"><strong>Truck
                                                    type</strong></label>
                                        </div>



                                        <div class="col-9">
                                            <select class="form-select" multiple aria-label="multiple select example"
                                                    name="truckType">
                                                <option value="1">Standard</option>
                                                <option value="2">Curtain</option>
                                                <option value="3">Box</option>
                                                <option value="4">Refrigerator</option>
                                            </select>
                                        </div>




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
                                            <select class="form-select" aria-label="Default select example"
                                                    name="cargoType">
                                                <option value="1">Pallet</option>
                                                <option value="2">Carton</option>
                                                <option value="3">Woodenbox</option>
                                                <option value="4">Big bag</option>
                                                <option value="5">Container</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="row">
                                            <div class="col">
                                                <label class="form-label"
                                                       for="quantity"><strong>Quantity</strong></label>
                                            </div>
                                            <div class="col">
                                                <input type="text" class="form-control" id="quantity"
                                                       name="quantity"
                                                       value="{{ old('quantity') }}">
                                            </div>
                                            <div class="col">
                                                <label class="form-label"
                                                       for="weight"><strong>Weight</strong></label>
                                            </div>
                                            <div class="col">
                                                <input type="text" class="form-control" id="weight"
                                                       name="weight"
                                                       value="{{ old('weight') }}">
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
                                                <input class="form-check-input" type="radio" name="freightType"
                                                       id="freight-type" value="1">
                                                <label class="form-check-label" for="freight-type">
                                                    LTL
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div
                                                class="form-check">
                                                <input class="form-check-input" type="radio" name="freightType"
                                                       id="freight-type" value="2">
                                                <label class="form-check-label" for="freight-type">
                                                    FTL
                                                </label>
                                            </div>
                                        </div>
                                    </div>
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
