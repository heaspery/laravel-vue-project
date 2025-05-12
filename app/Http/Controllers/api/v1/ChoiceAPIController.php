<?php

namespace App\Http\Controllers\api\v1;
use App\Models\Choice;
use App\Models\Chapter;
use Inertia\Controller;

use App\Http\Requests\ChoiceStoreRequest;
use App\Http\Requests\ChoiceUpdateRequest;



class ChoiceAPIController extends Controller
{
    /**Récupérer tous les choix
     */
       public function getChoices()
    {
        $choices = Choice::all();

        if ($choices->isEmpty()) {
            return response()->json([], 200); 
        }
        return response()->json($choices, 200);
 
    }

    /**
     * Récupérer un choix par son ID
     */
    public function getChoice($id)
    {
        $choice = Choice::find($id);
    
        if (!$choice) {
            return response()->json([], 200);
        }
    
        return response()->json($choice, 200);
    }


    public function getChoicesByChapter($chapter_id)
    {
        $chapter = Chapter::find($chapter_id);

        if (!$chapter) {
            return response()->json([
                'error' => 'Chapitre non trouvé'
            ], 204);
        }

        $choices = Choice::where('chapter_id', $chapter_id)->get();

        if ($choices->isEmpty()) {
            return response()->json([], 200);
        }

        // Retourner les choix associés au chapitre avec un code 200
        return response()->json($choices, 200);
    }


    /**
     * Créer un Choix
     */
    public function createChoice(ChoiceStoreRequest $request)
    {
        try {
            $validated = $request->validated();

        if (!$validated) {
            return response()->json(['message' => 'Invalid JSON data'], 400);
        }

            $choice = Choice::create([
                'content' => $validated['content'],
                'next_chapter_id' => $validated['next_chapter_id'],
                'chapter_id' => $validated['chapter_id'],
            ]);

            return response()->json([
                'message' => 'Choice created successfully',
                'choice' => $choice
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Wrong data',
                'error' => $e->getMessage() 
            ], 422); 
        }
    }

    public function updateChoice(ChoiceUpdateRequest $request, $id) 
    {
        try {
            $validated = $request->validated();
    
            if (!$validated) {
                return response()->json(['message' => 'Invalid JSON data'], 400);
            }
    
            $choice = Choice::find($id);
    
            if (!$choice) {
                return response()->json(null, 204); 
            }
    
            $choice->update(array_filter([
                'content' => $validated['content'] ?? $choice->content,
                'chapter_id' => $validated['chapter_id'] ?? $choice->chapter_id,
                'next_chapter_id' => $validated['next_chapter_id'] ?? $choice->next_chapter_id,
            ]));
    
            return response()->json([
                'message' => 'Choice updated successfully',
                'choice' => $choice
            ], 200);
    
        } catch (\Exception $e) {
    
            return response()->json([
                'message' => 'Wrong data or invalid request format',
                'error' => $e->getMessage()
            ], 422); 
        }
    }

    public function deleteChoice($id)
    {
        $choice = Choice::find($id);

        if (!$choice) {
            return response()->json(null, 204); 
        }

        $choice->delete();

        return response()->json(['message' => 'Choice deleted successfully'], 200);
    }


}
