@extends('layouts.admin.app')

@section('content')

        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-end flex-wrap">
                        <div class="mr-md-3 mr-xl-5">
                            <h3>Panchayatee List</h3>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-end flex-wrap">
                        <a href="{{ url('panchayatee/create') }}">
                            <button class="btn btn-primary mt-2 mt-xl-0"> Add New Panchayatee </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Panchayatee List</p>
                        <div class="table-responsive">
                            <table id="recent-purchases-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>                                        
                                        <th>District Name</th>
                                        <th>Taluka Name</th>
                                        <th>Panchayatee Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($panchayatees as $key => $panchayatee)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $panchayatee->DistrictId }}</td>
                                        <td>{{ $panchayatee->TalukaId }}</td>
                                        <td>{{ $panchayatee->PanchayteeName }}</td>
                                        <td>
                                            <a href="{{ route('panchayatee.show',$panchayatee->PanchayteeId) }}" class="btn btn-primary btn-sm" title="VIEW">
                                                <span class="mdi mdi-eye"></span>
                                            </a>
                                            <a href="{{ route('panchayatee.edit',$panchayatee->PanchayteeId) }}" class="btn btn-warning btn-sm" title="EDIT">
                                                <span class="mdi mdi-tooltip-edit"></span>
                                            </a>
                                            <form action="{{ route('panchayatee.destroy',$panchayatee->PanchayteeId) }}" method="POST">
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