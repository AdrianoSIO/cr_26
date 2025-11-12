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
            <td><center>{{ $pay->code }} </center></td>
            <td><center>{{ $pay->nom }}</center></td>
            <td><center>{{ $pay->commentaire}}</center></td>
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
    </body>
</table>
{!! $pays->links() !!}



@endsection
