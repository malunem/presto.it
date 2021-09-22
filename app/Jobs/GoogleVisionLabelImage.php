<?php

namespace App\Jobs;

use App\Models\AnnouncementImage;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GoogleVisionLabelImage implements ShouldQueue
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
        
        $image = file_get_contents(storage_path('/app/' . $i->file));
        
        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credential.json'));
        
        $imageAnnotator = new ImageAnnotatorClient();
        $response = $imageAnnotator->labelDetection($image);
        $labels = $response->getLabelAnnotations();
        
        if ($labels) {
            
            $result = [];
            foreach ($labels as $label) {
                $result[] = $label->getDescription();
            }
            
            echo json_encode($result);
            $i->labels = str_replace(' ', '', $result);
            $i->save();
        }

        $imageAnnotator->close();
    }
    
}
