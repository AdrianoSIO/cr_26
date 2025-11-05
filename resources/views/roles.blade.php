@extends('includes.default')

@section('contenu')
<h1>Rôles</h1>
<p>Gestion des rôles et permissions des utilisateurs.</p>
<?php use App\Models\Role; ?>
<table>
    <thead>
        <tr>
            <th>code</th>
            <th>Nom</th>
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