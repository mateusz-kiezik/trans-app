@extends('layout.main')

@section('content')
    <style>
        .pagination>li>a,
        .pagination>li>span {
            border: 1px solid grey;
            color: black;
        }

        .page-item.active .page-link {
            background-color: black;
            border-color: black;
        }
        </style>


    <div class="container mt-5">

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="card">
            <h2 class="card-header">FREIGHTS</h2>
            <div class="card-body text-center">
                <div class="row">
                    <div class="col">
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
                    <div class="col">
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
                    <div class="col">
                        <strong>Truck</strong>
                    </div>
                    <div class="col">
                        <strong>Cargo</strong>
                    </div>
                    <div class="col">
                        <strong>Actions</strong>
                    </div>
                </div>
                <hr/>


                @foreach($freights ?? [] as $freight)
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    {{ $freight->start_date }}
                                </div>
                                <div class="col">
                                    {{ $freight->startAddress->country }}, {{ $freight->startAddress->city }}
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    {{ $freight->end_date }}
                                </div>
                                <div class="col">
                                    {{$freight->endAddress->country}}, {{ $freight->endAddress->city }}
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            {{ $freight->truckType->name }}, {{ $freight->truck->name }}
                            / {{ $freight->freightType->name }}
                        </div>
                        <div class="col">
                            {{ $freight->cargo->cargoType->name }} x {{ $freight->cargo->qty }}
                            / {{ $freight->cargo->weight }} kg
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col">
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
                                <div class="col">
                                    <form action="{{ route('freight.disable') }}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <input hidden id="freightId" name="freightId" value="{{ $freight->id }}">
                                        <a href='' onclick='this.parentNode.submit(); return false;'
                                           style="text-decoration: none; color: black"
                                           data-toggle="tooltip" data-placement="top" title="Delete">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                            </svg>
                                        </a>
                                    </form>
                                </div>
                            </div>

                        </div>

                    </div>
                    <hr/>
                @endforeach
                {{ $freights->links() }}



            </div>
        </div>
    </div>
@endsection
