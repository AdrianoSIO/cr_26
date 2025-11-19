@extends('includes.default')

@section('title', 'Connexion')
@section('contenu')

<div class="login-container">
    <h2>Connexion</h2>

    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <form method="POST" action="{{ route('login.post') }}">
        @csrf

        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required>

        @error('email')
            <span style="color:red;">{{ $message }}</span>
        @enderror

        <label>Mot de passe</label>
        <input type="password" name="password" required>

        @error('password')
            <span style="color:red;">{{ $message }}</span>
        @enderror

        <button type="submit">Se connecter</button>
    </form>
</div>

@endsection
