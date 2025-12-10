@extends('includes.default')
<style>
    label, input, textarea {
        display: block;
        margin-bottom: 10px;
    }
    textarea {
        width: 350px;
        height: 150px;
    }
</style>@extends('includes.default')
@section('contenu')
<title>Modifier le Genre</title>

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

<h1>Modifier le Genre</h1>

<form action="{{ route('genre.update', ['genre' => $genre->code]) }}" method="POST">
    @csrf
    @method('PUT')
    
    <label for="code">Code du Genre:</label>
    <input type="text" id="code" name="code" value="{{ $genre->code }}" required>
    
    <label for="nom">Nom du Genre:</label>
    <input type="text" id="nom" name="nom" value="{{ $genre->nom }}" required>
    
    <label for="commentaire">Commentaire:</label>
    <textarea id="commentaire" name="commentaire">{{ $genre->commentaire }}</textarea>
    
    <button type="submit" class="contrast">Mettre à jour</button>
</form>

<center>
    <button type="button" class="secondary">
        <a href="{{ route('genre') }}">Retour à la liste</a>
    </button>
</center>
@endsection
