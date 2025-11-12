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
                    <a href="{{ route('genre.edit', ['genre' => $genre->code]) }}">Modifier</a>
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
@endsection
