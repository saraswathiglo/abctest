@extends('layouts.admin.app')

@section('content')

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="mr-md-3 mr-xl-5">
                        <h3>Edit Driver Route</h3>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <a href="{{ url('driverroutes') }}">
                        <button class="btn btn-primary mt-2 mt-xl-0"> >> Back</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Edit Driver Route</p>
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <form action="{{ route('driverroutes.update',$editdriverroute->AssignmentId) }}" method="POST">
                    @csrf
                    @method('PUT')

                        <div class="form-group">
                            <label for="UId">Select Driver</label>
                            <select class="form-control" name="UId" required="">
                                <option value="">Select Driver</option>
                                @foreach($drivers as $driver)
                                    <option value="{{$driver->UId}}" {{ $editdriverroute->UId == $driver->UId ? 'selected="selected"' : '' }}>{{ $driver->DisplayName }}</option>
                                @endforeach
                            </select>
                            @error('UId')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="VehicleId">Select Vehicle</label>
                            <select class="form-control" name="VehicleId" required="">
                                <option value="">Select Vehicle</option>
                                @foreach($vehicles as $vehicle)
                                    <option value="{{$vehicle->VehicleId }}" {{ $editdriverroute->VehicleId == $vehicle->VehicleId ? 'selected="selected"' : '' }}>{{ $vehicle->VehicleName }} - {{ $vehicle->VehicleNumber }}</option>
                                @endforeach
                            </select>
                            @error('VehicleId')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="RouteId">Select Route</label>
                            <select class="form-control" name="RouteId" required="">
                                <option value="">Select Route</option>
                                @foreach($routes as $route)
                                    <option value="{{$route->RouteId}}" {{ $editdriverroute->RouteId == $route->RouteId ? 'selected="selected"' : '' }}>{{ $route->RouteName }}</option>
                                @endforeach
                            </select>
                            @error('RouteId')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="DriverRouteFromDate">From Date:</label>
                            <input type="text" class="form-control form_date" name="DriverRouteFromDate" id="DriverRouteFromDate" placeholder="Driver to the route From Date" autocomplete="off" required="" value="{{ $editdriverroute->DriverRouteFromDate}}" />
                            @error('DriverRouteFromDate')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="DriverRouteFromTime">From Time:</label>
                            <input type="text" class="form-control form_time" name="DriverRouteFromTime" id="DriverRouteFromTime" placeholder="Driver to the route From Date" autocomplete="off" required="" value="{{ $editdriverroute->DriverRouteFromTime}}"/>
                            @error('DriverRouteFromTime')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="DriverRouteToDate">To Date:</label>
                            <input type="text" class="form-control to_date" name="DriverRouteToDate" id="DriverRouteToDate" placeholder="To Date" autocomplete="off" value="{{ $editdriverroute->DriverRouteToDate}}"/>
                            @error('DriverRouteToDate')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="DriverRouteToTime">To Time:</label>
                            <input type="text" class="form-control to_time" name="DriverRouteToTime" id="DriverRouteToTime" placeholder="Driver to the route From Date" autocomplete="off" required="" value="{{ $editdriverroute->DriverRouteToTime}}"/>
                            @error('DriverRouteToTime')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>                        

                        <div class="clearfix"></div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label> </label>
                                <div>
                                    <button type="submit" name="submit" value="search" class="btn btn-primary"><i class="fa fa-fw fa-search"></i> Update </button>
                                    <a href="#" class="btn btn-danger"><i class="fa fa-fw fa-sync"></i> Clear</a>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection