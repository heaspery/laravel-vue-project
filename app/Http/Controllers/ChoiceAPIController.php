<?php

namespace App\Http\Controllers;
use App\Models\Choice;
use Illuminate\Http\Request;
use App\Http\Requests\ChoiceStoreRequest;
use App\Http\Requests\ChoiceUpdateRequest;


class ChoiceAPIController extends Controller
{
    /**Récupérer tous les choix
     */
       public function getChoices()
    {
        $choices = Choice::all();
        return response()->json($choices, 200);
 
    }

    /**
     * Récupérer un choix par son ID
     */
    public function getChoice($id)
    {
        $choice = Choice::find($id);

        if (!$choice) {
            return response()->json(['message' => '
            Choice not found'], 404);
        }

        return response()->json($choice, 200);
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
            ], 200);

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
                return response()->json(['message' => 'Choice not found'], 404);
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

}
