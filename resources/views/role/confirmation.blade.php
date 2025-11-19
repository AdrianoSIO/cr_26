@extends('includes.default')
@section('contenu')

<style>
    .confirmation-container {
        max-width: 500px;
        margin: 50px auto;
        padding: 25px;
        border-radius: 10px;
        background-color: #f9f9f9;
        text-align: center;
        box-shadow: 0 0 10px rgba(0,0,0,0.2);
        font-family: Arial, sans-serif;
    }

    .confirmation-container h2 {
        margin-bottom: 20px;
        color: #333;
    }

    .confirmation-container p {
        margin-bottom: 25px;
        font-size: 1rem;
        color: #555;
    }

    .confirmation-container form button {
        margin: 5px;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 0.95rem;
        transition: background-color 0.2s;
    }

    .btn-delete {
        background-color: #e53e3e;
        color: white;
    }
    .btn-delete:hover {
        background-color: #c53030;
    }

    .btn-keep {
        background-color: #f6ad55;
        color: white;
    }
    .btn-keep:hover {
        background-color: #dd6b20;
    }

    .btn-cancel {
        background-color: #a0aec0;
        color: white;
    }
    .btn-cancel:hover {
        background-color: #718096;
    }
</style>

<div class="confirmation-container">
    <h2>Suppression du genre : {{ $genreModel->nom }}</h2>

    @if($utilisateursCount > 0)
        <p>Attention ! <strong>{{ $utilisateursCount }}</strong> utilisateur(s) sont liés à ce genre.</p>
        <form method="POST" action="{{ route('genre.suppression', $genreModel->id) }}">
            @csrf
            @method('DELETE')

            <button type="submit" name="action" value="delete_users" class="btn-delete">
                Supprimer le genre et les utilisateurs
            </button>

            <button type="submit" name="action" value="keep_users" class="btn-keep">
                Supprimer le genre, laisser les utilisateurs sans genre
            </button>

            <button type="submit" name="action" value="cancel" class="btn-cancel">
                Annuler
            </button>
        </form>
    @else
        <p>Ce genre n'est lié à aucun utilisateur. Voulez-vous le supprimer ?</p>
        <form method="POST" action="{{ route('genre.suppression', $genreModel->id) }}">
            @csrf
            @method('DELETE')

            <button type="submit" name="action" value="delete_users" class="btn-delete">
                Supprimer
            </button>

            <button type="submit" name="action" value="cancel" class="btn-cancel">
                Annuler
            </button>
        </form>
    @endif
</div>

@endsection
