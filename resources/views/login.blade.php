@extends('includes.default')

@section('title', 'Connexion')
@section('content')
<style>
    .login-container {
        max-width: 400px;
        margin: 60px auto;
        padding: 25px;
        border-radius: 10px;
        background: #1e293b;
        color: white;
        box-shadow: 0 0 10px rgba(0,0,0,0.4);
    }
    .login-container h2 {
        text-align: center;
        margin-bottom: 20px;
    }
    .login-container input, .login-container button {
        width: 100%;
        margin-top: 10px;
    }
    .login-container input {
        padding: 10px;
        border-radius: 5px;
        border: none;
    }
    .login-container button {
        background: #3b82f6;
        color: white;
        padding: 10px;
        border-radius: 5px;
        border: none;
        cursor: pointer;
    }
</style>

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
