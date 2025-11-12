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
<title>Gestion des genres</title>
<h1>Gestion des genres</h1>
<?php use App\Models\Genre; ?>
<table>
    <thead>
        <tr>
            <th>Identifiant du Genre</th>
            <th>Nom du Genre</th>
            <th>Commentaire</th>
            <th>Actions</th>
        </tr>
    </thead>
    <body>

        
        <?php $Genres = Genre::simplepaginate(10)?>
        @foreach($Genres as $Genre)
        <tr>
            <td>{{ $Genre->code }}</td>
            <td>{{ $Genre->nom }}</td>
            <td>{{ $Genre->commentaire}}</td>
            <td><center><button class="contrast"type="submit"><a href="{{ route('genre.edit', ['genre' => $Genre->code]) }}">Modifier</a></button> |
                <form action="{{ route('genre.suppression', ['genre' => $Genre->code]) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="secondary" type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce genre ?')">Supprimer</button>
                </form>
                </center>
            </td>
        </tr>
        @endforeach
    </body>
@endsection