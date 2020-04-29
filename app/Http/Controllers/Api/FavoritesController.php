<?php

namespace App\Http\Controllers\Api;

use App\Game;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FavoritesController extends Controller
{
    public function markAsFavorite(Game $game) {
        $favoritedGamesQuery = auth()->user()->favoritedGames();
        $responseMessage = 'Game favorited';

        if ($favoritedGamesQuery->where('game_id', $game->id)->count() == 0) {
            $favoritedGamesQuery->attach($game->id);            
        } else {
            $responseMessage = 'Game unfavorited';

            $favoritedGamesQuery->detach($game->id);
        }
        
        return response()->json($responseMessage, 201);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
