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
<p>Liste des pays enregistrés dans le système.</p>
<table>
    <thead>
        <tr>
            <th>Code</th>
            <th>Nom</th>
            <th>Precision</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pays as $pay)
            <tr>
                <td>{{ $pay->code }}</td>
                <td>{{ $pay->nom }}</td>
                <td>{{ $pay->commentaire }}</td>
                <td><center><button class="contrast"type="submit"><a href="{{ route('pay.edit', ['pay' => $pay->code]) }}">Modifier</a></button> |
                <form action="{{ route('pay.suppression', ['pay' => $pay->code]) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="secondary" type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce pays ?')">Supprimer</button>
                </form>
                </center>
            </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Liens de pagination -->
{{ $pays->links() }}
@endsection
