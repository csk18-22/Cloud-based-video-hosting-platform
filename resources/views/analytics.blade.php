@extends('layouts.app')
@section('content')

<div class="container analytics-container">
    <div class="heading analytics-heading">
        Analytics
    </div>
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-Overview-tab" data-toggle="tab" href="#nav-Overview" role="tab" aria-controls="nav-Overview" aria-selected="true">Overview</a>
            <a class="nav-item nav-link" id="nav-Reach-tab" data-toggle="tab" href="#nav-Reach" role="tab" aria-controls="nav-Reach" aria-selected="false">Reach</a>
            <a class="nav-item nav-link" id="nav-Audience-tab" data-toggle="tab" href="#nav-Audience" role="tab" aria-controls="nav-Audience" aria-selected="false">Audience</a>
            <a class="nav-item nav-link" id="nav-Engagement-tab" data-toggle="tab" href="#nav-Engagement" role="tab" aria-controls="nav-Engagement" aria-selected="false">Engagement</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-Overview" role="tabpanel" aria-labelledby="nav-Overview-tab">
            <div class="row">
                <div class="col-lg-12">
                    <p class="line">This Video has got 10K views in the last 24 hours</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="analytics">
                        <p class="analyticsheading">Views</p>
                        <p>100k</p>
                        <span>2K less than usual</span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="analytics">
                        <p class="analyticsheading">Watch Time(hrs)</p>
                        <p>125</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="analytics">
                        <p class="analyticsheading">Views in Last 48 hours</p>
                        <p>6,24k</p>
                        <img src="" alt="Graph">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="analytics">
                        <img src="" alt="Graph">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="analytics">
                        <p class="analyticsheading">??</p>
                    </div>
                </div>
            </div>
            <p class="top-played-videos-heading">Your top played videos in 28 days</p>
            <div class="row">
                <div class="col-lg-3">
                    <div class="analytics">
                        <p class="analyticsheading">Title</p>
                        <img src="" alt="Video">
                        <p class="analyticsviews">Views: ??</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="analytics">
                        <p class="analyticsheading">Title</p>
                        <img src="" alt="Video">
                        <p class="analyticsviews">Views: ??</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="analytics">
                        <p class="analyticsheading">Title</p>
                        <img src="" alt="Video">
                        <p class="analyticsviews">Views: ??</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="analytics">
                        <p class="analyticsheading">Title</p>
                        <img src="" alt="Video">
                        <p class="analyticsviews">Views: ??</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- reach -->
        <div class="tab-pane fade" id="nav-Reach" role="tabpanel" aria-labelledby="nav-Reach-tab">
            <div class="row">
                <div class="col-lg-12 pull-right">
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Last 28 days
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <button class="dropdown-item" type="button">Action</button>
                            <button class="dropdown-item" type="button">Another action</button>
                            <button class="dropdown-item" type="button">Something else here</button>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="analytics">
                        <p class="analyticsheading">Views</p>
                        <p>6,24k</p>
                        <span>2k less than usual</span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="analytics">
                        <p class="analyticsheading">Impressions through click rate</p>
                        <p>6,24k</p>
                        <span>2k less than usual</span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="analytics">
                        <p class="analyticsheading">Unique Viewers</p>
                        <p>200k</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="analytics">
                        <img src="" alt="Graph">
                    </div>
                </div>
            </div>
        </div>

        <!-- audience -->
        <div class="tab-pane fade" id="nav-Audience" role="tabpanel" aria-labelledby="nav-Audience-tab">
            <div class="row">
                <div class="col-lg-12 pull-right">
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Last 28 days
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <button class="dropdown-item" type="button">Action</button>
                            <button class="dropdown-item" type="button">Another action</button>
                            <button class="dropdown-item" type="button">Something else here</button>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="analytics">
                        <p class="analyticsheading">Returning Viewers</p>
                        <p>200k</p>
                        <span>2k less than usual</span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="analytics">
                        <p class="analyticsheading">Unique Viewers</p>
                        <p>200k</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="analytics">
                        <img src="" alt="Graph">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="analytics">
                        <p class="analyticsheading">Watch By Time Users</p>
                        <img src="" alt="Image"><br>
                        <a href="">See more</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="analytics">
                        <p class="analyticsheading">Top Geographics</p>
                        <img src="" alt="Image"><br>
                        <a href="">See more</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="analytics">
                        <p class="analyticsheading">Age/Gender Group</p>
                        <img src="" alt="Image"><br>
                        <a href="">See more</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="analytics">
                        <p class="analyticsheading">Devices Used</p>
                        <img src="" alt="Image"><br>
                        <a href="">See more</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Engagement -->
        <div class="tab-pane fade" id="nav-Engagement" role="tabpanel" aria-labelledby="nav-Engagement-tab">
            <div class="row">
                <div class="col-lg-12 pull-right">
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Last 28 days
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <button class="dropdown-item" type="button">Action</button>
                            <button class="dropdown-item" type="button">Another action</button>
                            <button class="dropdown-item" type="button">Something else here</button>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="analytics">
                        <p class="analyticsheading">Watch time(hours)</p>
                        <p>6,24k</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="analytics">
                        <p class="analyticsheading">Average View Duration</p>
                        <p>6,24k</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="analytics">
                        <img src="" alt="Graph">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection