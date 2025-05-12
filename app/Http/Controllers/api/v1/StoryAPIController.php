<?php

namespace App\Http\Controllers\api\v1;
use Inertia\Controller;

use App\Models\Story;
use App\Http\Requests\StoryStoreRequest;
use App\Http\Requests\StoryUpdateRequest;

class StoryAPIController extends Controller
{
    /**
     * Récupérer tous les chapitres
     */
    public function getStories()
    {
        $stories = Story::all();

        if ($stories->isEmpty()) {
            return response()->json([], 200);
        }

        return response()->json($stories, 200);
 
    }

    /**
     * Récupérer un chapitre par son ID
     */
    public function getStory($id)
    {
        $story = Story::find($id);

        if (!$story) {
            return response()->json([], 200);
        }

        return response()->json($story, 200);
    }

    public function createStory(StoryStoreRequest $request)
    {
        try {
            $validated = $request->validated();

            if (!$validated) {
                return response()->json(['message' => 'Invalid JSON data'], 400);
            }

            $story = Story::create([
                'title' => $validated['title'],
                'description' => $validated['description'],
                'cover_image' => $validated['cover_image'],
                'author' => $validated['author'],
                
            ]);

            return response()->json([
                'message' => 'Story created successfully',
                'story' => $story
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Wrong data',
                'error' => $e->getMessage() 
            ], 422); 
        }
    }
    public function updateStory(StoryUpdateRequest $request, $id) 
    {
        try {
            $validated = $request->validated();
    
            if (!$validated) {
                return response()->json(['message' => 'Invalid JSON data'], 400);
            }
    
            $story = Story::find($id);
    
            if (!$story) {
                return response()->json(null, 204); 
            }

            $story->update(array_filter([
                'title' => $validated['title'] ?? $story->title,
                'description' => $validated['description'] ?? $story->description,
                'author' => $validated['author'] ?? $story->author,
                'cover_image' => $validated['cover_image'] ?? $story->cover_image,
            ]));
    
            return response()->json([
                'message' => 'Choice updated successfully',
                'story' => $story
            ], 200);
    
        } catch (\Exception $e) {
    
            return response()->json([
                'message' => 'Wrong data or invalid request format',
                'error' => $e->getMessage()
            ], 422); 
        }
    }

    /**
     * Supprimer une histoire
     */
    public function deleteStory($id)
    {
        $story = Story::find($id);

        if (!$story) {
            return response()->json(null, 204); 
        }

        $story->delete();

        return response()->json(['message' => 'Story deleted successfully'], 200);
    }

}
