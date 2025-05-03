<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $fillable = [
        'story_id',
        'title',
        'content',
        'image',
    ];
    /**
     * L'histoire à laquelle appartient le chapitre.
     */
    public function story()
    {
        return $this->belongsTo(Story::class);
    }

    public function choices()
{
    return $this->hasMany(Choice::class);
}
}




