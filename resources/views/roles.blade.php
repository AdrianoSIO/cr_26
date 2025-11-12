@extends('includes.default')
<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        min-width: 300px;
        max-width: 100px;
    }
    th, td {
        padding: 10px;
    }
</style>
@section('contenu')
<h1>Rôles</h1>
<p>Gestion des rôles et permissions des utilisateurs.</p>
<table>
    <thead>
        <tr>
            <th>Identifiant du Rôle</th>
            <th>Nom du rôle</th>
            <th>Commentaire</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($roles as $role)
        <tr>
            <td>{{ $role->code }}</td>
            <td>{{ $role->nom }}</td>
            <td>{{ $role->commentaire}}</td>
            <td><center><button class="contrast"type="submit"><a href="{{ route('role.edit', ['role' => $role->id]) }}">Modifier</a></button> |
                <form action="{{ route('role.suppression', ['role' => $role->id]) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="secondary" type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce role ?')">Supprimer</button>
                </form>
                </center>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection