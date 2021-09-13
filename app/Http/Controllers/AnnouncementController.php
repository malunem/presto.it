<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnouncementController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }
    public function newAnnouncement(){
        $categories=Category::all();

        return view('announcement.newAnnouncement',compact('categories'));
    }
    
    public function createAnnouncement(Request $request){
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
}

