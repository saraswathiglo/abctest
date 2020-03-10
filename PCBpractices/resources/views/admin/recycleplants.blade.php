@extends('layouts.admin.app')

@section('content')


    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="mr-md-3 mr-xl-5">
                        <h3>Recycle Plants</h3>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <a href="{{ url('admin/addrecycleplant') }}">
                        <button type="button" class="btn btn-light bg-white btn-icon mr-3 mt-2 mt-xl-0">
                            <i class="mdi mdi-plus text-muted"></i>
                        </button>
                    </a>
                    <a href="{{ url('admin/addrecycleplant') }}">
                        <button class="btn btn-primary mt-2 mt-xl-0">Add Recycle Plant</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Recycle Plants List</p>

                    <div class="table-responsive">
                        <table id="recent-purchases-listing" class="table">
                            <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Name</th>
                                <th>Registration Id</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>ABC</td>
                                <td>KNPCB-123</td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-sm" title="VIEW">
                                        <span class="mdi mdi-eye"></span>
                                    </a>
                                    <a href="#" class="btn btn-warning btn-sm" title="EDIT">
                                        <span class="mdi mdi-tooltip-edit"></span>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-sm" title="DELETE">
                                        <span class="mdi mdi-delete"></span>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>XYZ</td>
                                <td>KNPCB-987</td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-sm" title="VIEW">
                                        <span class="mdi mdi-eye"></span>
                                    </a>
                                    <a href="#" class="btn btn-warning btn-sm" title="EDIT">
                                        <span class="mdi mdi-tooltip-edit"></span>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-sm" title="DELETE">
                                        <span class="mdi mdi-delete"></span>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection