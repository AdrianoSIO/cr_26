@extends('includes.default')
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
        @foreach($roles as $role)
        <tr>
            <td >{{ $role->code }}</td>
            <td >{{ $role->nom }}</td>
            <td >{{ $role->commentaire}}</td>
            <td>
    <div class="actions-cell">

        <!-- Bouton Modifier -->
        <a href="{{ route('role.edit', $role) }}" class="contrast" style="padding: 6px 12px; display: inline-block;">
            Modifier
        </a>

        <!-- Bouton Supprimer -->
        <form action="{{ route('role.suppression', $role) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button class="secondary" type="submit"
                onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce rôle ?')">
                Supprimer
            </button>
        </form>
    </div>
</td>

        </tr>
        @endforeach
    </tbody>
</table>
</div>
<div style="margin-top: 20px;">
        <button class="contrast">
            <a href="{{ route('role.ajout') }}">Ajouter un Role</a>
        </button>
    </div>
@endsection