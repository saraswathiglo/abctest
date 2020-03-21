@extends('layouts.admin.app')

@section('content')

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="mr-md-3 mr-xl-5">
                        <h3>Add New Industry Type</h3>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <a href="{{ url('industrytypes') }}">
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
                    <p class="card-title">Add Industry Type</p>
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <form method="POST" action="{{ route('industrytypes.store') }}" class="form-horizontal">
                        @csrf
                        <div class="form-group">
                            <label> Types </label>
                            <select name="GroupId" class="form-control" required="">
                                <option value="">Select Type</option>
                                <option value="3">Waste Generator</option>
                                <option value="4">Waste Disposals(Plants)</option>
                            </select>
                            @error('GroupId')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Industry Type</label>
                            <input type="text" name="EntityName" value="" class="form-control" placeholder="Enter Vehicle Type" required="">
                            @error('EntityName')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="clearfix"></div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label> </label>
                                <div>
                                    <button type="submit" name="submit" value="search" class="btn btn-primary"><i class="fa fa-fw fa-search"></i> Submit </button>
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