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
        <div class="card">
            <h2 class="card-header">FIND FREIGHT</h2>
            <div class="card-body">

                <form autocomplete="off" action="{{ route('freight.find.results') }}" method="post"
                      enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-3">

                            <div class="row">
                                <label class="form-label"><strong>Loading date</strong></label>
                            </div>

                            <div class="row align-items-center">
                                <div class="col-3">
                                    <h6>From:</h6>
                                </div>

                                <div class="col">
                                    <div class="input-group date" id="datepicker1" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input ms-3"
                                               data-target="#datepicker1"
                                               name="loadingDateFrom"
                                               value="{{ old('loadingDateFrom') }}"
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
                                    <h6>To:</h6>
                                </div>

                                <div class="col">
                                    <div class="input-group date align-items-center" id="datepicker2"
                                         data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input ms-3
                                                    @error('loadingDateTo') is-invalid @enderror"
                                               data-target="#datepicker2"
                                               name="loadingDateTo"
                                               value="{{ old('loadingDateTo') }}"
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
                                <label class="form-label"><strong>Unloading date</strong></label>
                            </div>

                            <div class="row align-items-center">
                                <div class="col-3">
                                    <h6>From:</h6>
                                </div>

                                <div class="col">
                                    <div class="input-group date align-items-center" id="datepicker3"
                                         data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input ms-3
                                                    @error('unloadingDateFrom') is-invalid @enderror"
                                               data-target="#datepicker3"
                                               name="unloadingDateFrom"
                                               value="{{ old('unloadingDateFrom') }}"
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
                                    <h6>To:</h6>
                                </div>

                                <div class="col">
                                    <div class="input-group date align-items-center" id="datepicker4"
                                         data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input ms-3
                                                    @error('unloadingDateTo') is-invalid @enderror"
                                               data-target="#datepicker4"
                                               name="unloadingDateTo"
                                               value="{{ old('unloadingDateTo') }}"
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
                                <input class="btn btn-dark" type="submit" value="Find" style="width:30%;">
                            </div>
                            <div class="row mt-3 justify-content-end">
                                {{--                                <input id="filterButton" class="btn btn-light" value="Show filters" style="width:30%; text-decoration:none;" onclick="showFilters();">--}}
                                <button id="filterButton" type="button" class="btn btn-light" style="width:30%;"
                                        onclick="showFilters();">More filters
                                </button>
                            </div>
                        </div>
                    </div>

                    <div id="filters" class="hide">
                        <hr/>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label"><strong>Truck type</strong></label>
                                <div class="input-group">
                                    <input class="form-check me-2" type="checkbox" name="truckType[]" value="1">
                                    <label class="form-check-label">Bus</label>

                                    <input class="form-check ms-3 me-2" type="checkbox" name="truckType[]" value="2">
                                    <label class="form-check-label">Solo</label>

                                    <input class="form-check ms-3 me-2" type="checkbox" name="truckType[]" value="3">
                                    <label class="form-check-label">Semi-trailer</label>
                                </div>
                            </div>

                            <div class="col-2">
                                <label class="form-label"><strong>Max cargo weight (kg)</strong></label>
                                <input class="form-control" type="number" name="weight">
                            </div>

                            <div class="col-3 ms-4">
                                <div class="row">
                                    <label class="form-label"><strong>Loading address</strong></label>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-4">
                                        <h6>City:</h6>
                                    </div>
                                    <div class="col">
                                        <input class="form-control" type="text" name="loadingCity">
                                    </div>
                                </div>
                                <div class="row align-items-center mt-3">
                                    <div class="col-4">
                                        <h6 class="me-2">Country:</h6>
                                    </div>
                                    <div class="col">
                                        <input class="form-control" type="text" name="loadingCountry">
                                    </div>
                                </div>
                            </div>


                            <div class="col-3 ms-4">
                                <div class="row">
                                    <label class="form-label"><strong>Unloading address</strong></label>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-4">
                                        <h6 class="me-2">City:</h6>
                                    </div>
                                    <div class="col">
                                        <input class="form-control" type="text" name="unloadingCity">
                                    </div>
                                </div>
                                <div class="row align-items-center mt-3">
                                    <div class="col-4">
                                        <h6 class="me-2">Country:</h6>
                                    </div>
                                    <div class="col">
                                        <input class="form-control" type="text" name="unloadingCountry">
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
