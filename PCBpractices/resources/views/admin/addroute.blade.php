@extends('layouts.admin.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel = "stylesheet" href = "http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css"/>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src = "http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="mr-md-3 mr-xl-5">
                        <h3>Route Management</h3>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <a href="{{ url('admin/RouteManagement') }}">
                        <button class="btn btn-primary mt-2 mt-xl-0"><< Back</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <form method="POST" action="#">
        {{csrf_field()}}
    <div class="row">
        <div class="col-md-6 stretch-card">

            <div class="card">
                <div class="card-body">

                    <p class="card-title">Add Route</p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Address</th>
                            </tr>
                        </thead>
                        <tbody id = "locations_data"></tbody>
                    </table>
                    <div class="form-group">
                        <label for="route_name">Route</label>
                        <!--<input type="text" class="form-control" name="route_name" placeholder="Route">-->
                        <select class="form-control" name="route_name">
                            @foreach($routes as $route)
                            <option value="{{$route->RouteId}}">{{ $route->RouteName }}</option>
                            @endforeach
                        </select>
                        <label for="route_name">Location</label>
                        <select class="form-control" name = "location" id = "location">
                            @foreach($locations as $location)
                            <option value="{{$location->BranchId}}">{{ $location->Location }}</option>
                            @endforeach
                        </select>

                        <butoon class="form-control btn btn-primary" id="addrow" type="button" name="add_location">Add Location</butoon>

                        <button type="button"  onclick= 'add_route()' class="btn btn-lg btn-success btn-block waves-effect waves-light">ADD ROUTE</button>

                    </div>




                    <!-- <div class="form-group">
                        <label for="s_address">Address</label>
                        <input type="text" class="form-control" id="s_address" name="s_address" placeholder="Route">
                        <input type="hidden" name="s_latitude" id="s_latitude"></input>
                        <input type="hidden" name="s_longitude" id="s_longitude"></input>
                    </div>

                    <select id="regemail1" class="form-control" name="vehicle" >
                        <option value="">vehicle 1</option>
                        <option>vehicle 2</option>
                        <option>vehicle 3</option>
                        <option>vehicle 4</option>
                    </select>
                    <select id="telephone1" class="form-control" name="driver" style="display:none;">
                        <option value="">Driver 1</option>
                        <option>Driver 2</option>
                        <option>Driver 3</option>
                        <option>Driver 4</option>
                    </select> -->
                    <!-- <div class="table-responsive">
                        <table id="myTable" class=" table order-list">
                            <thead>
                            <tr>
                                <td>Route</td>
                                <td>Serial</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="col-sm-4">
                                    <select class="form-control" id="route" name="route">
                                        <option value="17.430731,78.457404">Location 1</option>
                                        <option value="17.885437,80.850332">Location 2</option>
                                        <option value="17.442270,438.387762">Location 3</option>
                                        <option value="17.385044,78.486671">Location 4</option>
                                    </select>
                                </td>
                                <td class="col-sm-4">
                                    <input type="number" name="sequence"  class="form-control"/>
                                </td>

                                <td class="col-sm-2"><a class="deleteRow"></a>

                                </td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="5" style="text-align: left;">
                                    <input type="button" class="btn btn-lg btn-block " id="addrow" value="Add Row" onclick="setmap()"/>
                                </td>
                            </tr>
                            <tr>
                            </tr>
                            </tfoot>
                        </table>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="col-md-6 stretch-card" id = "map" ></div>
    </div>
    </form>

    <script>
        var mapOptions = {
            center: [16.506174, 80.648015],
            zoom: 7
        };

        var map = new L.map('map', mapOptions);


        var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
        map.addLayer(layer);

        map.on("click", function(e){
            new L.Marker([e.latlng.lat, e.latlng.lng]).addTo(map);
        });
        var scale = L.control.scale();
        scale.addTo(map);

        function setmap()
        {
            var latlang= document.getElementById('route').value;
            latlang=latlang.split(",");
            var lat=latlang[0];
            var lang=latlang[1];
            var marker = L.marker([lat,lang]);
            marker.addTo(map);
        }
    </script>
        <script>
        function yesnoCheck() {
            if (document.getElementById('yesCheck').checked) {
                document.getElementById('regemail1').style.display = 'block';
                document.getElementById('telephone1').style.display = 'none';
                document.getElementById('telephone1').value="";
            }
            else
            {
                document.getElementById('telephone1').style.display = 'block';
                document.getElementById('regemail1').style.display = 'none';
                document.getElementById('regemail1').value="";
            }

        }
        var s_no = 0;
        var counter = 0;
        var locations = [];
        $(document).ready(function () {
            
            $("#addrow").on("click", function () {
                var location_name = $('#location').find('option:selected').text();
                var location_id = $('#location').val();
                //alert(location_id);
                ++s_no;
                var loc = { "loc_id": location_id, "loc_name": location_name}
                locations.push(loc);
                //console.log(locations);
                var new_row = "<tr id = '"+ s_no +"'><td>" + location_name + "</td>" +
                "<td><a href = 'javascript:delet_location("+s_no+")'>" +
                "<i  class='fa fa-trash-o' style='font-size:35px;color:red'></i>" +
                "del</a></td></tr>";
                $("#locations_data").append(new_row);

            });



            $("table.order-list").on("click", ".ibtnDel", function (event) {
                $(this).closest("tr").remove();
                counter -= 1
            });


        });

        function delet_location(s_no)
        {
            var row = document.getElementById(s_no);
            row.parentNode.removeChild(row);
            for( var i = 0; i < locations.length; i++){
                var row2 = locations[i] ;
                if(row2.s_no == s_no){
                    locations.splice(i, 1);
                }
            }
            console.log(locations);
        }

        function add_route(){
            //var route_name = document.getElementById("route_name").value;
            var route_name = $('#location').find('option:selected').val();
            //var special_note = document.getElementById("special_note").value;
            route_name = route_name.trim();
            //special_note = special_note.trim();
             var csrf_token = $('meta[name="csrf-token"]').attr('content');
            if(route_name.length === 0){
                console.log("","Please Enter Route Name", "error");
            }
            else{
                if(locations.length < 2 ){
                    console.log("","Please Enter atleast two droping points", "error");
                }
                else{
                    var form_data = {
                        "route_name" : route_name,
                        "locations" : locations,
                        //"special_note" : special_note
                    }
                    console.log(form_data);
                    $.ajax({
                        // url: base_path+'/fleet/add_route',
                        url: '../admin/routelocations',
                        dataType: 'json' ,
                        //headers: {'X-CSRF-TOKEN': 'test'},
                        //headers: {'X-CSRF-TOKEN': window.Laravel.csrfToken },
                        headers: {'X-CSRF-TOKEN':  csrf_token},

                        type: 'POST',
                        data: form_data,
                        success: function(data) {
                            //console.log(data);
                            console.log("","added successfully", "success");
                            alert('Location added');
                            // window.location.replace('../fleet/add_route');
                        },
                        error: function(data) {
                           // console.log(data);
                            console.log("","Something Went Wrong with adding ", "error");
                        }
                    });
                    //console.log(data);
                }
                //console.log("","added", "success");
            }
        }



        function calculateRow(row) {
            var price = +row.find('input[name^="price"]').val();

        }

        function calculateGrandTotal() {
            var grandTotal = 0;
            $("table.order-list").find('input[name^="price"]').each(function () {
                grandTotal += +$(this).val();
            });
            $("#grandtotal").text(grandTotal.toFixed(2));
        }
    </script>

@endsection
