<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Video-Hosting') }}</title>
    <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}"></script>
    <!-- <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> -->
    <script src="{{ asset('js/script.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


</head>

<body>
    <div id="app">
        @guest
        @if (Route::has('login'))
        <!-- <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li> -->
        @endif

        @if (Route::has('register'))
        <!-- <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li> -->
        @endif
        @else
        <div class="sidebar">

            <svg xmlns="http://www.w3.org/2000/svg" class="username-icon" width="32" height="32" viewBox="0 0 172 172" style=" fill:#000000;">
                <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                    <path d="M0,172v-172h172v172z" fill="none"></path>
                    <g fill="#ffffff">
                        <path d="M86,21.5c-17.7627,0 -32.25,14.4873 -32.25,32.25c0,17.7627 14.4873,32.25 32.25,32.25c17.7627,0 32.25,-14.4873 32.25,-32.25c0,-17.7627 -14.4873,-32.25 -32.25,-32.25zM86,86c-29.60449,0 -53.75,24.14551 -53.75,53.75h10.75c0,-23.80957 19.19043,-43 43,-43c23.80957,0 43,19.19043 43,43h10.75c0,-29.60449 -24.14551,-53.75 -53.75,-53.75zM86,32.25c11.92578,0 21.5,9.57422 21.5,21.5c0,11.92578 -9.57422,21.5 -21.5,21.5c-11.92578,0 -21.5,-9.57422 -21.5,-21.5c0,-11.92578 9.57422,-21.5 21.5,-21.5z"></path>
                    </g>
                </g>
            </svg>

            <a class="username"> {{ Auth::user()->username }}</a>
            <span>
                <img src="https://img.icons8.com/material-outlined/20/000000/home--v2.png" />
                <a class="active" href="/home">Dashboard</a>
            </span>
            <span>
                <img src="https://img.icons8.com/ios-glyphs/20/000000/analytics.png" />
                <a href="/analytics">Analytics</a>
            </span>
            <span>
                <img src="https://img.icons8.com/small/20/000000/youtube--v1.png" />
                <a href="/myvideos">My Videos</a>
            </span>
            <span>
                <img src="https://img.icons8.com/material-outlined/20/000000/settings--v2.png" />
                <a href="/accountsettings">Profile Settings</a>
            </span>
            <span>
                <img src="https://img.icons8.com/windows/20/000000/bill-copy.png" />
                <a href="/billing">Billing</a>
            </span>
            <span>
                <img src="https://img.icons8.com/fluency-systems-filled/20/000000/exit.png" />
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
            </span>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>

        </div>
        @endguest

        <main class="py-4">
            @yield('content')
        </main>
    </div>


    <!-- analytics tabs script  -->
    <script>
        $('#nav a').on('click', function(e) {
            e.preventDefault()
            $(this).tab('show')
        })
    </script>
    
    
    <!--  -->
    <script src="{{ asset('/plupload/js/plupload.full.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var path = "{{ asset('/plupload/js/') }}";

            var uploader = new plupload.Uploader({
            browse_button: 'pickfiles',
            container: document.getElementById('file-input'),
            url: '{{ route("video.upload.post") }}',
            chunk_size: '10kb', // 1 MB
            max_retries: 2,
            filters: {
                max_file_size: '200mb'
            },
            multipart_params : {
                // Extra Parameter
                "_token" : "{{ csrf_token() }}"
            },
            init: {
                PostInit: function () {
                    document.getElementById('filelist').innerHTML = '';
                },
                FilesAdded: function (up, files) {
                    plupload.each(files, function (file) {
                        console.log('FilesAdded');
                        console.log(file);
                        document.getElementById('filelist').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
                    });
                    uploader.start();
                },
                UploadProgress: function (up, file) {
                    console.log('UploadProgress');
                    console.log(file);
                    document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
                },
                FileUploaded: function(up, file, result){

                    console.log('FileUploaded');
                    console.log(file);
                    console.log(JSON.parse(result.response));
                    responseResult = JSON.parse(result.response);

                    if (responseResult.ok==0) {
                        toastr.error(responseResult.info, 'Error Alert', {timeOut: 5000});
                    }
                    if (result.status != 200) {
                        toastr.error('Your File Uploaded Not Successfully!!', 'Error Alert', {timeOut: 5000});
                    }
                    if (responseResult.ok==1 && result.status == 200) {
                        toastr.success('Your File Uploaded Successfully!!', 'Success Alert', {timeOut: 5000});
                    }
                },
                UploadComplete: function(up, file){
                    // toastr.success('Your File Uploaded Successfully!!', 'Success Alert', {timeOut: 5000});
                },
                Error: function (up, err) {
                    // DO YOUR ERROR HANDLING!
                    toastr.error('Your File Uploaded Not Successfully!!', 'Error Alert', {timeOut: 5000});
                    console.log(err);
                }
            }
        });
        uploader.init();
    });
</body>

</html>