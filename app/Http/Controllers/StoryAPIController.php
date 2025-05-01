<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;

class StoryAPIController extends Controller
{
    public function createStory(Request $request)
    {
        try {
            // Création de l'histoire avec des données statiques
            $story = Story::create([
                'title' => 'Chapitre test',
                'description' => 'Contenu test',
                'cover_image' => 1,
                'author' => 'Auteur test'
            ]);
    
            return response()->json([
                'message' => 'Story created successfully',
                'story' => $story
            ], 201); // Retourne un statut 201 pour une création réussie
        } catch (\Exception $e) {
            // Si une exception est levée, capture-la et retourne un message d'erreur
            return response()->json([
                'message' => 'Error creating story',
                'error' => $e->getMessage()  // Affiche l'exception dans la réponse
            ], 500); // Retourne un statut 500 pour une erreur interne du serveur
        }
    }
}
