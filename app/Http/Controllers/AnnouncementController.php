<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }
    public function newAnnouncement(){
        return view('announcement.newAnnouncement');
    }
}
