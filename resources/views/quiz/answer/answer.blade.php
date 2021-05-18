@extends('layouts.app')
@section('conteudo')
<div class="d-flex justify-content-center row">
        <div class="col-md-10 col-lg-10">
                <form action="{{ route('register_answer', [$quiz->id]) }}" method="POST">
                        @csrf
                        <table class="table table-hover table-bordered results">
                                <thead>
                                        <tr>
                                                <th class="col-md-12 col-xs-12">
                                                        <h5><b>Responda as Perguntas do QUIZ: {{ $quiz->description }}</b></h5><input type="text" name="name" class="form-control" placeholder="Informe seu nome" required>
                                                </th>
                                        </tr>
                                </thead>
                                <tbody>
                                        @foreach ($question as $questions)
                                        <tr>
                                                <td>
                                                        {{ $questions->description }}
                                                        <ul class="list-group">
                                                                @foreach ($answer[$questions->id] as $answers)
                                                                <li class="list-group-item">
                                                                        <input type="radio" id="{{ $answers->id }}" name="{{ $questions->id }}" value=" {{ $answers->score }}" required>
                                                                        {{ $answers->description }}
                                                                </li>
                                                                @endforeach
                                                        </ul>
                                                </td>
                                        </tr>
                                        @endforeach
                                </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary">Responder</button>
                </form>
        </div>
</div>
@stop