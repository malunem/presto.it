<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use phpDocumentor\Reflection\Types\Null_;

class RevisorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.revisor');
    }

    public function index(){
        $announcement = Announcement::where('is_accepted', null)
            ->orderBy('created_at', 'desc')
            ->first();
        $announcements = Announcement::where('is_accepted', 1)
        ->orWhere('is_accepted',0)
        ->orderBy('created_at', 'desc')
        ->get();

        return view('revisor.homepage', compact('announcement','announcements'));
    }

    private function setAccepted($announcement_id, $value){
        $announcement = Announcement::find($announcement_id);
        $announcement->is_accepted = $value;
        $announcement->save();
        

        return redirect(route('revisor.homepage'));
    }

    public function accept($announcement_id){
        return $this->setAccepted($announcement_id, true);
    }

    public function reject($announcement_id){
        return $this->setAccepted($announcement_id, false);
    }
    public function undo($announcement_id){
        return $this->setAccepted($announcement_id, null);
    }


    



  
}
