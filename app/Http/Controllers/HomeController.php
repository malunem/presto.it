<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Mail\ContactMail;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\AnnouncementRequest;

class HomeController extends Controller
{
    public function index() {

        $announcements=Announcement::where('is_accepted', true)->orderBy('created_at', 'desc')->take(6)->get();
        return view('homepage', compact('announcements'));
        
    }

    public function search(Request $request){
        
        $query = $request->input('query');
        $announcements = Announcement::search($query)->where('is_accepted',true)->get();
        return view('searchResults', compact('query','announcements'));
    }
    
    public function showCategory($category_id) {
        
        $category = Category::find($category_id);

        $category_name = Category::find($category_id)->category;

        $announcements = $category->announcements()->where('is_accepted', true)->orderBy('created_at', 'desc')->get();

        return view('category', compact('category_name', 'announcements'));

    }
      public function revisorRequest(){
        return view('revisorRequest');
    }

    public function revisorSubmit(Request $request){
        $message= $request->input('message');
        $email= Auth::user()->email;
        
        
        $contact = compact('message', 'email');

         Mail::to('Amministrazione@presto.it')->send(new ContactMail($contact));

        return redirect(route('homepage'))->with('message', 'Grazie per averci contattato');
    }

    public function locale($locale){
        
        session()->put('locale',$locale);
        return redirect()->back();
    }
}

