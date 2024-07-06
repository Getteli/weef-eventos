<?php

namespace App\Http\Controllers;

use App\Models\Eventos;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class IndexController extends Controller
{
    /**
     * Exibe os ultimos eventos na home
     */
    public function home(): View
    {
        $last_events = Eventos::orderBy("date_evento", "DESC")->limit(3)->get() ?? null;

        return view('welcome', [
            'user' => auth::user(),
            'last_events' => $last_events
        ]);
    }

    /**
     * Tela de dashboard, ao logar, com a lista de quantidade de promoters e eventos
     */
    public function dashboard(): View
    {
        return view('dashboard', [
            'promoters' => User::count(),
            'eventos' => Eventos::count(),
        ]);
    }
}