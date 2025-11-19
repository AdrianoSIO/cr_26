@extends('includes.default')

@section('contenu')
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 10px;
    min-width: 300px;
    max-width: 100px;
}
table {
    margin: 0 auto;
}
.centered-content {
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
}
.actions-cell {
    display: flex;
    gap: 10px;
    justify-content: center;
    align-items: center;
}
</style>

<title>Gestion des Pays</title>

<div class="centered-content">
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
                <td style="text-align: center;">{{ $pay->code }}</td>
                <td style="text-align: center;">{{ $pay->nom }}</td>
                <td style="text-align: center;">{{ $pay->commentaire }}</td>
                <td>
                    <div class="actions-cell">
                        <button class="contrast" type="button">
                            <a href="{{ route('pay.edit', ['pay' => $pay->code]) }}">Modifier</a>
                        </button>
                        
                        <form action="{{ route('pay.suppression', ['pay' => $pay->code]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="secondary" type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce pays ?')">Supprimer</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div style="margin-top: 20px;">
        <button class="contrast">
            <a href="{{ route('pay.ajout') }}">Ajouter un Pays</a>
        </button>
    </div>
    
    <!-- Liens de pagination -->
    <div style="margin-top: 20px;">
        {{ $pays->links() }}
    </div>
</div>

@endsection