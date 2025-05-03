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

        if ($users->isEmpty()) {
            return response()->json(null, 204);
        }

        return response()->json($users, 200);
    }

    /**
     * Récupérer un utilisateur par son ID
     */
    public function getUser($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(null, 204);
        }

        return response()->json($user, 200);
    }
}