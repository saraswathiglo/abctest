@extends('layouts.admin.app')

@section('content')

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="mr-md-3 mr-xl-5">
                        <h3>Add New Employee</h3>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <a href="{{ url('admin/employee') }}">
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
                    <p class="card-title">Add Employee</p>

                    <form method="POST" action="/" class="form-horizontal">
                        <div class="form-group">
                            <label>categories</label>
                            <select name="industry_type" class="form-control" placeholder="Enter Industry Type">
                                <option value=""> --Select Category Type --</option>
                                <option value="1">Type1</option>
                                <option value="2">Type2</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Employee Name:</label>
                            <input type="text" name="industry_name" class="form-control"
                                   placeholder="Enter Industry Name">
                        </div>
                        <div class="form-group">
                            <label>Employee Id</label>
                            <input type="text" name="industry_id" class="form-control"
                                   placeholder="Enter Industry Id (Industry Registration Id)">
                        </div>

                        <div class="clearfix"></div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label> </label>

                                <div>
                                    <button type="submit" name="submit" value="search" class="btn btn-primary"><i
                                                class="fa fa-fw fa-search"></i> Submit
                                    </button>
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