<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;

use Spatie\Image\Manipulations;
use Spatie\Image\Image;
use App\Models\AnnouncementImage;
// use Google\Cloud\Vision\V1\Image;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;

class GoogleVisionRemoveFaces implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $announcement_image_id;

    public function __construct($announcement_image_id)
    {
        $this->announcement_image_id = $announcement_image_id;
    }

  
    public function handle()
    {
        $i = AnnouncementImage::find($this->announcement_image_id);

        if (!$i) {
            return;
        }
        
        $scrPath = storage_path('/app/' . $i->file);
        $image = file_get_contents($scrPath);
        
        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credential.json'));
        
        $imageAnnotator = new ImageAnnotatorClient();
        $response = $imageAnnotator->faceDetection($image);
        $faces = $response->getFaceAnnotations();

        foreach ($faces as $face) {
            $vertices = $face->getBoundingPoly()->getVertices();

            $bounds = [];
            foreach ($vertices as $vertex) {
                // echo $vertex->getX() . "," . $vertex->getY() . "\n";
                $bounds[] = [$vertex->getX(), $vertex->getY()];
            }
            $w = $bounds[2][0] - $bounds[0][0];
            $h = $bounds[2][1] - $bounds[0][1];

            $image = Image::load($scrPath);
        
            $image->watermark(base_path('public/img/smile-img.png'))
                  ->watermarkPosition('top-left')
                  ->watermarkPadding($bounds[0][0], $bounds[0][1])
                  ->watermarkWidth($w, Manipulations::UNIT_PIXELS)
                  ->watermarkHeight($h, Manipulations::UNIT_PIXELS)
                  ->watermarkFit(Manipulations::FIT_STRETCH);
            
            $image->save($scrPath);
        }

        $imageAnnotator->close();
    }
}
