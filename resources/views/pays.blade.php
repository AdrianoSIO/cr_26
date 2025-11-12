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
<title>Gestion des Pays</title>
<h1>Gestion des pays</h1>
<?php use App\Models\Pay; ?>
<table>
    <thead>
        <tr>
            <th>Identifiant du Pays</th>
            <th>Nom du Pays</th>
            <th>Commentaire</th>
            <th>Actions</th>
        </tr>
    </thead>
    <body>


        <?php $pays = Pay::simplepaginate(10)?>
        @foreach($pays as $pay)
        <tr>
            <td>{{ $pay->code }}</td>
            <td>{{ $pay->nom }}</td>
            <td>{{ $pay->commentaire}}</td>
            <td><a href="{{ route('pay.edit', ['pay' => $pay->code]) }}">Modifier</a> | <a href="{{ route('pay.suppression', ['pay' => $pay->code]) }}" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce pays ?')">Supprimer</a></td>
        </tr>
        @endforeach
    </body>
</table>
{!! $pays->links() !!}



@endsection
