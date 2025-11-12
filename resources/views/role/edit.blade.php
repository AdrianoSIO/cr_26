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
<title>Modifier le Roles</title>
<h1>Modifier le Roles</h1>

<form action="{{ route('role.update', ['role' => $roleModel->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <lbael for="code">Code du Rôle:</label>
    <input type="text" id="code" name="code" value='{{ $roleModel->code }}' required>
    <br>
    
    <label for="nom">Nom du Roles:</label>
    <input type="text" id="nom" name="nom" value='{{ $roleModel->nom }}'required>
    <br>
    <label for="commentaire">Commentaire:</label>
    <textarea id="commentaire" name="commentaire">{{ $roleModel->commentaire }}</textarea>
    <br>
    <button type="submit"class="contrast">Mettre à jour</button>
    <br>
</form>
<center>

<button type="button" class="secondary"><a href="{{ route('roles') }}">Retour à la liste</a>
</center>
@endsection
