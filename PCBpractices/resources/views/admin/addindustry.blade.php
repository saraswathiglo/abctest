@extends('layouts.admin.app')

@section('content')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style type="text/css">

        #map { width:100%;height:100%;padding:0;margin:0; }
        .address { cursor:pointer }
        .address:hover { color:#AA0000;text-decoration:underline }
    </style>
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="mr-md-3 mr-xl-5">
                        <h3>Add Waste Generator</h3>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <a href="{{ url('admin/WasteGenerators') }}">
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
                    {{--<p class="card-title">Add Industry</p>--}}

                    <form method="POST" action="/" class="form-horizontal">
                        <div class="row">
                            <div class="col-md-3">
                            <label>Waste Generator Name</label>
                            <input type="text" name="industry_name" class="form-control"
                                   placeholder="Enter Generator Name">
                            </div>
                            <div class="col-md-3">
                                <label for="industry_type">Waste Generator Type</label>
                                <select name="industry_type" class="form-control" id="industry_type">
                                    <option value=""> --Select Generator Type --</option>
                                    <option value="1">Type1</option>
                                    <option value="2">Type2</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label>Phone Number</label>
                                <input type="number" name="telephone" class="form-control"
                                       placeholder="Phone Number">
                            </div>
                            <div class="col-md-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control"
                                       placeholder="Email">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <label>Location</label>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                    <input type="text" name="addr" value="" class="form-control" list="results" id="addr" size="58" onkeydown="addr_search(this.value);" placeholder="Enter Your Location"/>
                                        <datalist id="results">

                                        </datalist>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="row">
                                        <div class="col-md-6">
                                            {{--<label>Latitude</label>--}}
                                            <input type="text" name="lat" id="lat" class="form-control" value="" style="display: none;">

                                        </div>
                                        <div class="col-md-6">
                                            {{--<label>Longitude</label>--}}
                                            <input type="text" name="lon" id="lon" class="form-control" value="" style="display: none;">
                                        </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div id="map"></div>
                            </div>

                        </div>
                        <div class="clearfix"></div>
                        <label>Branch Locations</label>
                        <div class="row">
                            <div class="col-md-12">
                                <table id="myTable" class="branch-list">

                                    <tbody>
                                    <tr>
                                        <td class="col-sm-2">
                                            <input type="text" name="name" class="form-control" placeholder="Name"/>
                                        </td>
                                        <td class="col-sm-2">
                                            <input type="email" name="lat"  class="form-control" placeholder="Latitude"/>
                                        </td>
                                        <td class="col-sm-2">
                                            <input type="text" name="long"  class="form-control" placeholder="Longitude"/>
                                        </td><br>
                                        <td class="col-sm-3">
                                            <input type="email" name="mail"  class="form-control" placeholder="Email"/>
                                        </td>
                                        <td class="col-sm-2">
                                            <input type="text" name="phone"  class="form-control" placeholder="phone"/>
                                        </td>
                                        <td class="col-sm-1"><a class="deleteRow"></a>
                                            <input type="button" class="btn btn-primary" id="addrow" value="+" />
                                        </td>


                                    </tr>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <div class="clearfix"></div>

<br>
                        <div class="row">
                                <div class="col-sm-6" style="text-align: right;">
                                    <button type="submit" name="submit" value="search" class="btn btn-primary"><i
                                                class="fa fa-fw fa-search"></i> Submit
                                    </button>
                                </div>
                                <div class="col-sm-6">
                                    <a href="#" class="btn btn-danger"><i class="fa fa-fw fa-sync"></i> Clear</a>
                                </div>
                            </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">

        // New York
        var startlat = 14.52038960;
        var startlon = 75.72235210;

        var options = {
            center: [startlat, startlon],
            zoom: 9
        }

//        document.getElementById('lat').value = startlat;
//        document.getElementById('lon').value = startlon;

        var map = L.map('map', options);
        var nzoom = 12;

        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {attribution: 'OSM'}).addTo(map);

        var myMarker = L.marker([startlat, startlon], {title: "Coordinates", alt: "Coordinates", draggable: true}).addTo(map).on('dragend', function() {
            var lat = myMarker.getLatLng().lat.toFixed(8);
            var lon = myMarker.getLatLng().lng.toFixed(8);
            var czoom = map.getZoom();
            if(czoom < 18) { nzoom = czoom + 2; }
            if(nzoom > 18) { nzoom = 18; }
            if(czoom != 18) { map.setView([lat,lon], nzoom); } else { map.setView([lat,lon]); }
            document.getElementById('lat').value = lat;
            document.getElementById('lon').value = lon;
            myMarker.bindPopup("Lat " + lat + "<br />Lon " + lon).openPopup();
        });

        function chooseAddr(lat1, lng1)
        {
            myMarker.closePopup();
            map.setView([lat1, lng1],18);
            myMarker.setLatLng([lat1, lng1]);
            lat = lat1.toFixed(8);
            lon = lng1.toFixed(8);
            document.getElementById('lat').value = lat;
            document.getElementById('lon').value = lon;
            myMarker.bindPopup("Lat " + lat + "<br />Lon " + lon).openPopup();
        }

        function myFunction(arr)
        {
            var out = "<br />";
            var i;

            if(arr.length > 0)
            {
                for(i = 0; i < arr.length; i++)
                {
                    out += "<div class='address' title='Show Location and Coordinates' onclick='chooseAddr(" + arr[i].lat + ", " + arr[i].lon + ");return false;'>" + arr[i].display_name + "</div>";
                }
                document.getElementById('results').innerHTML = out;
            }
            else
            {
                document.getElementById('results').innerHTML = "Sorry, no results...";
            }

        }

        function addr_search(addr)
        {

            var inp = addr;
//            alert(inp);
            var xmlhttp = new XMLHttpRequest();
            var url = "https://nominatim.openstreetmap.org/search?format=json&limit=3&q=" + inp;
            xmlhttp.onreadystatechange = function()
            {
                if (this.readyState == 4 && this.status == 200)
                {
                    var myArr = JSON.parse(this.responseText);
                    myFunction(myArr);
                }
            };
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }
        $(document).ready(function () {
            var counter = 0;


            $("#addrow").on("click", function () {
                var newRow = $("<tr>");
                var cols = "";

                cols += '<td class="col-sm-2"><input type="text" class="form-control" name="name' + counter + '" placeholder="Name"/></td>';
                cols += '<td class="col-sm-2"><input type="text" class="form-control" name="mail' + counter + '" placeholder="Latitude"/></td>';
                cols += '<td class="col-sm-2"><input type="text" class="form-control" name="phone' + counter + '" placeholder="longitude"/></td>';
                cols += '<td class="col-sm-3"><input type="text" class="form-control" name="lat' + counter + '" placeholder="Email"/></td>';
                cols += '<td class="col-sm-2"><input type="text" class="form-control" name="long' + counter + '" placeholder="Phone"/></td>';

                cols += '<td class="col-sm-1"><input type="button" class="ibtnDel btn btn-md btn-danger "  value="X"></td>';
                newRow.append(cols);
                $("table.branch-list").append(newRow);
                counter++;
            });



            $("table.branch-list").on("click", ".ibtnDel", function (event) {
                $(this).closest("tr").remove();
                counter -= 1
            });



        });
    </script>
@endsection