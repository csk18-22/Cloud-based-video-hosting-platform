@extends('layouts.app')

@section('content')

<div class="container home-container">
    
@if ($message = Session::get('success'))
                <div style="text-align: center;" class="col-md-12 mt-3 alert alert-success alert-block">
                    <strong>{{ $message }}</strong>
                </div>
                @endif
@if ($message = Session::get('error'))

                        <div style="text-align: center;" class="col-md-12 mt-3 alert alert-danger alert-block">
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif

    <!-- overview -->
    <p class="overview-heading">Overview</p>
    <div class="row">
        <div class="col-lg col-md-5 col-sm-5 views">
            <p>Views</p>
            <!-- DATA -->
            <span>1.5K</span>
        </div>
        <div class="col-lg col-md-6 col-sm-5 mins-watched">
            <p>Minutes Watched</p>
            <!-- DATA -->
            <span>1.5K</span>
        </div>
        <div class="col-lg col-md-5 col-sm-5 data-usage">
            <p>Data Usage</p>
            <!-- DATA -->
            <span>1.5K</span>
        </div>
        <div class="col-lg col-md-6 col-sm-5 storage-usage">
            <p>Storage Used</p>
            <!-- DATA -->
            <span>1.5K</span>
        </div>
    </div>

    <!-- top videos -->
    <p class="top-videos-heading">Top Videos</p>
    <div class="row">

        <div class="row top-videos">
            <div class="col-lg video-title-col">
                <!-- Video -->

                <!-- <img class="image" src="data:image/jpeg;base64,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" alt="" width="30" height="30"> -->

                <p class="video-title">Video Title</p>
                <span class="video-category">Video Category</span>
                <p class="icons">
                    <img src="https://img.icons8.com/material-outlined/18/000000/visible--v1.png" />
                    <span class="views-count">1.3K</span>

                    <img src="https://img.icons8.com/material-outlined/18/000000/download--v1.png" />
                    <span class="downloads">5K</span>
                </p>
            </div>
            <div class="col-lg video-title-col">
                <!-- Video -->
                <p class="video-title">Video Title</p>
                <span class="video-category">Video Category</span>
                <p class="icons">
                    <img src="https://img.icons8.com/material-outlined/18/000000/visible--v1.png" />
                    <span class="views-count">1.3K</span>

                    <img src="https://img.icons8.com/material-outlined/18/000000/download--v1.png" />
                    <span class="downloads">5K</span>
                </p>
            </div>
            <div class="col-lg video-title-col">
                <!-- Video -->
                <p class="video-title">Video Title</p>
                <span class="video-category">Video Category</span>
                <p class="icons">
                    <img src="https://img.icons8.com/material-outlined/18/000000/visible--v1.png" />
                    <span class="views-count">1.3K</span>

                    <img src="https://img.icons8.com/material-outlined/18/000000/download--v1.png" />
                    <span class="downloads">5K</span>
                </p>
            </div>
            <div class="col-lg video-title-col">
                <!-- Video -->
                <p class="video-title">Video Title</p>
                <span class="video-category">Video Category</span>
                <p class="icons">
                    <img src="https://img.icons8.com/material-outlined/18/000000/visible--v1.png" />
                    <span class="views-count">1.3K</span>

                    <img src="https://img.icons8.com/material-outlined/18/000000/download--v1.png" />
                    <span class="downloads">5K</span>
                </p>
            </div>
        </div>

        <div class="sessions-by-device">
            <p>Sessions By Device</p>
            <span>Last 7 Days</span>
            <!-- DATA -->
        </div>
    </div>

    <div class="row">
        <div class="categories">
            <p>Categories</p>
            <div class="categories-div">
                <span class="total">Total</span>
                <!-- data -->
                <h2>2,76k</h2>
            </div>
        </div>

        <div class="visits">
            <p>Visits By Location</p>
            <div class="visits-div">
                <span class="total">Total</span>
                <!-- data -->
                <h2>5,76k</h2>
            </div>
        </div>

        <div class="days-remaining">
            <p>Days Remaining</p>
            <div class="days-remaining-div">
                <!-- data -->
            </div>
        </div>

        <div class="get-started ">
            <p>Get Started Now !</p>
            <div class="get-started-div">
                <!-- file upload -->



                <!-- @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <strong>{{ $message }}</strong>
                </div>
                @endif -->

                <!-- @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>There were some problems with your input.</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif -->

                <h6 style="color:black" class="p-2">Upload File</h6>
                <form action="{{ route('video.upload.post') }}" method="POST" enctype="multipart/form-data" class="upload-area p-3 m-2">
                    @csrf
                    <div class="row">

                        <div class="col-md-12">
                            <input type="file" name="video[]" multiple="true" class="form-control p-1">
                        </div>

                        <div class="col-md-8 mt-3">
                            <button type="submit" class="btn btn-success">Upload</button>
                        </div>
                        
                    </div>
                </form>

            </div>
        </div>

        <p class="recently-viewed-videos">Recently Viewed Videos</p>
        <div class="row">

            <!-- buttons -->
            <!-- <button>Show</button>
            <button>Entries</button>
            <button>Most Liked</button> -->

            <div class="table">
                <div class="">
                    <span class="rvv-content">Title</span>
                    <span class="rvv-content">Category</span>
                    <span class="rvv-content">Views</span>
                    <span class="rvv-content">Date</span>
                </div>
                <div class="">
                    <span class="rvv-content-data">Title</span>
                    <span class="rvv-content-data">Category</span>
                    <span class="rvv-content-data">Views</span>
                    <span class="rvv-content-data">Date</span>
                </div>
            </div>
        </div>

    </div>


    @endsection