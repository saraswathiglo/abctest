@extends('layouts.admin.app')
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jscolor/2.0.4/jscolor.min.js" integrity="sha256-CJWfUCeP3jLdUMVNUll6yQx37gh9AKmXTRxvRf7jzro=" crossorigin="anonymous"></script>
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="mr-md-3 mr-xl-5">
                        <h3>{{ __('messages.Settings') }}</h3>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <a href="{{ url('admin/dashboard') }}">
                        <button class="btn btn-primary mt-2 mt-xl-0"> {{ __('messages.Dashboard') }}</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">{{ __('messages.Settings') }}</p>

                    <form method="POST" action="/" class="form-horizontal">
                        <div class="form-group">
                            <label>Theme Color</label>
                            <input class="jscolor">
                        </div>
                        <div class="form-group">
                            <label>Logo</label>
                            <input type="file" name="logo">
                        </div>
                        <div class="form-group">
                            <label>Small Logo(Mobile)</label>
                            <input type="file" name="mobilelogo">
                        </div>
                        <div class="form-group">
                            <label>Icon</label>
                            <input type="file" name="favicon">
                        </div>
                        <div class="form-group">
                            <label>Admin Image</label>
                            <input type="file" name="profileimage">
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label> </label>

                                <div>
                                    <button type="submit" name="submit" value="search" class="btn btn-primary"><i
                                                class="fa fa-fw fa-search"></i> Submit
                                    </button>
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