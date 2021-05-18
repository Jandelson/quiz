@extends('layouts.app')
@section('conteudo')
<div class="container">
    <form action="{{ route('update_quiz', ['id' => $quiz->id]) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="inputDescriptionQuiz">Nome do Quiz</label>
            <input type="text" id="description" name="description" 
                class="form-control" value="{{ $quiz->description }}">
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>
@stop