<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {

        $announcements=Announcement::orderBy('created_at', 'desc')->take(5)->get();
        return view('homepage', compact('announcements'));
        
    }
    
    public function showCategory($category_id) {
        
        $category = Category::find($category_id);

        $category_name = Category::find($category_id)->category;

        $announcements = $category->announcements()->orderBy('created_at', 'desc')->get();

        return view('category', compact('category_name', 'announcements'));

    }
}

