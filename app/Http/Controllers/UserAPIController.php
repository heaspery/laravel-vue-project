<?php

namespace App\Http\Controllers;
use App\Models\User;

class UserAPIController extends Controller
{
    /**
     * Récupérer tous les utilisateurs
     */
    public function getUsers()
    {
        $users = User::all();
        return response()->json($users, 200);
    }

    /**
     * Récupérer un utilisateur par son ID
     */
    public function getUser($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json($user, 200);
    }
}