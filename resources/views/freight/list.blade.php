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
                            <th>Loading</th>
                            <th>Unloading</th>
                            <th>Cargo</th>
                            <th>Publication date</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($freights ?? [] as $freight)
                        <tr>
                            <td>{{ $freight->id }}</td>
                            <td>{{ $freight->status_id }}</td>
                            <td>{{ $freight->start_date }}</td>
                            <td>{{ $freight->end_date }}</td>
                            <td>{{ $freight->cargo_id }}</td>
                            <td>{{ $freight->created_at }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
