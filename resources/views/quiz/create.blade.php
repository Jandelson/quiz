@extends('quiz.layout')
@section('conteudo')
    <div class="container">
        <form action="{{ route('register_quiz') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="inputDescriptionQuiz">Nome do Quiz</label>
                <input type="text" id="description" name="description" class="form-control" placeholder="Nome do Quiz"
                    required>
            </div>
            <div class="alert alert-primary" role="alert">
                Crie seu Quiz com 5 perguntas e 3 alternativas por pergunta
            </div>
            <button type="submit" class="btn btn-primary">Criar</button>
        </form>
        <br>
        <div class="card">
            <table class="table table-hover table-bordered results">
                <thead>
                    <tr>
                        <th class="col-md-5 col-xs-5">Quizzes</th>
                        <th class="col-md-5 col-xs-5">Editar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($quizzes as $quiz)
                        <tr>
                            <td>{{ $quiz->description }}</td>
                            <td><a href="{{ route('edit_quiz', $quiz->id) }}" type="button"
                                    class="btn btn-info">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
