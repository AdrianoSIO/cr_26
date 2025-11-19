<?php

use App\Livewire\Actions\Logout;
use function Livewire\Volt\action;

$logout = action(function (Logout $logoutAction) {
    $logoutAction();
    $this->redirect('/', navigate: true);
});
?>
<nav class="navbar">
    <div class="navbar-brand">
        <a href="{{ route('accueil') }}">Projet concours-robots</a>
        <button class="burger" id="burger">
            <span></span><span></span><span></span>
        </button>
    </div>

    <ul class="nav-links" id="nav-links">
        <li><a href="{{ route('accueil') }}">Accueil</a></li>

        @guest
        <li class="dropdown">
            <a href="#">Collèges ▾</a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('eleves') }}">Élèves</a></li>
                <li><a href="{{ route('equipe') }}">Équipe</a></li>
            </ul>
        </li>

        <li><a href="{{ route('epreuve') }}">Épreuves</a></li>
        <li><a href="{{ route('classement') }}">Classement</a></li>

        @if (Route::has('login'))
        <li><a href="{{ route('login') }}">Connexion</a></li>
        @endif
        @if (Route::has('register'))
        <li><a href="{{ route('register') }}">Inscription</a></li>
        @endif
        @else
        <li class="dropdown">
            <a href="#">Collèges ▾</a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('eleves') }}">Élèves</a></li>
                <li><a href="{{ route('equipe') }}">Équipe</a></li>
            </ul>
        </li>

        <li><a href="{{ route('epreuve') }}">Épreuves</a></li>
        <li><a href="{{ route('classement') }}">Classement</a></li>

        <li class="dropdown">
            <a href="#">Page Gestion ▾</a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('epreuve') }}">Épreuves</a></li>
                <li><a href="{{ route('college') }}">Collèges</a></li>
                <li><a href="{{ route('abonnement') }}">Abonnement</a></li>
                <li><a href="{{ route('roles') }}">Rôle</a></li>
                <li class="dropdown">
                    <a href="#">Résultat ▾</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('resultat.edition') }}">Édition</a></li>
                        <li><a href="{{ route('resultat.exportation') }}">Exportation</a></li>
                        <li><a href="{{ route('resultat.modification') }}">Modification</a></li>
                    </ul>
                </li>
            </ul>
        </li>

        <li class="dropdown">
            <a href="#">Page Admin ▾</a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('genre') }}">Genre</a></li>
                <li><a href="{{ route('utilisateurs') }}">Utilisateurs</a></li>
                <li><a href="{{ route('pays') }}">Pays</a></li>
            </ul>
        </li>

        <!-- Déconnexion -->
        <li>
        @livewire('layouts.navigation')
        </li>
        @endguest
    </ul>
</nav>

<script>
    const burger = document.getElementById('burger');
    const navLinks = document.getElementById('nav-links');

    burger.addEventListener('click', () => {
        navLinks.classList.toggle('active');
    });
</script>