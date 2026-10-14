<?php

namespace App\Http\Controllers;

use App\Models\WorkSession;
use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index(Request $request) 
    { 
        return Inertia::render('Dashboard', [
            'workSessions' => $request->user()->workSessions()->get(),
        ]);
    }

    public function startWork(Request $request){
        WorkSession::create([
            'user_id' => $request->user()->id,
            'started_at' => now(),
        ]);

        return redirect()->route('dashboard.index');
    }

    public function endWork(Request $request){
        $session = $request->user()
            ->workSessions()
            ->whereNull('ended_at')
            ->latest('started_at')
            ->firstOrFail();

        $endedAt = now();
        $seconds = (int) $session->started_at->diffInSeconds($endedAt);
        
        $session->update([
            'ended_at'     => $endedAt,
            'worked_hours' => sprintf(
                '%02d:%02d:%02d',
                intdiv($seconds, 3600),
                intdiv($seconds % 3600, 60),
                $seconds % 60
            ),
        ]);


        return redirect()->route('dashboard.index');
    }

}
