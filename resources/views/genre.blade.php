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
<?php use App\Models\Role; ?>
<table>
    <thead>
        <tr>
            <th>code</th>
            <th>Nom</th>
            <th>Commentaire</th>
        </tr>
    </thead>
    <body>

        
        <?php $roles = Role::simplepaginate(10)?>
        @foreach($roles as $role)
        <tr>
            <td>{{ $role->code }}</td>
            <td>{{ $role->nom }}</td>
            <td>{{ $role->commentaire}}</td>
        </tr>
        @endforeach
    </body>
@endsection