@extends('layouts.app')
@section('conteudo')
@if (session('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong> {{ session('status') }} </strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
        </button>
</div>
@endif
<div class="d-flex justify-content-center row">
        <div class="col-md-10 col-lg-10">
                <div class="form-group pull-right">
                        <input type="text" class="search form-control" placeholder="Pesquisar Quiz">
                </div>
                <span class="counter pull-right"></span>
                <table class="table table-hover table-bordered results">
                        <thead>
                                <tr>
                                        <th>#</th>
                                        <th class="col-md-5 col-xs-5">Nome</th>
                                        <th class="col-md-5 col-xs-5">Quiz</th>
                                        <th class="col-md-5 col-xs-5">Ranking</th>
                                </tr>
                        </thead>
                        <tbody>
                                @foreach ($quiz as $quizzes)
                                <tr>
                                        <th scope="row">{{ $quizzes->id }}</th>
                                        <td>{{ $quizzes->description }}</td>
                                        <td><a href="{{ route('answer', ['id' => $quizzes->id]) }}" type="button" class="btn btn-primary">Responder</td>
                                        <td><a type="button" class="btn btn-warning" data-toggle="modal" data-target="#ranking{{ $quizzes->id }}">Visualizar</a></td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="ranking{{ $quizzes->id }}" tabindex="-1" role="dialog" aria-labelledby="ranking" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                        <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Ranking Quiz: {{ $quizzes->description }}</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                </button>
                                                        </div>
                                                        <div class="modal-body">
                                                                <div class="row">
                                                                        <div class="col-sm-4">Nome</div>
                                                                        <div class="col-sm-4">Pontos</div>
                                                                </div>
                                                                @foreach ($result[$quizzes->id] as $results)
                                                                <div class="row">
                                                                        <div class="col-sm-4">{{ $results->name }}</div>
                                                                        <div class="col-sm-4">{{ $results->score }}</div>
                                                                </div>
                                                                <br>
                                                                @endforeach
                                                        </div>
                                                        <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                                @endforeach
                        </tbody>
                </table>
        </div>
</div>
@stop