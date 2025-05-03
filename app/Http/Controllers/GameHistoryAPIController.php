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
        $chapter = Chapter::find($id);

        if (!$chapter) {
            return response()->json(['message' => 'Chapter not found'], 404);
        }

        return response()->json($chapter, 200);
    }

}
