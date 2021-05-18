@extends('layouts.app')
@section('conteudo')
<div class="container">
    <form action="{{ route('register_question') }}" method="POST">
        @csrf
        <div class="form-group">
            <div class="my-3 p-3 bg-white rounded shadow-sm">
                <h6 class="border-bottom border-gray pb-2 mb-0">Perguntas do quiz: {{ $quiz->description }}</h6>
                <input type="hidden" id="quiz_id" name="quiz_id" value="{{ $quiz->id }}">
                <div class="media text-muted pt-3">
                    <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32">
                        <rect width="100%" height="100%" fill="#007bff"></rect>
                    </svg>
                    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        <strong class="d-block text-gray-dark">
                            <input type="text" id="description" name="description" class="form-control" placeholder="Pergunta" required>
                        </strong>
                    </p>
                </div>
                <a class="btn-link" data-toggle="collapse" data-target="#answer">Respostas</a>
                <div id="answer" class="collapse">
                    <div class="form-inline">
                        <div class="form-group mx-sm-3 mb-2">
                            <label  class="col-sm-4 col-form-label">Resposta 1:</label>
                            <input type="text" class="form-control" id="answer0" name="answer0" required>
                        </div>
                        <label>Ponto (entre 0 e 10)</label>
                        <input type="range" min="0" id="score0" name="score0" max="10" step="10" value=0>
                    </div>
                    <div class="form-inline">
                        <div class="form-group mx-sm-3 mb-2">
                            <label  class="col-sm-4 col-form-label">Resposta 2:</label>
                            <input type="text" class="form-control" id="answer1" name="answer1" required>
                        </div>
                        <label>Ponto (entre 0 e 10)</label>
                        <input type="range" min="0" id="score1" name="score1" max="10" step="10" value=0>
                    </div>
                    <div class="form-inline">
                        <div class="form-group mx-sm-3 mb-2">
                            <label  class="col-sm-4 col-form-label">Resposta 3:</label>
                            <input type="text" class="form-control" id="answer2" name="answer2" required>
                        </div>
                        <label>Ponto (entre 0 e 10)</label>
                        <input type="range" min="0" id="score2" name="score2" max="10" step="10" value=0>
                    </div>
                </div>
            </div>
            <button type="submit" name="adicionar" class="btn btn-primary" value="adicionar">Adicionar</button>
            <a href="{{ route('quiz') }}" type="submit" name="finalizar" class="btn btn-success" value="finalizar">Finalizar</a>
        </div>
    </form>
    <table class="table table-hover table-bordered results">
        <thead>
            <tr>
                <th class="col-md-5 col-xs-5">Pergunta</th>
                <th class="col-md-5 col-xs-5">Editar</th>
                <th class="col-md-5 col-xs-5">Excluir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($question as $questions)
            <tr>
                <td>{{ $questions->description }}</td>
                <td><a href="{{route('edit_question', $questions->id) }}" type="button" class="btn btn-info">Editar</a></td>
                <td>
                    <form action="{{ route('destroy_question', $questions->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Excluir</button>
                      </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop