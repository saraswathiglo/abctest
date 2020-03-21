        <div class="row">
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Route Locations</p>
                        <div class="table-responsive">
                            <table id="recent-purchases-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Pickup Point</th>
                                        <th>Location</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($route_locations as $key => $route_location)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $route_location->BranchName }}</td>
                                        <td>{{ $route_location->Location }}</td>
                                        <td>{{ $route_location->Latitude }}</td>
                                        <td>{{ $route_location->Longitude }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>