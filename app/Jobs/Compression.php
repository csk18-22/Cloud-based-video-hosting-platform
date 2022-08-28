<?php

namespace App\Jobs;
use FFMpeg;
use File;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class Compression implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $base_path;
    public $vidName;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($base_path, $vidName)
    {
        $this->base_path = $base_path;
        $this->vidName = $vidName;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $ffmpeg = FFMpeg\FFMpeg::create();
        $video = $ffmpeg->open($this->base_path);

        $format = new FFMpeg\Format\Video\X264();
        $format
            ->setKiloBitrate(200)
            ->setAudioChannels(2)
            ->setAudioKiloBitrate(256);
        // 1
        $video
            ->filters()
            ->resize(new FFMpeg\Coordinate\Dimension(320, 240))
            ->synchronize();
        $video
            ->save($format, 'public/320-240'.$this->vidName);
    
        // 2
        $video
            ->filters()
            ->resize(new FFMpeg\Coordinate\Dimension(640, 480))
            ->synchronize();
        $video
            ->save($format, 'public/640-480'.$this->vidName);                    

        // 3
        $video
            ->filters()
            ->resize(new FFMpeg\Coordinate\Dimension(1280, 720))
            ->synchronize();
        $video
            ->save($format, 'public/1280-720'.$this->vidName);

        
        // delete og file
        File::delete('public/storage/uploads/'.$this->vidName);

    }
}
