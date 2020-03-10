/***************************
 All Common Funciton here
 ****************************/
var  source_latitude=0, source_longitude=0;

var map, mapMarkers = [];
var googleMarkers = [];
var source, destination;
var infowindow;

var s_input, d_input;
var s_latitude, s_longitude;
var distance;
var index;

var ride_form = $('#form-create-ride');
s_input = document.getElementById('s_address');
d_input = document.getElementById('d_address');

s_latitude = document.getElementById('s_latitude');
s_longitude = document.getElementById('s_longitude');

distance = document.getElementById('distance');

var s_no = 0;
var ajaxMarkers = [];
var locations = [];
var loc_no;

function initMap() {
    // navigator.geolocation.getCurrentPosition(function(position) {
        var latitiude2		 =	17.3850;
        var longitude2     =	78.4867;
        // var latitiude2 = position.coords.latitude;
        // var longitude2 = position.coords.longitude;

        map = new google.maps.Map(document.getElementById('map'), {
            mapTypeControl: false,
            zoomControl: true,
            center: {lat: parseInt(latitiude2), lng: parseInt(longitude2)},
            zoom: 9,
            styles : [{"elementType":"geometry","stylers":[{"color":"#f5f5f5"}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"elementType":"labels.text.fill","stylers":[{"color":"#616161"}]},{"elementType":"labels.text.stroke","stylers":[{"color":"#f5f5f5"}]},{"featureType":"administrative.land_parcel","elementType":"labels.text.fill","stylers":[{"color":"#bdbdbd"}]},{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"color":"#e4e8e9"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#eeeeee"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"color":"#757575"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#e5e5e5"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#7de843"}]},{"featureType":"poi.park","elementType":"labels.text.fill","stylers":[{"color":"#9e9e9e"}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#ffffff"}]},{"featureType":"road.arterial","elementType":"labels.text.fill","stylers":[{"color":"#757575"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#dadada"}]},{"featureType":"road.highway","elementType":"labels.text.fill","stylers":[{"color":"#616161"}]},{"featureType":"road.local","elementType":"labels.text.fill","stylers":[{"color":"#9e9e9e"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"color":"#e5e5e5"}]},{"featureType":"transit.station","elementType":"geometry","stylers":[{"color":"#eeeeee"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#c9c9c9"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#9bd0e8"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#9e9e9e"}]}]
        });

        marker = new google.maps.Marker({
            map: map,
            draggable: true,
            anchorPoint: new google.maps.Point(0, -29),
            icon: base_path+'/asset/img/c.png'
        });

        // markerSecond = new google.maps.Marker({
        //     map: map,
        //     draggable: true,
        //     anchorPoint: new google.maps.Point(0, -29),
        //     icon: base_path+'/asset/img/d.png'
        // });

        var autosearch_place_source;
        autosearch_place_source = new google.maps.places.Autocomplete((s_input), {
            types: ['geocode'],
        });

        google.maps.event.addListener(autosearch_place_source, 'place_changed', function () {
            var near_place = autosearch_place_source.getPlace();
            s_latitude.value = near_place.geometry.location.lat();
            s_longitude.value = near_place.geometry.location.lng();
        });
    // });


}

function initMap1() {
	var current_lat		 =	28.535517;
	var current_long     =	77.391029;
	navigator.geolocation.getCurrentPosition(function(position) {

        var latitiude2 = position.coords.latitude;
        var longitude2 = position.coords.longitude;
	alert(latitiude2);
        map = new google.maps.Map(document.getElementById('map'), {
            mapTypeControl: false,
            zoomControl: true,
            center: {lat: parseInt(latitiude2), lng: parseInt(longitude2)},
            zoom: 9,
            styles : [{"elementType":"geometry","stylers":[{"color":"#f5f5f5"}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"elementType":"labels.text.fill","stylers":[{"color":"#616161"}]},{"elementType":"labels.text.stroke","stylers":[{"color":"#f5f5f5"}]},{"featureType":"administrative.land_parcel","elementType":"labels.text.fill","stylers":[{"color":"#bdbdbd"}]},{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"color":"#e4e8e9"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#eeeeee"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"color":"#757575"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#e5e5e5"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#7de843"}]},{"featureType":"poi.park","elementType":"labels.text.fill","stylers":[{"color":"#9e9e9e"}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#ffffff"}]},{"featureType":"road.arterial","elementType":"labels.text.fill","stylers":[{"color":"#757575"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#dadada"}]},{"featureType":"road.highway","elementType":"labels.text.fill","stylers":[{"color":"#616161"}]},{"featureType":"road.local","elementType":"labels.text.fill","stylers":[{"color":"#9e9e9e"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"color":"#e5e5e5"}]},{"featureType":"transit.station","elementType":"geometry","stylers":[{"color":"#eeeeee"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#c9c9c9"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#9bd0e8"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#9e9e9e"}]}]
        });

        marker = new google.maps.Marker({
            map: map,
            draggable: true,
            anchorPoint: new google.maps.Point(0, -29),
            icon: base_path+'/asset/img/c.png'
        });

        // markerSecond = new google.maps.Marker({
        //     map: map,
        //     draggable: true,
        //     anchorPoint: new google.maps.Point(0, -29),
        //     icon: base_path+'/asset/img/d.png'
        // });

        var autosearch_place_source;
        autosearch_place_source = new google.maps.places.Autocomplete((s_input), {
            types: ['geocode'],
        });

        google.maps.event.addListener(autosearch_place_source, 'place_changed', function () {
            var near_place = autosearch_place_source.getPlace();
            s_latitude.value = near_place.geometry.location.lat();
            s_longitude.value = near_place.geometry.location.lng();
        });
    });


}

function add_location(){

    var s_lat = document.getElementById("s_latitude").value;
    var s_lang = document.getElementById("s_longitude").value;
    var s_address = document.getElementById("s_address").value;
    if(s_lat.length !== 0 && s_lang.length !== 0 && s_address.length !== 0){
        ++s_no;
        var loc = {"loc_no": s_no, "lat": s_lat, "lang": s_lang, "s_address": s_address}
        locations.push(loc);

        var new_row = "<tr id = '"+ s_no +"'><td>" + s_address + "</td>" +
            "<td><a href = 'javascript:delet_location("+s_no+")'>" +
            "<i  class='fa fa-trash-o' style='font-size:35px;color:red'></i>" +
            "</a></td></tr>";
        $("#locations_data").append(new_row);
        document.getElementById("s_latitude").value = "";
        document.getElementById("s_longitude").value = "";
        document.getElementById("s_address").value = "";
    }else{
        swal("","Please enter any location", "error");
    }

}

function add_route(){
    var route_name = document.getElementById("route_name").value;
    var special_note = document.getElementById("special_note").value;
    route_name = route_name.trim();
    special_note = special_note.trim();
    if(route_name.length === 0){
        swal("","Please Enter Route Name", "error");
    }
    else{
        if(locations.length < 2 ){
            swal("","Please Enter atleast two droping points", "error");
        }
        else{
            var form_data = {
                "route_name" : route_name,
                "locations" : locations,
                "special_note" : special_note
            }
            $.ajax({
                // url: base_path+'/fleet/add_route',
                url: '../fleet/add_route',
                dataType: 'json' ,
                headers: {'X-CSRF-TOKEN': window.Laravel.csrfToken },
                type: 'POST',
                data: form_data,
                success: function(data) {
                    console.log(data);
                    swal("","added successfully", "success");

                    // window.location.replace('../fleet/add_route');
                },
                error: function(data) {
                    console.log(data);
                    swal("","Something Went Wrong with adding ", "error");
                }
            });
            console.log(data);
        }
        //swal("","added", "success");
    }
}

function delet_location(loc_no){
    var row = document.getElementById(loc_no);
    row.parentNode.removeChild(row);
    for( var i = 0; i < locations.length; i++){
        var row2 = locations[i] ;
        if(row2.loc_no == loc_no){
            locations.splice(i, 1);
        }
    }
    console.log(locations);
}



