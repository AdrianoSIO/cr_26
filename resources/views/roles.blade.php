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
<?php use App\Models\Role; ?>
<table>
    <thead>
        <tr>
            <th>Identifiant du Rôle</th>
            <th>Nom du rôle</th>
            <th>Commentaire</th>
        </tr>
    </thead>
    <tbody>

        <?php $roles = role::all(); ?>
        @foreach($roles as $role)
        <tr>
            <td>{{ $role->code }}</td>
            <td>{{ $role->nom }}</td>
            <td>{{ $role->commentaire}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection