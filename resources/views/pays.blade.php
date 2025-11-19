@extends('includes.default')
@section('title', 'Pays')
@section('contenu')
<style>
table {
    width: 80%; /* élargir le tableau */
    margin: 0 auto;
    border-collapse: collapse;
}

th, td {
    border: 0.5px solid black;
    padding: 8px; /* plus d'espace dans les cellules */
    text-align: center;
    min-width: 50px;
}

thead th {
    background-color: #f0f0f0;
}

.centered-content {
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.actions-cell {
    display: flex;
    gap: 5px;
    justify-content: center;
    align-items: center;
}

/* Boutons plus petits */
button.contrast, button.secondary {
    padding: 4px 8px;  /* réduit la taille des boutons */
    font-size: 0.85rem;
}

button a {
    text-decoration: none;
    color: inherit;
}
</style>

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
                <td >{{ $pay->code }}</td>
                <td >{{ $pay->nom }}</td>
                <td >{{ $pay->commentaire }}</td>
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
    
    <div style="margin-top: 5px;" width="20%">
        <button class="contrast">
            <a href="{{ route('pay.ajout') }}">Ajouter un Pays</a>
        </button>
    </div>
    
    <!-- Liens de pagination -->
    <div style="margin-top: 10px;">
        {{ $pays->links() }}
    </div>
</div>
@endsection