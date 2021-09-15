<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MakeUserRevisor extends Command
{

    protected $signature = 'presto:makeUserRevisor';

    protected $description = 'rendi un utente revisore';


    public function __construct()
    {
        parent::__construct();
    }


    public function handle()
    {
        $email = $this->ask("inserisci l'email dell'utente che vuoi rendere revisore");
        $user = User::where('email',$email)->first();
        if (!$user) {
            $this->error("utente non trovato");
            return;
        }
        $user->is_revisor = true;
        $user->save();
        $this->info("l'utente {$user->name} è ora un revisore");
    }
}
