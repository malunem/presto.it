<?php

namespace App\Jobs;

use Spatie\Image\Image;
use Illuminate\Bus\Queueable;
use Spatie\Image\Manipulations;
use App\Models\AnnouncementImage;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ResizeImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $path, $fileName, $w, $h;

    public function __construct($filePath, $w, $h)
    {
        $this->path = dirname($filePath);
        $this->fileName = basename($filePath);
        $this->w = $w;
        $this->h = $h;
    }

    // /**
    //  * Execute the job.
    //  *
    //  * @return void
    //  */
    public function handle()
    {
        
        $w = $this->w;
        $h = $this->h;
        
        $srcPath = storage_path() . '/app/' . $this->path . '/' . $this->fileName;
        

        $destPath = storage_path() . '/app/' . $this->path . "/crop{$w}x{$h}_" . $this->fileName;
        // Image::load($srcPath)
        // ->crop(Manipulations::CROP_CENTER, $w, $h);
        
        // $i = AnnouncementImage::find($this->announcement_image_id);
        // if(!$i){
        //     return;
        // }
        // $srcPath=storage_path('/app/' .$i->file);
        
        $image = Image::load($srcPath)
        ->crop(Manipulations::CROP_CENTER, $w, $h)
        ->watermark(base_path('public/img/sfondoprestoPiccolo.png'))
        ->watermarkPosition('bottom-right')
        // ->watermarkPosition(Manipulations::POSITION_CENTER)
        // ->watermarkHeight(20, Manipulations::UNIT_PERCENT)
        // ->watermarkWidth(10, Manipulations::UNIT_PERCENT)
        // ->watermarkPadding(50)
        // ->watermarkOpacity(45);
        ->watermarkPadding(20)
        // ->watermarkPosition(Manipulations::POSITION_CENTER)
        ->watermarkHeight(20, Manipulations::UNIT_PERCENT)
        ->watermarkWidth(20, Manipulations::UNIT_PERCENT)
        // ->watermarkFit(Manipulations::FIT_STRETCH)
        ->watermarkOpacity(45)

       
        ->save($destPath);
      
    }
}
