@extends('layouts.admin.app')

@section('content')

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="mr-md-3 mr-xl-5">
                        <h3>Add New Waste generator</h3>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <a href="{{ url('wastegenerator') }}">
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
                    <p class="card-title">Add Waste generator</p>
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <form method="POST" action="{{route('wastegenerator.store')}}" class="form-horizontal">
                        @csrf
                        <div class="form-group">
                            <label>Waste Generator Type</label>
                            <select class="form-control" name="OrgTypeId" required="">
                                <option value="">Select Waste Generator Type</option>
                                @foreach($wastegenerators as $wastegenerator)
                                    <option value="{{ $wastegenerator->EntityId }}">{{ $wastegenerator->EntityName }}</option>
                                @endforeach
                            </select>
                            @error('OrgTypeId')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- <div class="form-group">
                            <label>Organization </label>
                            <select class="form-control" name="OrgId">
                                <option value="">Select Parent Organization</option>
                                @foreach($organizations as $organization)
                                    <option value="{{ $organization->OrgId }}">{{ $organization->OrgName }}</option>
                                @endforeach
                            </select>
                            @error('OrgId')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div> -->
                        <div class="form-group">
                            <label>Waste Generator Name</label>
                            <input type="text" name="OrgName" value="" class="form-control" placeholder="Enter Waste Generator Name" required="">
                            @error('OrgName')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Contact Person Name</label>
                            <input type="text" name="DisplayName" value="" class="form-control" placeholder="Enter Name" required="">
                            @error('DisplayName')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email Id</label>
                            <input type="email" name="EmailId" value="" class="form-control" placeholder="Enter Email Id" required="">
                            @error('EmailId')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Contact Number</label>
                            <input type="text" name="ContactNo" value="" class="form-control" placeholder="Enter Waste Generator Name" required="">
                            @error('ContactNo')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Location</label>
                            <input type="text" name="Location" value="" class="form-control" placeholder="Enter Location" required="">
                            @error('Location')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Latitude</label>
                            <input type="text" name="Latitude" value="" class="form-control" placeholder="Enter Latitude" required="">
                            @error('Latitude')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Longitude</label>
                            <input type="text" name="Longitude" value="" class="form-control" placeholder="Enter Longitude" required="">
                            @error('Longitude')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Waste Types</label>
                            <!-- <input type="checkbox" name="WasteTypes[]" value="" class="form-control"> -->
                            @foreach($wastetypes as $wastetype)
                                <div class="col-md-3">
                                    <label><input type="checkbox" name="WasteTypes[]" value="{{$wastetype->EntityId}}"> {{ $wastetype->EntityName }}</label>
                                </div>
                            @endforeach
                            @error('WasteTypes')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Waste Collection Schedule </label>
                            @foreach($wasteschedules as $wasteschedule)
                                <div class="col-md-3">
                                    <label><input type="radio" name="WasteSchedule" value="{{$wasteschedule->EntityId}}" onChange="findSchedule()"> {{ $wasteschedule->EntityName }}</label>
                                </div>
                            @endforeach
                            <div class="col-md-9" id="scheduledays" style="display: none;">
                                <label><input type="checkbox" name="scheduledays[]" value="1"> Sunday </label>
                                <label><input type="checkbox" name="scheduledays[]" value="2"> Monday </label>
                                <label><input type="checkbox" name="scheduledays[]" value="3"> Tuesday </label>
                                <label><input type="checkbox" name="scheduledays[]" value="4"> Wednesday </label>
                                <label><input type="checkbox" name="scheduledays[]" value="5"> Thrusday </label>
                                <label><input type="checkbox" name="scheduledays[]" value="6"> Friday </label>
                                <label><input type="checkbox" name="scheduledays[]" value="7"> Saturday </label>
                            </div>
                            @error('Schedule')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <input type="hidden" name="csrf-token" value="{{ csrf_token() }}">

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
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
    function findSchedule()
    {
        var schedule = document.querySelector('input[name="WasteSchedule"]:checked').value;
        var csrf_token = $('[name="csrf-token"]').val;
        if(schedule == 30) // 30 Schedule
        {
            $("#scheduledays").css("display",'block');
        }else{
            $("#scheduledays").css("display",'none');
        }
    }
</script>
<script>
    $(document).ready(function(){
        $('input[type="checkbox"]').click(function(){
            var scheduledays = [];
            $.each($("input[name='scheduledays[]']:checked"), function(){
                scheduledays.push($(this).val());
                if(scheduledays.length == 7){
                    $("input[name='scheduledays[]']").prop('checked', false); 
                    $("#scheduledays").css("display",'none');
                    $('input[name="WasteSchedule"][value="28"]').prop("checked",true); // 28 daily
                }
            });
            
        });
    });
</script>
