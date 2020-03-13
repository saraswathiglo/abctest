@extends('layouts.admin.app')
@section('content')

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="mr-md-3 mr-xl-5">
                        <h3>Add New Waste Color</h3>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <a href="{{ url('/admin/WasteColors') }}">
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
                    <p class="card-title">Add Waste Color</p>

                    <form method="POST" action="/" class="form-horizontal">
                        <div class="form-group">
                            <label>Waste Name:</label>
                            <input type="text" name="waste_name" class="form-control" placeholder="Enter Waste name">
                        </div>
                        <div class="form-group">
                            <label>Waste Color:</label>
                            <input type="text" name="waste_color" class="form-control" placeholder="Enter Waste Color">
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