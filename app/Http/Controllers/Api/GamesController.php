<?php

namespace App\Http\Controllers\Api;

use App\Game;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        if (auth()->check()) {
            $games = Game::all();

            $games = Game::withFavoritesInformation($games);

            return response()->json($games, 200);
        }

        return response()->json('Unauthorized', 403);
    }

    /**
     * Search games
     *
     * Search games using filters defined by user 
     *
     * @param Request $request
     * 
     * @return JsonResponse
     **/
    public function search(Request $request)
    {
        $dataForQuery = $request->only(['genres', 'platforms']);
        $games = Game::latest();

        foreach ($dataForQuery as $filter => $value) {
            if (! is_numeric($dataForQuery[$filter])) {
                unset($dataForQuery[$filter]);
                continue;
            }

            $games->whereHas($filter, function($query) use ($filter, $value){
                $query->where($filter . '.id', $value);
            });
        };

        $games = Game::withFavoritesInformation($games->get());

        return response()->json($games, 200);
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
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        //
    }
}
