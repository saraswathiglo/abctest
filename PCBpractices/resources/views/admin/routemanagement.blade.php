@extends('layouts.admin.app')

@section('content')

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="mr-md-3 mr-xl-5">
                        <h3>Route Management</h3>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <a href="{{ url('admin/addroute') }}">
                        <button type="button" class="btn btn-light bg-white btn-icon mr-3 mt-2 mt-xl-0">
                            <i class="mdi mdi-plus text-muted"></i>
                        </button>
                    </a>
                    <a href="{{ url('admin/addroute') }}">
                        <button class="btn btn-primary mt-2 mt-xl-0">Add Route</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Route</p>
                    <div class="table-responsive">
                        <table id="recent-purchases-listing" class="table">
                            <thead>
                            <tr>
                                <th>Vehicle</th>
                                <th>Driver</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>TS04AC4567</td>
                                <td>ABC</td>
                                <td>Assigned</td>
                            </tr>
                            <tr>
                                <td>TS04AC9805</td>
                                <td>XYZ</td>
                                <td>Not Assigned</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
