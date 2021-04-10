<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use App\Models\Quiz;


class ApisController extends Controller
{
    public function index()
    {
        try {
            $quiz = Quiz::with('questions', 'answers')
                ->where('validity', '>=', date('Y-m-d'))
                ->get();

            $array = $quiz->toArray();
            for ($i = 0; $i < count($array); $i++) {
                $array[$i]['questions'] = Arr::shuffle($array[$i]['questions']);
            }

            return response()->json([
                'data' => [
                    $array
                ]
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['erro: ' => $e->getMessage()], 401);
        }
    }
}
