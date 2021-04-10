<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable = ['description'];

    public function questions()
    {
        return $this->hasMany(Question::class, 'quiz_id');
    }

    public function answers()
    {
        return $this->hasManyThrough(Answer::class, Question::class);
    }
}

