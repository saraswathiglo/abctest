@extends('layouts.admin.app')

@section('content')

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="mr-md-3 mr-xl-5">
                        <h3>Edit Village</h3>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <a href="{{ url('village') }}">
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
                    <p class="card-title">Edit Village</p>
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <form action="{{ route('village.update',$editvillage->VillageId) }}" method="POST">
                    @csrf
                    @method('PUT')
                        <div class="form-group">
                            <label>Select Panchaytee</label>
                            <select class="form-control" name="PanchayteeId" required="">
                                <option value="">Select Panchaytee</option>
                                @foreach($panchaytees as $panchaytee)
                                    <option value="{{ $panchaytee->PanchayteeId }}" {{ $editvillage->PanchayteeId == $panchaytee->PanchayteeId ? 'selected="selected"' : '' }}>{{ $panchaytee->PanchayteeName }}</option>
                                @endforeach
                            </select>
                            @error('PanchayteeId')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Village Name</label>
                            <input type="text" name="VillageName" value="{{ $editvillage->VillageName }}"  class="form-control" placeholder="Enter Village Name" required="">
                            @error('VillageName')
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