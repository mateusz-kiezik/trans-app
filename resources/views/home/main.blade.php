@extends('layout.main')

@section('content')
    <div class="container">
        <div class="card">
            <h2 class="card-header">5 newest freight</h2>
            <div class="card-body text-center">
                <div class="row">
                    <div class="col-2 border-end border-dark">
                        <strong>Loading</strong>
                        <div class="row">
                            <div class="col">
                                <strong>Date</strong>
                            </div>
                            <div class="col">
                                <strong>Place</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 border-end border-dark">
                        <strong>Unloading</strong>
                        <div class="row">
                            <div class="col">
                                <strong>Date</strong>
                            </div>
                            <div class="col">
                                <strong>Place</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 border-end border-dark">
                        <strong>Truck</strong>
                    </div>
                    <div class="col-4 border-end border-dark">
                        <strong>Cargo</strong>
                    </div>
                    <div class="col-1">
                        <strong>Actions</strong>
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
                            <div>{{ $freight->truckType->name }}</div>
                            <div>
                                @foreach($freight->truck_id ?? [] as $truck)
                                    @if($loop->index > 0)
                                        {{'|'}}
                                    @endif
                                    {{ $truck['name'] }}
                                @endforeach
                            </div>
                            {{ $freight->freightType->name }}
                        </div>
                        <div class="col-4 border-end border-dark">
                            <div>
                                {{ $freight->cargo->cargoType->name }} x {{ $freight->cargo->qty }}
                                / {{ $freight->cargo->weight }} kg
                            </div>
                            @if($freight->cargo->description != null)
                                <div style="white-space: pre-wrap;">Description: {{ $freight->cargo->description }}</div>
                            @endif
                        </div>
                        <div class="col-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                 class="bi bi-credit-card-2-front-fill" viewBox="0 0 16 16">
                                <a href="{{ route('freight.details', $freight->id) }}"
                                   style="text-decoration: none; color: black"
                                   data-toggle="tooltip" data-placement="top" title="Details">
                                    <path
                                        d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2.5 1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-2zm0 3a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z"/>
                                </a>
                            </svg>
                        </div>

                    </div>
                    <hr/>
                @endforeach


                <div class="row-cols-6">
                    <a href="{{ route('freight.list.active') }}" class="btn btn-dark">VIEW MORE</a>
                </div>


            </div>
        </div>
    </div>

@endsection
