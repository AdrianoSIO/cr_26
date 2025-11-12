@extends('includes.default')

@section('contenu')
<title>Gestion des Pays</title>
<h1>Gestion des pays</h1>
<?php use App\Models\Pay; ?>
<table>
    <thead>
        <tr>
            <th>code</th>
            <th>Nom</th>
            <th>Commentaire</th>
        </tr>
    </thead>
    <body>

        
        <?php $pays = Pay::paginate(10) ?>
        @foreach($pays as $pay)
        <tr>
            
            <td>{{ $pay->code }}</td>
            <td>{{ $pay->nom }}</td>
            <td>{{ $pay->commentaire}}</td>
        </tr>
        @endforeach
    </body>
</table>


{!! $pays->links() !!}
@endsection