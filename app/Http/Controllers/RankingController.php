<?php

namespace App\Http\Controllers;

use App\Models\Ranking;
use App\Models\RankingEntry;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RankingController extends Controller
{
    public function current()
    {
        $currentWeek = now()->weekOfYear;
        $currentYear = now()->year;

        $ranking = Ranking::where('week', $currentWeek)
                          ->where('year', $currentYear)
                          ->with('entries.user')
                          ->first();

        if (!$ranking) {
            // Se non esiste una classifica per questa settimana, creala
            $ranking = $this->createRanking($currentWeek, $currentYear);
        }

        return Inertia::render('CurrentRankings', [
            'ranking' => $ranking
        ]);
    }

    public function previous($limit = 10)
    {
        $rankings = Ranking::with('entries.user')
                    ->orderBy('year', 'desc')
                    ->orderBy('week', 'desc')
                    ->take($limit)
                    ->get();

        return Inertia::render('PreviousRankings', [
            'rankings' => $rankings
        ]);
    }

    private function createRanking($week, $year)
    {
        $ranking = Ranking::create([
            'week' => $week,
            'year' => $year
        ]);

        $users = User::all();
        foreach ($users as $index => $user) {
            RankingEntry::create([
                'ranking_id' => $ranking->id,
                'user_id' => $user->id,
                'position' => $index + 1,
                'points' => 0 // Inizializza i punti a 0
            ]);
        }

        return $ranking->load('entries.user');
    }


    public function showUsers()
    {
        $users = User::all();
        $user = $users->first();
        return Inertia::render('UserForm', [
            'user' => $user
        ]);
    }
    public function addUsers(Request $request){
        $name = $request->input('name');

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' =>'password',
        ]);
    }
}