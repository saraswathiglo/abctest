@extends('layouts.admin.app')

@section('content')

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="mr-md-3 mr-xl-5">
                        <h3>Edit Panchayatee</h3>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <a href="{{ url('panchayatee') }}">
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
                    <p class="card-title">Edit Panchayatee</p>
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <form action="{{ route('panchayatee.update',$editpanchaytee->PanchayteeId) }}" method="POST">
                    @csrf
                    @method('PUT')
                        <div class="form-group">
                            <label>Select District</label>
                            <select class="form-control" name="DistrictId" required="">
                                <option value="">Select District</option>
                                @foreach($districts as $district)
                                    <option value="{{ $district->DistrictId }}" {{ $editpanchaytee->DistrictId == $district->DistrictId ? 'selected="selected"' : '' }}>{{ $district->DistrictName }}</option>
                                @endforeach
                            </select>
                            @error('DistrictId')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Select Taluka</label>
                            <select class="form-control" name="TalukaId" required="">
                                <option value="">Select Taluka</option>
                                @foreach($talukas as $taluka)
                                    <option value="{{ $taluka->TalukaId }}" {{ $editpanchaytee->TalukaId == $taluka->TalukaId ? 'selected="selected"' : '' }}>{{ $taluka->TalukaName }}</option>
                                @endforeach
                            </select>
                            @error('TalukaId')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Panchaytee Name</label>
                            <input type="text" name="PanchayteeName" value="{{ $editpanchaytee->PanchayteeName }}"  class="form-control" placeholder="Enter Panchaytee Name" required="">
                            @error('PanchayteeName')
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