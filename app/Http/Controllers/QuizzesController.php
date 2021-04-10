<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Result;

class QuizzesController extends Controller
{
    public function index()
    {
        $result = [];
        $quiz = Quiz::where('validity','>=', date('Y-m-d'))->get();
        foreach ($quiz->toArray() as $quizzes) {
            $result[$quizzes['id']] = Result::where('quiz_id', $quizzes['id'])->orderBy('score', 'desc')->get();
        }
        return view('quiz.home', [
            'quiz' => $quiz,
            'result' => $result
        ]);
    }

    public function create()
    {
        $quiz = Quiz::get();
        return view('quiz.create', ['quizzes' => $quiz]);
    }

    public function store(Request $request)
    {
        $quiz = Quiz::create([
            'description' => $request->description
        ]);
        $question = $quiz->questions;
        return view('quiz.question.create', ['quiz' => $quiz, 'question' => $question]);
    }

    public function edit($id)
    {
        $quiz = Quiz::with('questions')->findOrFail($id);
        $question = $quiz->questions;
        return view('quiz.question.create', ['quiz' => $quiz, 'question' => $question]);
    }

    public function update(Request $request, $id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->update([
            'description' => $request->description
        ]);

        return "Quiz Atualizado com Sucesso!";
    }
}
