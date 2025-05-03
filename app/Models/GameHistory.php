<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameHistory extends Model
{
    protected $fillable = [
        'user_id',
        'story_id',
        'chapter_id',
        'name_choice',
    ];

    /**
     * L'utilisateur auquel appartient l'historique du jeu.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * L'histoire liée à l'historique du jeu.
     */
    public function story()
    {
        return $this->belongsTo(Story::class);
    }

    /**
     * Le chapitre lié à l'historique du jeu.
     */
    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }
}
