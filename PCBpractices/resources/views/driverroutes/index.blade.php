@extends('layouts.admin.app')

@section('content')

        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-end flex-wrap">
                        <div class="mr-md-3 mr-xl-5">
                            <h3>Driver Route List</h3>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-end flex-wrap">
                        <a href="{{ url('driverroutes/create') }}">
                            <button class="btn btn-primary mt-2 mt-xl-0"> Add New Driver Route </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Driver Route List</p>
                        <div class="table-responsive">
                            <table id="recent-purchases-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Route</th>
                                        <th>Vehicle</th>
                                        <th>Driver</th>
                                        <th>Assigned By</th>
                                        <th>Assigned Date Time</th>
                                        <th>Route From Date Time</th>
                                        <th>Route To Date Time</th>
                                        <th>Route Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($driverroutes as $key => $driverroute)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $driverroute->UId }}</td>
                                        <td>{{ $driverroute->VehicleId }}</td>
                                        <td>{{ $driverroute->RouteId }}</td>
                                        <td>{{ $driverroute->AssignedBy }}</td>
                                        <td>{{ $driverroute->AssignedDate }} {{ $driverroute->AssignedTime }}</td>
                                        <td>{{ $driverroute->DriverRouteFromDate }} {{ $driverroute->DriverRouteFromTime }}</td>
                                        <td>{{ $driverroute->DriverRouteToDate }} {{ $driverroute->DriverRouteToTime }}</td>
                                        <td>{{ $driverroute->ScheduleStatus }}</td>
                                        <td>
                                            <a href="{{ route('driverroutes.show',$driverroute->AssignmentId) }}" class="btn btn-primary btn-sm" title="VIEW">
                                                <span class="mdi mdi-eye"></span>
                                            </a>
                                            <a href="{{ route('driverroutes.edit',$driverroute->AssignmentId) }}" class="btn btn-warning btn-sm" title="EDIT">
                                                <span class="mdi mdi-tooltip-edit"></span>
                                            </a>
                                            <form action="{{ route('driverroutes.destroy',$driverroute->AssignmentId) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                                <button type="submit" class="btn btn-danger btn-sm" title="DELETE"><span class="mdi mdi-delete"></span></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            
@endsection