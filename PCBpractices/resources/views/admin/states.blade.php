@extends('layouts.admin.app')

@section('content')



        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-end flex-wrap">
                        <div class="mr-md-3 mr-xl-5">
                            <h3>States List</h3>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-end flex-wrap">
                        <a href="{{ url('admin/addState') }}">
                            <button class="btn btn-primary mt-2 mt-xl-0"> Add New State </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">States List</p>
                        <div class="table-responsive">
                            <table id="recent-purchases-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Country Name</th>
                                        <th>State Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>India</td>
                                        <td>Karnataka</td>
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
                                        <td>India</td>
                                        <td>Andhra Pradesh</td>
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