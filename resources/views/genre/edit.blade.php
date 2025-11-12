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
</style>
@section('contenu')
<title>Modifier le Genre</title>
<h1>Modifier le Genre</h1>

<form action="{{ route('genre.update', ['genre' => $genre->code]) }}" method="POST">
    @csrf
    @method('PUT')
    
    <label for="nom">Nom du Genre:</label>
    <input type="text" id="nom" name="nom" value='{{ $genre->nom }}'required>
    <br>
    <label for="commentaire">Commentaire:</label>
    <textarea id="commentaire" name="commentaire">{{ $genre->commentaire }}</textarea>
    <br>
    <button type="submit"class="contrast">Mettre à jour</button>
    <br>
</form>
<center>

<button type="button" class="secondary"><a href="{{ route('genre') }}">Retour à la liste</a>
</center>
@endsection
