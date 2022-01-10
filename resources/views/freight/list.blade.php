@extends('layout.main')

@section('content')


    <div class="card mt-3">
        <div class="card">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Freights</div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Status</th>
                            <th colspan="3">Loading</th>
                            <th colspan="3">Unloading</th>
                            <th>Cargo</th>
                            <th>Publication date</th>
                            <th colspan="3">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($freights ?? [] as $freight)
                            <tr>
                                <td rowspan="2">{{ $freight->id }}</td>
                                <td rowspan="2">{{ $freight->status_id }}</td>
                                <td>{{ $freight->startAddress->country }}</td>
                                <td>{{ $freight->startAddress->postcode }}</td>
                                <td>{{ $freight->startAddress->city }}</td>
                                <td>{{ $freight->endAddress->country }}</td>
                                <td>{{ $freight->endAddress->postcode }}</td>
                                <td>{{ $freight->endAddress->city }}</td>
                                <td rowspan="2">{{ $freight->cargo->qty }} x {{ $freight->cargo->description }}</td>
                                <td rowspan="2">{{ $freight->created_at }}</td>
                                <td rowspan="2"><a class="btn btn-dark"
                                                   href="{{route('freights.showDetails', $freight->id)}}">DETAILS</a>
                                </td>
                                <td rowspan="2">EDIT</td>
                                <td rowspan="2">DELETE</td>
                            </tr>
                            <tr>
                                <td colspan="2">{{ $freight->start_date }}</td>
                                <td>{{ $freight->start_time_from }}</td>
                                <td colspan="2">{{ $freight->end_date }}</td>
                                <td>{{ $freight->end_time_from }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $freights->links() }}
            </div>
        </div>
    </div>

@endsection
