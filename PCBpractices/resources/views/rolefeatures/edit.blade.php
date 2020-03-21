@extends('layouts.admin.app')

@section('content')

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="mr-md-3 mr-xl-5">
                        <h3>Role Feature Operations</h3>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <a href="{{ url('rolefeatures') }}">
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
                    <p class="card-title">Add Role Feature</p>
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <form method="POST" action="{{ route('rolefeatures.update', $RoleId) }}" class="form-horizontal">
                        @csrf
                        @method('PUT')


                        @foreach($roles as $role)
                            <div class="form-group row">
                                <label class="col-md-12"><strong>{{$role->RoleName}}</strong></label>
                                @foreach($features as $feature)
                                    <div class="col-md-12">
                                        <label><!-- <input type="checkbox" name="FeatureId[]" value="{{$feature->FeatureId}}"> --> {{ $feature->FeatureName }}</label>
                                        @if($feature->FeatureType == "MainMenu")
                                        @php 
                                            $rolefeature = $role->RoleId.'_'.$feature->FeatureId.'_1';
                                        @endphp
                                            <div class="col-md-6">
                                                <label><input type="checkbox" name="OperationId[]" value="{{$role->RoleId}}_{{$feature->FeatureId}}_1" @if(is_array($role_features) && in_array($rolefeature, $role_features)) checked @endif> View</label>
                                            </div>
                                        @endif

                                        @php 
                                            $submenu = $feature->submenufeatures($feature->FeatureId);  
                                        @endphp 
                                        @foreach($submenu as $submenurow)
                                            <div class="col-md-3">
                                                <label><!-- <input type="checkbox" name="FeatureId[]" value="{{$submenurow->FeatureId}}"> --> {{ $submenurow->FeatureName }}</label>
                                                @foreach($operations as $operation)
                                                @php 
                                                    $rolefeatureop = $role->RoleId.'_'.$submenurow->FeatureId.'_'.$operation->OperationId;
                                                @endphp
                                                    <div class="col-md-6">
                                                        <label><input type="checkbox" name="OperationId[]" value="{{$role->RoleId}}_{{$submenurow->FeatureId}}_{{$operation->OperationId}}" @if(is_array($role_features) && in_array($rolefeatureop, $role_features)) checked @endif> {{ $operation->OperationName }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div> <hr>
                        @endforeach

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