<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnnouncementRequest;
use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {

        $announcements=Announcement::where('is_accepted', true)->orderBy('created_at', 'desc')->take(5)->get();
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
}

