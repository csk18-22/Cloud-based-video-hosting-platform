<!-- <div class="card">
    <div class="card-header">{{ __('Dashboard') }}</div>

    <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        {{ __('You are logged in!') }}
    </div>
</div> -->

@extends('layouts.app')

@section('content')
<div class="container myvideos-container">
    <div class="heading">
        My Videos
    </div>
    <div class="flex">
        <div>
            <input type="text" placeholder="Search..." class="search-bar">
        </div>
        <div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
            </div>
            @endif


            @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <strong>{{ $message }}</strong>
            </div>
            @endif
            <form action="{{ route('video.upload.post') }}" method="POST" enctype="multipart/form-data" class=" upload-area-videos p-3 m-2">
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
    
    <div class="myvideos-table">
        @if(count($videos) >=1)
        <div class="myvideos-table-head">
            <span class="table-head">Titles</span>
            <span class="table-head">Size</span>
            <span class="table-head">Updated At</span>
            <span class="table-head">Created At</span>
            <span class="table-head">Resolutions</span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span class="">STATUS</span>
        </div>
        @else
            <p class="text-center mt-5">No uploaded videos yet!</p>
        @endif

        @foreach($videos as $item)
       
        <div class="myvideos-table-row">
        
            <span class="table-row">{{ $item->video_title}}</span>
            <span class="table-row">{{round($item->size, 2)}} MB</span>
            <span class="table-row">{{ $item->updated_at}}</span>
            <span class="table-row">{{ $item->created_at}}</span>
            <span class="table-row visibility">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        View
                    </button>
                    @foreach($compressed as $reso)
                    @if($reso->video_id == $item->id)
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <button class="dropdown-item" id="myBtn">240px  
                            &nbsp;&nbsp;&nbsp;
                            <a href="{{$reso->video_url_320x240}}" target="_blank">  
                                <img  style="display:inline" src="https://img.icons8.com/ios-glyphs/20/000000/link--v1.png" />  
                            </a>
                            &nbsp;&nbsp;
                            <a  href="{{$reso->video_url_320x240}}">
                                <img  style="display:inline" src="https://img.icons8.com/ios-glyphs/20/000000/play--v1.png" />
                            </a> 
                        </button>
                        <button class="dropdown-item" id="myBtn2">480px
                            &nbsp;&nbsp;&nbsp;
                            <a href="{{$reso->video_url_640x480}}" target="_blank">  
                                <img  style="display:inline" src="https://img.icons8.com/ios-glyphs/20/000000/link--v1.png" />  
                            </a>
                            &nbsp;&nbsp;
                            <a  href="{{$reso->video_url_640x480}}">
                                <img  style="display:inline" src="https://img.icons8.com/ios-glyphs/20/000000/play--v1.png" />
                            </a> 
                        </button>

                        <button class="dropdown-item" id="myBtn3">720px
                            &nbsp;&nbsp;&nbsp;
                            <a href="{{$reso->video_url_1280x720}}" target="_blank" >  
                                <img  style="display:inline" src="https://img.icons8.com/ios-glyphs/20/000000/link--v1.png" />  
                            </a>
                            &nbsp;&nbsp;
                            <a  href="{{$reso->video_url_1280x720}}">
                                <img  style="display:inline" src="https://img.icons8.com/ios-glyphs/20/000000/play--v1.png" />
                            </a> 
                        </button>
                    </div>
                    @endif
                    @endforeach    
                </div>
            </span>

            <!-- delete -->
            <span>
                <form action="/video-delete/{{ $item->id }}" method="post">
                    @csrf
                    <button style="border: none"><img src="https://img.icons8.com/material-outlined/20/000000/filled-trash.png" /></button>
                </form>
                
            </span>

            <!-- link -->
            <span>
                <a class="" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <!-- {{$item->id}}     -->
                <img src="https://img.icons8.com/ios-glyphs/20/000000/link--v1.png" />
                </a>
            </span>
            
            
            <!-- play -->
            <span>
                <a href="{{ $item->video_url}}" target="_blank"> <img src="https://img.icons8.com/ios-glyphs/20/000000/play--v1.png" /></a>
            </span>

            <!-- edit -->
            <!-- <span>
                <a href=""> <img src="https://img.icons8.com/ios-filled/20/000000/edit--v1.png" /></a>
            </span> -->
            <span class="status">active</span>

        </div>
        <div class="collapse" id="collapseExample">
            <div class="card ">
                <p style="color:black">
                    {{ $item->video_url}}
                </p>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection