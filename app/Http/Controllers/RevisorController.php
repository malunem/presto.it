<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

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
        return view('revisor.homepage', compact('announcement'));
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
}
