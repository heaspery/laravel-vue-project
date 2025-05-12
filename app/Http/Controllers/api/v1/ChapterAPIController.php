<?php

namespace App\Http\Controllers\api\v1;
use App\Models\Chapter;
use App\Http\Requests\ChapterStoreRequest;
use App\Http\Requests\ChapterUpdateRequest;
use Inertia\Controller;


use Illuminate\Http\Request;

class ChapterAPIController extends Controller
{

    /**
     * Récupérer tous les chapitres
     */
    public function getChapters()
    {
        $chapters = Chapter::all();

        if ($chapters->isEmpty()) {
            return response()->json([], 200);
        }

        return response()->json($chapters, 200);
 
    }

    /**
     * Récupérer un chapitre par son ID
     */
    public function getChapter($id)
    {
        $chapter = Chapter::find($id);

        if (!$chapter) {
            return response()->json([], 200);
        }

        return response()->json($chapter, 200);
    }

    /**
     * Récupérer tous les chapitres d'une histoire
     */

    public function getChaptersByStory($story_id)
{
    $chapters = Chapter::where('story_id', $story_id)->get();

    if ($chapters->isEmpty()) {
        return response()->json([], 200);    
    }

    return response()->json($chapters, 200);
}

    /**
     * Créer un chapitre
     */
    public function createChapter(ChapterStoreRequest $request)
    {
        try {
            $validated = $request->validated();

        if (!$validated) {
            return response()->json(['message' => 'Invalid JSON data'], 400);
        }

            $chapter = Chapter::create([
                'title' => $validated['title'],
                'content' => $validated['content'],
                'story_id' => $validated['story_id'],
                'image' => $validated['image'],
            ]);

            return response()->json([
                'message' => 'Chapter created successfully',
                'chapter' => $chapter
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Wrong data',
                'error' => $e->getMessage() 
            ], 422); 
        }
    }

    /**
     * Mettre à jour un chapitre : 0 champ, 1 champ ou tous les champs
     */
    public function updateChapter(ChapterUpdateRequest $request, $id) 
{
    try {
        $validated = $request->validated();

        if (!$validated) {
            return response()->json(['message' => 'Invalid JSON data'], 400);
        }

        $chapter = Chapter::find($id);

        if (!$chapter) {
            return response()->json(['message' => 'Chapter not found'], 404);
        }

        $chapter->update(array_filter([
            'title' => $validated['title'] ?? $chapter->title,
            'content' => $validated['content'] ?? $chapter->content,
            'story_id' => $validated['story_id'] ?? $chapter->story_id,
            'image' => $validated['image'] ?? $chapter->image,
        ]));

        return response()->json([
            'message' => 'Chapter updated successfully',
            'chapter' => $chapter
        ], 200);

    } catch (\Exception $e) {

        return response()->json([
            'message' => 'Wrong data or invalid request format',
            'error' => $e->getMessage()
        ], 422); 
    }
}
    /**
     * Supprimer un chapitre
     */
    public function deleteChapter($id)
    {
        $chapter = Chapter::find($id);

        if (!$chapter) {
            return response()->json(['message' => 'Chapter not found'], 404);
        }

        $chapter->delete();

        return response()->json(['message' => 'Chapter deleted successfully'], 200);
    }


}
