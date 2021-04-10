<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Quiz;
use App\Models\Question;
use App\Models\Answer;

class QuestionsController extends Controller
{
    public function store(Request $request)
    {
        $quiz = Quiz::findOrFail($request->quiz_id);

        $dataQuestions = $request->request->all();
        $dataQuestion = Question::create([
            'description' => $dataQuestions['description'],
            'quiz_id' => $quiz->id
        ]);
        
        for ($indiceAnswer = 0; $indiceAnswer <= 2; $indiceAnswer++) {
           Answer::create([
                'description' => $dataQuestions['answer' . $indiceAnswer],
                'score' => $dataQuestions['score' . $indiceAnswer],
                'question_id' => $dataQuestion->id
            ]);
        }

        $question = Question::where('quiz_id', $request->quiz_id)->orderBy('id', 'desc')->get();
        return view ('quiz.question.create', [
            'quiz' => $quiz,
            'question' => $question
        ]);
    }

    public function edit($id)
    {
        $question = Question::findOrFail($id);
        $quiz = Quiz::findOrFail($question->quiz_id);
        $answer = Answer::where('question_id', $question->id)->get();
        return view ('quiz.question.edit', [
            'quiz' => $quiz,
            'question' => $question,
            'answer' => $answer
        ]);
    }

    public function update(Request $request, $id)
    {
        $quiz = Quiz::findOrFail($request->quiz_id);
        $question = Question::findOrFail($id);

        $question->description = $request->description;
        $question->save();

        $dataQuestions = $request->request->all();

        for ($indiceAnswer = 0; $indiceAnswer <= 2; $indiceAnswer++) {
            $answer = Answer::findOrFail($dataQuestions['answer' . $indiceAnswer . '_id']);
            $answer->description = $dataQuestions['answer' . $indiceAnswer];
            $answer->score = $dataQuestions['score' . $indiceAnswer];
            $answer->save();
        }

        $question = Question::where('quiz_id', $request->quiz_id)->orderBy('id', 'desc')->get();
        return view ('quiz.question.create', [
            'quiz' => $quiz,
            'question' => $question
        ]);
    }

    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $quiz_id = $question->quiz_id;
        $question->delete();

        $quiz = Quiz::findOrFail($quiz_id);
        $questions = Question::where('quiz_id', $quiz_id)->orderBy('id', 'desc')->get();
       
        
        return view ('quiz.question.create', [
            'quiz' => $quiz,
            'question' => $questions
        ]);
    }
}
