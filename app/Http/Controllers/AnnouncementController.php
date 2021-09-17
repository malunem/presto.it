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

class AnnouncementController extends Controller
{
    public function __construct()
    {
    //    $this->middleware('auth')->except(['newAnnouncement']);
       $this->middleware('auth')->except(['showDetailAnnouncement']);
    
    }
    public function newAnnouncement(){
        $categories=Category::all();

        $uniqueSecret = base_convert(sha1(uniqid(mt_rand())), 16, 36);

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

        $images=session()->get("images.{$uniqueSecret}");
        foreach ($images as $image) {
            $i=new AnnouncementImage();
            $fileName=basename($image);
            $file=Storage::move($image, "/public/announcements/{$announcement->id}/{$fileName}");
            $i->file = $file;
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
        session()->push("images.{$uniqueSecret}", $fileName);
        return response()->json(session()->get("images.{$uniqueSecret}"));

        
    }
}

