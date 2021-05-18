<section class="menu">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <ul>
        <a class="btn btn-outline-info" href="{{ url('/') }}">Inicio</a>
        <a class="btn btn-outline-info" href="{{ route('quiz') }}">Quizzes</a>
        <a class="btn btn-outline-success" href="{{ route('new_quiz') }}">Criar um quiz</a>
        @if(Auth::check())
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-outline-success" type="submit">
                <span>{{ __('Logout') }}</span>
            </button>
        </form>
        Bem vindo! {{Auth::user()->name}}
        @endif
        </ul>
    </nav>
</section>