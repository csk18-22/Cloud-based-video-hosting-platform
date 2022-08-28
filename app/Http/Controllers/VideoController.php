<?php

namespace App\Http\Controllers;
use FFMpeg;
use File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Video;
use App\Models\compression_resolutions;

use DB;
use Illuminate\Database\QueryException;
require '../vendor/autoload.php';

use App\Jobs\Compression;
use App\Jobs\StoreToS3;
use Validator;
use Illuminate\Support\Facades\Input;

class VideoController extends Controller
{
    const MYSQL_UNIQUE_CONSTRAINT_ERROR_CODE = 23000;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function videoUpload()
    {
        return view('home');
    }


    public function videoUploadPost(Request $request)
    {
        $allowedfileExtension = ['video/quicktime', 'video/mp4', 'video/ogx', 'video/ogg', 'video/webm', 'video/oga', 'video/oga'];
        
        

        if ($request->hasfile('video')) {
            foreach ($request->file('video') as $vid  ) {
                // create video obj
                $videodb = new Video;
                
                // create compressed_resolutions obj
                $comp_reso = new compression_resolutions;

                $id = Auth::user()->id;
                
                $mimeType = $vid->getClientMimeType();
                $check = in_array($mimeType, $allowedfileExtension);

                $path = $id;
                $vidName = $vid->getClientOriginalName();
                $onlyName = explode('.',$vidName);
                
                $data[]=$path . "/" . $vidName;

                 //validator
                
                
                // can do this using queues
                $onlyName1 = $onlyName[0];
                if ($check) {

                    // STORE IN S3
                    $vid->storeAs($path,$vidName,'s3');

                    $url = Storage::disk('s3')->url($path . "/" . $vidName);
                    // dd($path,$url);
                    $folder_url = Storage::disk('s3')->url($path);

                    

                    $size = Storage::disk('s3')->size($path . "/" . $vidName);

                    //store video details in database                    
                    // $videodb->size=$size/(1024*1024);
                    // $videodb->video_title = $vidName;
                    // $videodb->user_id=Auth::user()->id;
                    // $videodb->video_url=$url;
                    
                    try {
                        $videodb->size=$size/(1024*1024);
                        $videodb->video_title = $vidName;
                        $videodb->user_id=Auth::user()->id;
                        $videodb->video_url=$url;
                        $videodb->save();
                    } 
                    catch(QueryException $exception) {
                        return back()
                            ->with('error', 'File Already there!!');
                        // dd($exception);
                        // if ($exception->getCode() === static::MYSQL_UNIQUE_CONSTRAINT_ERROR_CODE) {
                            // dd($vidName);
                        // return back()
                        //     ->with('error', 'File Already there!!');
                        // }
                    }

                    // store video locally
                    $vid_path = $vid->storeAs('uploads', $vidName, 'public');
                    $vid_path2 = 'storage/'.$vid_path;
                    $base_path = (base_path('public'). '\\storage\\'. $vid_path);

                    // compression & store to s3 jobs
                    Compression::dispatch($base_path, $vidName);
                    StoreToS3::dispatch($path, $onlyName[0], $vidName );

                    
                    // compressed vid links

                    $comp_vid1_url = ($folder_url ."/"."compressed_" . $onlyName1. "/" . "1280-720_" . $vidName);
                    $comp_vid2_url = ($folder_url ."/"."compressed_" . $onlyName1. "/" . "320-240_" . $vidName);
                    $comp_vid3_url = ($folder_url ."/"."compressed_" . $onlyName1. "/" . "640-480_" . $vidName);
                    
                    $comp_reso->video_id =  $videodb->id;
                
                    $comp_reso->video_title = $vidName;

                    $comp_reso->video_url_1280x720 = $comp_vid1_url;
                    $comp_reso->video_url_320x240 = $comp_vid2_url;
                    $comp_reso->video_url_640x480 = $comp_vid3_url;
                    
                    $comp_reso->save();

                    
                } else {
                    return back()
                        ->with('error', 'File Type is Wrong');
                }

            }
       
            return back()
               ->with('success', 'You have successfully uploaded the video.');
               
        } else {
            return back()
                ->with('error', 'Input is Required');
        }

    }

    public function index()
    {
        $userId = Auth::user()->id;

        $videos = DB::table('videos')
            ->where('videos.user_id', $userId)
            ->select('videos.*')            
            ->get();

        $compressed=DB::table('compression_resolutions')
        ->join('videos', 'compression_resolutions.video_id', '=', 'videos.id')
        ->select('compression_resolutions.*')->get();

        // dd($compressed);
        return view('myvideos', ['videos' => $videos,'compressed'=>$compressed]);
    }

    public function videoDelete(Video $video)
    {        
        $video = Video::find($video->id);
        $userId = $video->user_id;
        $vidName = $video->video_title;
        $onlyName = explode('.',$vidName);

        // delete video from local database
        $video->delete();

        // delete OG video from s3
        Storage::disk('s3')->delete($userId.'/'.$vidName);

        // delete compressed videos folder
        Storage::disk('s3')->deleteDirectory($userId.'/compressed_'.$onlyName[0]);

        return redirect('/myvideos');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}



