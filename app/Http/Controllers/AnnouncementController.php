<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Models\AnnouncementImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AnnouncementRequest;
use App\Jobs\ResizeImage;

class AnnouncementController extends Controller
{
    public function __construct()
    {
    //    $this->middleware('auth')->except(['newAnnouncement']);
       $this->middleware('auth')->except(['showDetailAnnouncement']);
    
    }
    public function newAnnouncement(Request $request){
        $categories=Category::all();

        $uniqueSecret = $request->old('uniqueSecret', base_convert(sha1(uniqid(mt_rand())), 16, 36));

        return view('announcement.newAnnouncement',compact(['categories', 'uniqueSecret']));
    }
    
    public function createAnnouncement(AnnouncementRequest $request){
        $announcement=Announcement::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'price'=> $request->price,
            'category_id'=>$request->category_id,
            'user_id'=>Auth::user()->id
            // 'img'=>$request->file('img')->store('public/article/img')
            
        ]);

        $uniqueSecret = $request->input('uniqueSecret');

        $images=session()->get("images.{$uniqueSecret}", []);
        $removedImages = session()->get("removedimages.{$uniqueSecret}", []);
        $images = array_diff($images, $removedImages);
        foreach ($images as $image) {
            $i=new AnnouncementImage();
            $fileName=basename($image);
            $newFileName = "public/announcements/{$announcement->id}/{$fileName}";
            $file=Storage::move($image, $newFileName);
            
            dispatch(new ResizeImage(
                $newFileName,
                300,
                150
            ));
            

            dispatch(new ResizeImage(
                $newFileName,
                400,
                300
            ));


            $i->file = $newFileName;
            $i->announcement_id = $announcement->id;
            $i->save();
        }
        File::deleteDirectory(storage_path("/app/public/temp/{$uniqueSecret}"));
   
        return redirect(route('homepage'))->with('message', "Ciao " .Auth::user()->name. " Il tuo annuncio è stato inserito");
    }

    public function showDetailAnnouncement(Announcement $announcement){
        
        return view('announcement.detailAnnouncement', compact('announcement'));

    }
    public function announcementimages(Request $request) {

        $uniqueSecret = $request->input('uniqueSecret');
        $fileName = $request->file('file')->store("public/temp/{$uniqueSecret}");

        dispatch(new ResizeImage(
            $fileName,
            120,
            120
        ));

        session()->push("images.{$uniqueSecret}", $fileName);
        return response()->json(
            [
                'id' => $fileName
            ]
        );

        
    }
    public function removeImage(Request $request){

        $uniqueSecret = $request->input('uniqueSecret');
        $fileName = $request->input('id');

        session()->push("removedimages.{$uniqueSecret}", $fileName);

        Storage::delete($fileName);
        return response()->json('ok');
    }

    public function getImages(Request $request){
        $uniqueSecret = $request->input('uniqueSecret');
        $images=session()->get("images.{$uniqueSecret}", []);
        $removedImages = session()->get("removedimages.{$uniqueSecret}", []);
        $images = array_diff($images, $removedImages);
        $data = [];
        foreach ($images as $image) {
            $data[] = [
                'id' => $image,
                'src' => AnnouncementImage::getUrlByFilePath($image, 120, 120)
            ];
        }
        return response()->json($data);
    }
}

