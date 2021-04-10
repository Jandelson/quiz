<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Result;

class AnswersController extends Controller
{
    public function index($id)
    {
        $quiz = Quiz::findOrFail($id);
        $question = Question::where('quiz_id', $quiz->id)->inRandomOrder()->limit(5)->get();
        $answer = [];
        foreach ($question as $questions) {
            $answer[$questions->id] = Answer::where('question_id', $questions->id)->get();
        }
        return view('quiz.answer.answer', [
            'quiz' => $quiz,
            'question' => $question,
            'answer' => $answer
        ]);
    }

    public function store(Request $request, $id)
    {
        $score = 0;
        $answers = $request->request->all();
        $name = $answers['name'];
        
        unset($answers['_token']);
        unset($answers['name']);
        
        foreach ($answers as $answer) {
            $score += $answer;
        }
        
        Result::create([
            'name' => $name,
            'score' => $score,
            'quiz_id' => $id
        ]);

        $message =  
            $name . ' Seu Quiz foi finalizado com sucesso! sua pontuação foi: ' . 
            $score . ' pontos.';

        return redirect('/quiz')->with('status', $message);
    }
}
