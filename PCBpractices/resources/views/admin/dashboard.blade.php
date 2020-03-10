@extends('layouts.admin.app')

@section('content')
    <div class="container">


            {{--<div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="d-flex justify-content-between flex-wrap">
                        <div class="d-flex align-items-end flex-wrap">
                            <div class="d-flex">

                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-end flex-wrap">
                            <i class="mdi mdi-home text-muted hover-cursor"></i>
                            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
                            <p class="text-primary mb-0 hover-cursor">Analytics</p>
                        </div>
                    </div>
                </div>
            </div>--}}
           {{-- <div class="row">
            <div class="col-md-3">
                <div class="dbox dbox--color-1">
                    --}}{{--<div class="dbox__icon">
                        <i class="glyphicon glyphicon-cloud"></i>
                    </div>--}}{{--
                    <div class="dbox__body">
                        <span class="dbox__count">10</span>
                        <span class="dbox__title">Waste Generators</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="dbox dbox--color-2">
                    --}}{{--<div class="dbox__icon">
                        <i class="glyphicon glyphicon-cloud"></i>
                    </div>--}}{{--
                    <div class="dbox__body">
                        <span class="dbox__count">5</span>
                        <span class="dbox__title">Waste Disposal Facility</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="dbox dbox--color-3">
                    --}}{{--<div class="dbox__icon">
                        <i class="glyphicon glyphicon-download"></i>
                    </div>--}}{{--
                    <div class="dbox__body">
                        <span class="dbox__count">100</span>
                        <span class="dbox__title">Vehicles</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="dbox dbox--color-4">
                   --}}{{-- <div class="dbox__icon">
                        <i class="glyphicon glyphicon-heart"></i>
                    </div>--}}{{--
                    <div class="dbox__body">
                        <span class="dbox__count">25</span>
                        <span class="dbox__title">Transporters</span>
                    </div>
                </div>
            </div>
        </div>--}}

        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-end flex-wrap">
                        <div class="d-flex">
                            <i class="mdi mdi-home text-muted hover-cursor"></i>
                            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;{{ __('messages.Dashboard') }}&nbsp;/&nbsp;</p>
                            <p class="text-primary mb-0 hover-cursor">{{ __('messages.Analytics') }}</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-end flex-wrap">
                        <button type="button" class="btn btn-light bg-white btn-icon mr-3 d-none d-md-block ">
                            <i class="mdi mdi-download text-muted"></i>
                        </button>
                        <button type="button" class="btn btn-light bg-white btn-icon mr-3 mt-2 mt-xl-0">
                            <i class="mdi mdi-clock-outline text-muted"></i>
                        </button>
                        <button type="button" class="btn btn-light bg-white btn-icon mr-3 mt-2 mt-xl-0">
                            <i class="mdi mdi-plus text-muted"></i>
                        </button>
                        <button class="btn btn-primary mt-2 mt-xl-0">{{ __('messages.GenerateReport') }}</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body dashboard-tabs p-0">
                        <ul class="nav nav-tabs px-4" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">{{ __('messages.WasteTypes') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="sales-tab" data-toggle="tab" href="#sales" role="tab" aria-controls="sales" aria-selected="false">{{ __('messages.Employees') }}</a>
                            </li>
                            {{--<li class="nav-item">
                                <a class="nav-link" id="purchases-tab" data-toggle="tab" href="#purchases" role="tab" aria-controls="purchases" aria-selected="false">Purchases</a>
                            </li>--}}
                        </ul>
                        <div class="tab-content py-0 px-0">
                            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                                <div class="d-flex flex-wrap justify-content-xl-between">
                                    <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                        <i class="mdi mdi-calendar-heart icon-lg mr-3 text-primary"></i>
                                        <div class="d-flex flex-column justify-content-around">
                                            <small class="mb-1 text-muted">{{ __('messages.StartDate') }}</small>
                                            <div class="dropdown">
                                                <a class="btn btn-secondary dropdown-toggle p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium" href="#" role="button" id="dropdownMenuLinkA" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <h5 class="mb-0 d-inline-block">26 Jul 2018</h5>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkA">
                                                    <a class="dropdown-item" href="#">12 Aug 2018</a>
                                                    <a class="dropdown-item" href="#">22 Sep 2018</a>
                                                    <a class="dropdown-item" href="#">21 Oct 2018</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                        <i class="mdi  mdi-currency-inr mr-3 icon-lg text-danger"></i>
                                        <div class="d-flex flex-column justify-content-around">
                                            <small class="mb-1 text-muted">{{ __('messages.Revenue') }}</small>
                                            <h5 class="mr-2 mb-0">₹577545</h5>
                                        </div>
                                    </div>
                                    <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                        <i class="mdi mdi-eye mr-3 icon-lg text-success"></i>
                                        <div class="d-flex flex-column justify-content-around">
                                            <small class="mb-1 text-muted">{{ __('messages.TotalViews') }}</small>
                                            <h5 class="mr-2 mb-0">9833550</h5>
                                        </div>
                                    </div>
                                    <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                        <i class="mdi mdi-download mr-3 icon-lg text-warning"></i>
                                        <div class="d-flex flex-column justify-content-around">
                                            <small class="mb-1 text-muted">{{ __('messages.Downloads') }}</small>
                                            <h5 class="mr-2 mb-0">2233783</h5>
                                        </div>
                                    </div>
                                    <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                        <i class="mdi mdi-flag mr-3 icon-lg text-danger"></i>
                                        <div class="d-flex flex-column justify-content-around">
                                            <small class="mb-1 text-muted">{{ __('messages.Flagged') }}</small>
                                            <h5 class="mr-2 mb-0">3497843</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="sales" role="tabpanel" aria-labelledby="sales-tab">
                                <div class="d-flex flex-wrap justify-content-xl-between">
                                    <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                        <i class="mdi mdi-calendar-heart icon-lg mr-3 text-primary"></i>
                                        <div class="d-flex flex-column justify-content-around">
                                            <small class="mb-1 text-muted">{{ __('messages.StartDate') }}</small>
                                            <div class="dropdown">
                                                <a class="btn btn-secondary dropdown-toggle p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium" href="#" role="button" id="dropdownMenuLinkA" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <h5 class="mb-0 d-inline-block">26 Jul 2018</h5>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkA">
                                                    <a class="dropdown-item" href="#">12 Aug 2018</a>
                                                    <a class="dropdown-item" href="#">22 Sep 2018</a>
                                                    <a class="dropdown-item" href="#">21 Oct 2018</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                        <i class="mdi mdi-download mr-3 icon-lg text-warning"></i>
                                        <div class="d-flex flex-column justify-content-around">
                                            <small class="mb-1 text-muted">{{ __('messages.Downloads') }}</small>
                                            <h5 class="mr-2 mb-0">2233783</h5>
                                        </div>
                                    </div>
                                    <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                        <i class="mdi mdi-eye mr-3 icon-lg text-success"></i>
                                        <div class="d-flex flex-column justify-content-around">
                                            <small class="mb-1 text-muted">{{ __('messages.TotalViews') }}</small>
                                            <h5 class="mr-2 mb-0">9833550</h5>
                                        </div>
                                    </div>
                                    <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                        <i class="mdi  mdi-currency-inr mr-3 icon-lg text-danger"></i>
                                        <div class="d-flex flex-column justify-content-around">
                                            <small class="mb-1 text-muted">{{ __('messages.Revenue') }}</small>
                                            <h5 class="mr-2 mb-0">₹577545</h5>
                                        </div>
                                    </div>
                                    <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                        <i class="mdi mdi-flag mr-3 icon-lg text-danger"></i>
                                        <div class="d-flex flex-column justify-content-around">
                                            <small class="mb-1 text-muted">{{ __('messages.Flagged') }}</small>
                                            <h5 class="mr-2 mb-0">3497843</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="purchases" role="tabpanel" aria-labelledby="purchases-tab">
                                <div class="d-flex flex-wrap justify-content-xl-between">
                                    <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                        <i class="mdi mdi-calendar-heart icon-lg mr-3 text-primary"></i>
                                        <div class="d-flex flex-column justify-content-around">
                                            <small class="mb-1 text-muted">{{ __('messages.StartDate') }}</small>
                                            <div class="dropdown">
                                                <a class="btn btn-secondary dropdown-toggle p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium" href="#" role="button" id="dropdownMenuLinkA" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <h5 class="mb-0 d-inline-block">26 Jul 2018</h5>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkA">
                                                    <a class="dropdown-item" href="#">12 Aug 2018</a>
                                                    <a class="dropdown-item" href="#">22 Sep 2018</a>
                                                    <a class="dropdown-item" href="#">21 Oct 2018</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                        <i class="mdi  mdi-currency-inr mr-3 icon-lg text-danger"></i>
                                        <div class="d-flex flex-column justify-content-around">
                                            <small class="mb-1 text-muted">{{ __('messages.Revenue') }}</small>
                                            <h5 class="mr-2 mb-0">₹577545</h5>
                                        </div>
                                    </div>
                                    <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                        <i class="mdi mdi-eye mr-3 icon-lg text-success"></i>
                                        <div class="d-flex flex-column justify-content-around">
                                            <small class="mb-1 text-muted">{{ __('messages.TotalViews') }}</small>
                                            <h5 class="mr-2 mb-0">9833550</h5>
                                        </div>
                                    </div>
                                    <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                        <i class="mdi mdi-download mr-3 icon-lg text-warning"></i>
                                        <div class="d-flex flex-column justify-content-around">
                                            <small class="mb-1 text-muted">{{ __('messages.Downloads') }}</small>
                                            <h5 class="mr-2 mb-0">2233783</h5>
                                        </div>
                                    </div>
                                    <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                        <i class="mdi mdi-flag mr-3 icon-lg text-danger"></i>
                                        <div class="d-flex flex-column justify-content-around">
                                            <small class="mb-1 text-muted">{{ __('messages.Flagged') }}</small>
                                            <h5 class="mr-2 mb-0">3497843</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">{{ __('messages.WasteDeposits') }}</p>
                        <p class="mb-4">To start a blog, think of a topic about and first brainstorm party is ways to write details</p>
                        <div id="cash-deposits-chart-legend" class="d-flex justify-content-center pt-3"></div>
                        <canvas id="cash-deposits-chart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-5 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">{{ __('messages.TotalCollections') }}</p>
                        <h1>500</h1>
                        <h4></h4>
                        <div id="total-sales-chart-legend"></div>
                    </div>
                    <canvas id="total-sales-chart"></canvas>
                </div>
            </div>
        </div>
        <div class="row"  style="margin-bottom: 20px;">
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">{{ __('messages.RecentCollections') }}</p>
                        <div class="table-responsive">
                            <table id="recent-purchases-listing" class="table">
                                <thead>
                                <tr>
                                    <th>{{ __('messages.WasteGenerator') }}</th>
                                    <th>{{ __('messages.WasteType') }}</th>
                                    <th>{{ __('messages.StatusReport') }}</th>
                                    <th>{{ __('messages.Weight(inKGs)') }}</th>
                                    <th>{{ __('messages.Price') }}</th>
                                    <th>{{ __('messages.Date') }}</th>
                                    <th>{{ __('messages.GrossAmount') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Jeremy Ortega</td>
                                    <td>Bio-Medical</td>
                                    <td>Processing</td>
                                    <td>5</td>
                                    <td>₹790</td>
                                    <td>06 Jan 2018</td>
                                    <td>₹2274253</td>
                                </tr>
                                <tr>
                                    <td>Alvin Fisher</td>
                                    <td>Solid</td>
                                    <td>Initiated</td>
                                    <td>100</td>
                                    <td>₹23230</td>
                                    <td>18 Jul 2018</td>
                                    <td>₹83127</td>
                                </tr>
                                <tr>
                                    <td>Emily Cunningham</td>
                                    <td>Bio-Medical</td>
                                    <td>completed</td>
                                    <td>18</td>
                                    <td>₹939</td>
                                    <td>16 Jul 2018</td>
                                    <td>₹29177</td>
                                </tr>
                                <tr>
                                    <td>Minnie Farmer</td>
                                    <td>Bio-Medical</td>
                                    <td>Transporting</td>
                                    <td>5</td>
                                    <td>₹30</td>
                                    <td>30 Apr 2018</td>
                                    <td>₹44617</td>
                                </tr>
                                <tr>
                                    <td>Betty Hunt</td>
                                    <td>solid</td>
                                    <td>Completed</td>
                                    <td>10</td>
                                    <td>₹571</td>
                                    <td>25 Jun 2018</td>
                                    <td>₹78952</td>
                                </tr>
                                <tr>
                                    <td>Myrtie Lambert</td>
                                    <td>Bio-Medical</td>
                                    <td>Initiated</td>
                                    <td>2</td>
                                    <td>₹36</td>
                                    <td>05 Nov 2018</td>
                                    <td>₹36422</td>
                                </tr>
                                <tr>
                                    <td>Jacob Kennedy</td>
                                    <td>Solid</td>
                                    <td>completed</td>
                                    <td>Cletaborough</td>
                                    <td>₹314</td>
                                    <td>12 Jul 2018</td>
                                    <td>₹34167</td>
                                </tr>
                                <tr>
                                    <td>Ernest Wade</td>
                                    <td>Bio-Medical</td>
                                    <td>Transporting</td>
                                    <td>10</td>
                                    <td>₹484</td>
                                    <td>08 Sep 2018</td>
                                    <td>₹50862</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection