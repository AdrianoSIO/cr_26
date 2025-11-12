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
<title>Modifier le Pays</title>
<h1>Modifier le pays</h1>

<form action="{{ route('pay.update', ['pay' => $payModel->code]) }}" method="POST">
    @csrf
    @method('PUT')
    
    <label for="nom">Nom du Pays:</label>
    <input type="text" id="nom" name="nom" value='{{ $payModel->nom }}'required>
    <br>
    <label for="commentaire">Commentaire:</label>
    <textarea id="commentaire" name="commentaire">{{ $payModel->commentaire }}</textarea>
    <br>
    <button type="submit"class="contrast">Mettre à jour</button>
    <br>
</form>
<center>

<button type="button" class="secondary"><a href="{{ route('pays') }}">Retour à la liste</a>
</center>
@endsection
