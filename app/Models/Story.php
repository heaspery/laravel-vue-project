<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    // Définir les champs qui peuvent être remplis
    protected $fillable = [
        'title',
        'description',
        'cover_image',
        'author'
    ];

    /**
     * Définir la relation avec les Chapitres.
     */
    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }
}
