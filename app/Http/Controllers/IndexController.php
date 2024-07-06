<?php

namespace App\Http\Controllers;

use App\Models\Eventos;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class IndexController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function home(): View
    {
        $last_events = Eventos::where('date_evento', '>=', now())->limit(3)->get() ?? null;

        return view('welcome', [
            'user' => auth::user(),
            'last_events' => $last_events
        ]);
    }

    /**
     * Display the user's profile form.
     */
    public function dashboard(): View
    {
        return view('dashboard', [
            'promoters' => User::count(),
            'eventos' => Eventos::count(),
        ]);
    }
}