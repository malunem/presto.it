<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        return view('announcement.newAnnouncement',compact('categories'));
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
   
        return redirect(route('homepage'))->with('message', "Ciao " .Auth::user()->name. " Il tuo annuncio è stato inserito");
    }

    public function showDetailAnnouncement(Announcement $announcement){
        
        return view('announcement.detailAnnouncement', compact('announcement'));

    }
}

