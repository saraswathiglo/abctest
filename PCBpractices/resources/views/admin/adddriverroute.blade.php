@extends('layouts.admin.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel = "stylesheet" href = "http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css"/>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src = "http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="mr-md-3 mr-xl-5">
                        <h3>Route Management</h3>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <a href="{{ url('admin/RouteManagement') }}">
                        <button class="btn btn-primary mt-2 mt-xl-0"><< Back</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <form method="POST" action="{{ url('admin/createdriverroute') }}">
        {{csrf_field()}}
    <div class="row">
        <div class="col-md-6 stretch-card">

            <div class="card">
                <div class="card-body">

                    <p class="card-title">Add Driver Route</p>
                    <div class="form-group">
                        <label for="driver">Driver</label>
                        <select class="form-control" name="driver">
                            @foreach($drivers as $driver)
                                <option value="{{$driver->UId}}">{{ $driver->DisplayName }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="route_name">Route</label>
                        <select class="form-control" name="route_name">
                            @foreach($routes as $route)
                                <option value="{{$route->RouteId}}">{{ $route->RouteName }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="vehicle">Vehicle</label>
                        <select class="form-control" name="vehicle">
                            @foreach($vehicles as $vehicle)
                                <option value="{{$vehicle->VehicleId }}">{{ $vehicle->VehicleName }} - {{ $vehicle->VehicleNumber }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="from_date">From Date:</label>
                        <input type="text" class="form-control form_date" name="from_date" id="from_date" placeholder="From Date" autocomplete="off"/>
                    </div>
                    <div class="form-group">
                        <label for="to_date">To Date:</label>
                        <input type="text" class="form-control to_date" name="to_date" id="to_date" placeholder="To Date" autocomplete="off"/>
                    </div>
                    <!-- <div class="form-group">
                        <label for="start_date">Shedule Date:</label>
                        <input type="text" class="form-control form_date" name="start_date" id="start_date" placeholder="Date" autocomplete="off"/>
                    </div>
                    <div class="form-group">
                        <label for="start_time">Shedule Time:</label>
                        <input type="text" class="form-control start_time" name="start_time" id="start_time" placeholder="Time" autocomplete="off"/>
                    </div> -->
                    <button type="submit" class="btn btn-lg btn-success btn-block waves-effect waves-light">ADD Driver Schedules</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>

    
@endsection
