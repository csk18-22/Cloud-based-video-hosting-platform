<?php

namespace App\Jobs;
use Illuminate\Support\Facades\Storage;
use File;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StoreToS3 implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $path;
    public $name;
    public $vidName;
    

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($path, $name, $vidName )
    {
        $this->path = $path;
        $this->name = $name;
        $this->vidName = $vidName;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // store compressed files to s3
        $video1_name = base_path('public').'/320-240'.$this->vidName;
        Storage::disk('s3')->put($this->path.'/compressed_'.$this->name.'/320-240_'.$this->vidName, file_get_contents( $video1_name));

        $video2_name = base_path('public').'/640-480'.$this->vidName;
        Storage::disk('s3')->put($this->path.'/compressed_'.$this->name.'/640-480_'.$this->vidName, file_get_contents( $video2_name));

        $video3_name = base_path('public').'/1280-720'.$this->vidName;
        Storage::disk('s3')->put($this->path.'/compressed_'.$this->name.'/1280-720_'.$this->vidName, file_get_contents( $video3_name));

        // delete compressed files
        File::delete('public/320-240'.$this->vidName);
        File::delete('public/640-480'.$this->vidName);
        File::delete('public/1280-720'.$this->vidName);

    }
}
