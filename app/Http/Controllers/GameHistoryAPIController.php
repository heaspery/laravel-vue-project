<?php

namespace App\Http\Controllers;

use App\Models\GameHistory;
use App\Http\Requests\GameHistoryStoreRequest;
use App\Http\Requests\GameHistoryUpdateRequest;
use Illuminate\Http\Request;

class GameHistoryAPIController extends Controller
{
     /**
     * Récupérer tous les historiques de jeu
     */
    public function getGameHistories()
    {
        $gameHistories = GameHistory::all();
        return response()->json($gameHistories, 200);
 
    }

    /**
     * Récupérer un historique de jeu par son ID
     */
    public function getGameHistory($id)
    {
        $gameHistory = GameHistory::find($id);

        if (!$gameHistory) {
            return response()->json(['message' => 'Chapter not found'], 404);
        }

        return response()->json($gameHistory, 200);
    }

    public function createGameHistory(GameHistoryStoreRequest $request)
    {
        try {
            $validated = $request->validated();

        if (!$validated) {
            return response()->json(['message' => 'Invalid JSON data'], 400);
        }

            $validated['name_choice'] = $validated['name_choice'] ?? 'utilisateur';

            $gameHistory = GameHistory::create([
                'user_id' => $validated['user_id'],
                'chapter_id' => $validated['chapter_id'],
                'story_id' => $validated['story_id'],
                'name_choice' => $validated['name_choice'],
            ]);

            return response()->json([
                'message' => 'Game History created successfully',
                'gameHistory' => $gameHistory
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Wrong data',
                'error' => $e->getMessage() 
            ], 422); 
        }
    }

    public function updateGameHistory(GameHistoryUpdateRequest $request, $id) 
{
    try {
        $validated = $request->validated();

        if (!$validated) {
            return response()->json(['message' => 'Invalid JSON data'], 400);
        }

        $gameHistory = GameHistory::find($id);

        if (!$gameHistory) {
            return response()->json(['message' => 'GameHistory not found'], 404);
        }

        $gameHistory->update(array_filter([
            'chapter_id' => $validated['chapter_id'] ?? $gameHistory->chapter_id,
            'user_id' => $validated['user_id'] ?? $gameHistory->user_id,
            'story_id' => $validated['story_id'] ?? $gameHistory->story_id,
            'name_choice' => $validated['name_choice'] ?? $gameHistory->name_choice,
        ]));

        return response()->json([
            'message' => 'Chapter updated successfully',
            'gameHistory' => $gameHistory
        ], 200);

    } catch (\Exception $e) {

        return response()->json([
            'message' => 'Wrong data or invalid request format',
            'error' => $e->getMessage()
        ], 422); 
    }
}

}
