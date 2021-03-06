@extends('layouts.admin.app')

@section('content')

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="mr-md-3 mr-xl-5">
                        <h3>Edit Route</h3>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <a href="{{ url('routes') }}">
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
                    <p class="card-title">Edit Route</p>
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <form action="{{ route('routes.update',$editroute->RouteId) }}" method="POST">
                    @csrf
                    @method('PUT')
                        <div class="form-group">
                            <label>Route Name</label>
                            <input type="text" name="RouteName" value="{{ $editroute->RouteName }}"  class="form-control" placeholder="Enter Route Name" required="">
                            @error('RouteName')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                            <div class="form-group">
                                <label>Start Point</label>
                                <input type="text" name="StartPoint" value="{{ $editroute->StartPoint }}" class="form-control" placeholder="Enter Route Start Point" required="">
                                @error('StartPoint')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Start Point Latitude</label>
                                <input type="text" name="StartPointLatitude" value="{{ $editroute->StartPointLatitude }}" class="form-control" placeholder="Enter Route Start Point Latitude" required="">
                                @error('StartPointLatitude')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Start Point Longitude</label>
                                <input type="text" name="StartPointLongitude" value="{{ $editroute->StartPointLongitude }}" class="form-control" placeholder="Enter Route Start Point name" required="">
                                @error('StartPointLongitude')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>End Point </label>
                                <input type="text" name="EndPoint" value="{{ $editroute->EndPoint }}" class="form-control" placeholder="Enter Route End Point" required="">
                                @error('EndPoint')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>End Point Latitude</label>
                                <input type="text" name="EndPointLatitude" value="{{ $editroute->EndPointLatitude }}" class="form-control" placeholder="Enter Route End Point Latitude" required="">
                                @error('EndPointLatitude')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>End Point Longitude</label>
                                <input type="text" name="EndPointLongitude" value="{{ $editroute->EndPointLongitude }}" class="form-control" placeholder="Enter Route End Point Longitude" required="">
                                @error('EndPointLongitude')
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