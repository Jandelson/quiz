@extends('layouts.app')
@section('conteudo')
    <div class="container">
        <form action="{{ route('update_question', $question->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <div class="my-3 p-3 bg-white rounded shadow-sm">
                    <h6 class="border-bottom border-gray pb-2 mb-0">Atualização Pergunta do quiz: {{ $quiz->description }}
                    </h6>
                    <input type="hidden" id="quiz_id" name="quiz_id" value="{{ $quiz->id }}">
                    <div class="media text-muted pt-3">
                        <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32"
                            xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false"
                            role="img" aria-label="Placeholder: 32x32">
                            <rect width="100%" height="100%" fill="#007bff"></rect>
                        </svg>
                        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <strong class="d-block text-gray-dark">
                                <input type="text" id="description" name="description" class="form-control"
                                    placeholder="Pergunta" value="{{ $question->description }}" required>
                            </strong>
                        </p>
                    </div>
                    <a class="btn-link" data-toggle="collapse" data-target="#answer">Respostas</a>
                    <div id="answer" class="collapse">
                        @foreach ($answer as $key => $answers)
                            <div class="form-inline">
                                <input type="hidden" id="answer{{ $key }}_id" name="answer{{ $key }}_id"
                                    value="{{ $answers->id }}">
                                <div class="form-group mx-sm-3 mb-2">
                                    <label class="col-sm-4 col-form-label">Resposta {{ $key }}:</label>
                                    <input type="text" class="form-control" id="answer{{ $key }}"
                                    name="answer{{ $key }}" value="{{ $answers->description }}">
                                </div>
                                <label>Ponto (entre 0 e 10)</label>
                                <input type="range" min="0" id="score{{ $key }}" name="score{{ $key }}" max="10" step="10" value="{{ $answers->score }}">
                            </div>
                        @endforeach
                    </div>
                </div>
                <button type="submit" name="atualizar" class="btn btn-primary" value="adicionar">Atualizar</button>
            </div>
        </form>
    </div>
@stop
