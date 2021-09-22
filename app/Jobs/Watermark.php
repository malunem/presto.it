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

class Watermark implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $announcement_image_id;

    public function __construct($announcement_image_id)
    {
        $this->announcement_image_id= $announcement_image_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $i = AnnouncementImage::find($this->announcement_image_id);
        if(!$i){
            return;
        }
        $srcPath=storage_path('/app/' .$i->file);
        
        $image = Image::load($srcPath);
        $image->watermark(base_path('public/img/sfondopresto1.png'))
        ->watermarkPosition('bottom-right')
        // ->watermarkPosition(Manipulations::POSITION_CENTER)
        // ->watermarkHeight(20, Manipulations::UNIT_PERCENT)
        // ->watermarkWidth(10, Manipulations::UNIT_PERCENT)
        // ->watermarkPadding(50)
        // ->watermarkOpacity(45);
        ->watermarkPadding(20, 3, Manipulations::UNIT_PERCENT)
        // ->watermarkPosition(Manipulations::POSITION_CENTER)
        ->watermarkHeight(20, Manipulations::UNIT_PERCENT)
        // ->watermarkWidth(50, Manipulations::UNIT_PERCENT)
        // ->watermarkFit(Manipulations::FIT_STRETCH)
        ->watermarkOpacity(45);

        $image->save($srcPath);
    }
}
