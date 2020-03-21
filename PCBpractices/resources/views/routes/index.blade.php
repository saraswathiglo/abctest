@extends('layouts.admin.app')

@section('content')

        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-end flex-wrap">
                        <div class="mr-md-3 mr-xl-5">
                            <h3>Routes List</h3>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-end flex-wrap">
                        <a href="{{ url('routes/create') }}">
                            <button class="btn btn-primary mt-2 mt-xl-0"> Add New Route </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Routes List</p>
                        <div class="table-responsive">
                            <table id="recent-purchases-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Route Name</th>
                                        <th>Start Point</th>
                                        <th>End Point</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($routes as $key => $route)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $route->RouteName }}</td>
                                        <td>{{ $route->StartPoint }}</td>
                                        <td>{{ $route->EndPoint }}</td>
                                        <td>
                                            <!-- <a href="{{ route('routes.show',$route->RouteId) }}" class="btn btn-primary btn-sm" title="VIEW" data-target="#routelocations">
                                                <span class="mdi mdi-eye"></span>
                                            </a> -->
                                            <input type="hidden" name="csrf-token" value="{{ csrf_token() }}">
                                            <a class="btn btn-primary btn-sm" title="VIEW" onclick="routesshow({{$route->RouteId}})">
                                                <span class="mdi mdi-eye"></span>
                                            </a>
                                            <a href="{{ route('routes.edit',$route->RouteId) }}" class="btn btn-warning btn-sm" title="EDIT">
                                                <span class="mdi mdi-tooltip-edit"></span>
                                            </a>
                                            <form action="{{ route('routes.destroy',$route->RouteId) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                                <button type="submit" class="btn btn-danger btn-sm" title="DELETE"><span class="mdi mdi-delete"></span></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
        <div id="routelocation" class="modal fade" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Route Locations</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" id="routelocationdata">
                    </div>
                </div>
            </div>
        </div>

<script type="text/javascript">
    function routesshow(RouteId)
    {
        var csrf_token = $('[name="csrf-token"]').val;
        $.ajax({
            url: '../routes/'+RouteId,
            //dataType: 'json' ,
            headers: {'X-CSRF-TOKEN':  csrf_token},
            type: 'GET',
            //data: form_data,
            success: function(data) {
                $("#routelocation").modal('show');
                $('#routelocationdata').html( data );
                console.log("","added successfully", "success");
            },
            error: function(data) {
                console.log("","Something Went Wrong with adding ", "error");
            }
        });
    }
</script>
            
