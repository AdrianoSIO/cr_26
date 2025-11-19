@extends('includes.default')
@section('contenu')

<h2>Suppression du rôle : {{ $roleModel->nom }}</h2>

@if($utilisateursCount > 0)
    <p>Attention ! {{ $utilisateursCount }} utilisateur(s) sont liés à ce rôle.</p>
    <form method="POST" action="{{ route('role.supp', $roleModel->id) }}">
        @csrf
        <button type="submit" name="action" value="delete_users">Supprimer le rôle et les utilisateurs</button>
        <button type="submit" name="action" value="keep_users">Supprimer le rôle, laisser les utilisateurs sans rôle</button>
        <button type="submit" name="action" value="cancel">Annuler</button>
    </form>
@else
    <p>Ce rôle n'est lié à aucun utilisateur. Voulez-vous le supprimer ?</p>
    <form method="POST" action="{{ route('role.supp', $roleModel->id) }}">
        @csrf
        <button type="submit" name="action" value="delete_users">Supprimer</button>
        <button type="submit" name="action" value="cancel">Annuler</button>
    </form>
@endif

@endsection
