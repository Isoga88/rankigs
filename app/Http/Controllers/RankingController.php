<?php

namespace App\Http\Controllers;

use App\Models\Ranking;
use App\Models\RankingEntry;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Inertia\Inertia;

class RankingController extends Controller
{
    public function current()
    {
        $currentWeek = now()->weekOfYear;
        $currentYear = now()->year;

        $ranking = Ranking::where('week', $currentWeek)
        ->where('year', $currentYear)
        ->with(['entries' => function ($query) {
            $query->orderBy('position', 'asc');
            $query->with('user');
        }])
        ->first();


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

    public function createRanking(Request $request)
    {
        $week = now()->weekOfYear;
        $year = now()->year;

        $ranking = Ranking::firstOrCreate([
            'week' => $week,
            'year' => $year
        ]);

        // Verifica se sono presenti posizioni nel corpo della richiesta
        if ($request->has('positions')) {
            $userPositions = $request->positions;

            // Itera sull'array $userPositions per creare o aggiornare le entry
            foreach ($userPositions as $userId => $position) {
                RankingEntry::updateOrCreate(
                    ['ranking_id' => $ranking->id, 'user_id' => $userId],
                    ['position' => $position, 'points' => (count($userPositions) - $position) * 2]
                );
            }
        }

        // Carica le entries del ranking con i relativi utenti
        $ranking->load('entries.user');

        return back()->with(["success"=>"updated"]);
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
    public function showFormRanking(Request $request){
        $users = User::all();
    
        return Inertia::render('RankingForm', [
            'users' => $users
        ]);
    }
}