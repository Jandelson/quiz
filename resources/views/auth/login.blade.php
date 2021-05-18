@extends('layouts.app')
@section('conteudo')
    <div class="container">
        <div class="card card-signin my-5">
            <div class="card-body">
              <h5 class="card-title text-center">Login</h5>
              <form class="form-signin" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-label-group">
                  <input name="email" type="email" id="email" class="form-control" placeholder="Email" required autofocus>
                  <label for="inputEmail">Email</label>
                </div>
  
                <div class="form-label-group">
                  <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                  <label for="inputPassword">Senha</label>
                </div>
                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Entrar</button>
              </form>
            </div>
          </div>
    </div>
@stop
