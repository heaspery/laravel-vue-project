<?php

namespace App\Http\Controllers;
use App\Models\Chapter;

use Illuminate\Http\Request;

class ChapterAPIController extends Controller
{

    public function getAllChapters()
    {
        $chapters = Chapter::all();
        return response()->json($chapters, 200);
 
    }
    public function createChapter(Request $request)
    {
        try {
            $validated = $request->validate([
                'story_id' => 'required|exists:stories,id',
                'title' => 'required|string',
                'content' => 'required|string',
                'image' => 'required|string',        
            ]);

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
}
