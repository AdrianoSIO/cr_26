@extends('includes.default')

@section('contenu')
<style>
    label, input, textarea {
        display: block;
        margin-bottom: 10px;
    }
    textarea {
        width: 350px;
        height: 150px;
    }
</style>

<title>Ajout de Pays</title>
<h1>Ajouter un pays</h1>

<!-- Affichage des erreurs de validation -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Affichage du message de succès -->
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<!-- Formulaire pour l'ajout d'un pays -->
<form action="{{ route('pay.ajout') }}" method="POST">
    @csrf
    @method('POST')
    <label for="code">Code du Pays:</label>
    <input type="text" id="code" name="code" value="{{ old('code') }}" required>
    <br>
    
    <label for="nom">Nom du Pays:</label>
    <input type="text" id="nom" name="nom" value="{{ old('nom') }}" required>
    <br>
    
    <label for="commentaire">Commentaire:</label>
    <textarea id="commentaire" name="commentaire">{{ old('commentaire') }}</textarea>
    <br>
    
    <button type="submit" class="contrast">Ajouter le pays</button>
    <br>
</form>

<center>
    <button type="button" class="secondary">
        <a href="{{ route('pays') }}">Retour à la liste</a>
    </button>
</center>

@endsection