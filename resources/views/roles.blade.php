@extends('includes.default')
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    min-width: 300px;
    max-width: 100px;
}
table {
    margin: 0 auto;
}
.centered-content {
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
}
.actions-cell {
    display: flex;
    gap: 5px;
    justify-content: center;
    align-items: center;
}
</style>
@section('contenu')
<title>Gestion des Rôles</title>
<div class="centered-content">
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
            <td style="text-align: center;">{{ $role->code }}</td>
            <td style="text-align: center;">{{ $role->nom }}</td>
            <td style="text-align: center;">{{ $role->commentaire}}</td>
            <td style="text-align: center;"><center>
                <div class="actions-cell">
                    <button class="contrast"type="submit"><a href="{{ route('role.edit', ['role' => $role->id]) }}">Modifier</a></button> |
                <form action="{{ route('role.suppression', ['role' => $role->id]) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="secondary" type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce role ?')">Supprimer</button>
                </form>
                </div>
                </center>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
<div style="margin-top: 20px;">
        <button class="contrast">
            <a href="{{ route('role.ajout') }}">Ajouter un Role</a>
        </button>
    </div>
@endsection