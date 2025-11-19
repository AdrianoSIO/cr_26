@extends('includes.default')
@section('contenu')
<style>
table {
    width: 80%; /* élargir le tableau */
    margin: 0 auto;
    border-collapse: collapse;
}

th, td {
    border: 0.5px solid black;
    padding: 8px; /* plus d'espace dans les cellules */
    text-align: center;
    min-width: 50px;
}

thead th {
    background-color: #f0f0f0;
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

/* Boutons plus petits */
button.contrast, button.secondary {
    padding: 4px 8px;  /* réduit la taille des boutons */
    font-size: 0.85rem;
}

button a {
    text-decoration: none;
    color: inherit;
}
</style>
<title>Gestion des Genres</title>
<h1>Gestion des genres</h1>
<p>Liste des genres disponibles dans le système.</p>

<table>
    <thead>
        <tr>
            <th>Code</th>
            <th>Nom</th>
            <th>Commentaire</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($genres as $genre)
            <tr>
                <td>{{ $genre->code }}</td>
                <td>{{ $genre->nom }}</td>
                <td>{{ $genre->commentaire }}</td>
                <td>
                    <div class="actions-cell">
                    <button class="secondary"type="submit"><a href="{{ route('genre.edit', ['genre' => $genre->code]) }}">Modifier</a></button>
                    <form class="secondary"action="{{ route('genre.suppression', ['genre' => $genre->code]) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="contrast"type="submit" onclick="return confirm('Confirmer la suppression ?')">
                            Supprimer
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div style="margin-top: 20px;">
        <button class="contrast">
            <a href="{{ route('genre.ajout') }}">Ajouter un Pays</a>
        </button>
    </div>
@endsection
