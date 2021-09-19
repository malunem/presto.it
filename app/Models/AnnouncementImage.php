<?php

namespace App\Models;

use App\Models\Announcement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AnnouncementImage extends Model
{
    use HasFactory;
    public function announcement(){
    return $this->belongsTo(Announcement::class);
    }

    static public function getUrlByFilePath($filepath, $w = null, $h = null){
        if(!$w && !$h){
            return Storage::url($filepath);
        }
        $path = dirname($filepath);
        $fileName = basename($filepath);

        $file = "{$path}/crop{$w}x{$h}_{$filename}";
        return Storage::url($file);

    }
    
    public function getUrl($w = null, $h = null){
        return AnnouncementImage::getUrlByFilePath($this->file, $w, $h);
    }
}
