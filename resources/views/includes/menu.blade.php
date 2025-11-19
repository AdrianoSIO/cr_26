<?php

use App\Livewire\Actions\Logout;
use function Livewire\Volt\action;

$logout = action(function (Logout $logoutAction) {
    $logoutAction();
    $this->redirect('/', navigate: true);
});
?>
@php
    $roleId = Auth::check() ? Auth::user()->getRoleId() : null;
    print_r($roleId);
@endphp

<nav class="navbar">
    <div class="navbar-brand">
        <a href="{{ route('accueil') }}">Projet concours-robots</a>
        <div class="burger" id="burger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <ul class="nav-links" id="nav-links">
        {{-- Lien visible par tout le monde --}}
        <li><a href="{{ route('accueil') }}">Accueil</a></li>

        {{-- Pages publiques accessibles à tous --}}
        <li class="dropdown">
            <a href="#">Collèges ▾</a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('eleves') }}">Élèves</a></li>
                <li><a href="{{ route('equipe') }}">Équipe</a></li>
            </ul>
        </li>

        <li><a href="{{ route('epreuve') }}">Épreuves</a></li>
        <li><a href="{{ route('classement') }}">Classement</a></li>

        @guest
            {{-- Menu invité --}}
            @if(Route::has('login'))
                <li><a href="{{ route('login') }}">Connexion</a></li>
            @endif
            @if(Route::has('register'))
                <li><a href="{{ route('register') }}">Inscription</a></li>
            @endif
        @else
            {{-- Menu utilisateurs connectés --}}
            <li class="dropdown">
                <a href="#">Pages Membres ▾</a>
                <ul class="dropdown-menu">
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

            {{-- Menu Admin uniquement si id_role = 90 --}}
            @if($roleId === 90)
                <li class="dropdown">
                    <a href="#">Page Admin ▾</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('genre') }}">Genre</a></li>
                        <li><a href="{{ route('utilisateurs') }}">Utilisateurs</a></li>
                        <li><a href="{{ route('pays') }}">Pays</a></li>
                    </ul>
                </li>
            @endif

            {{-- Déconnexion --}}
            <li>
                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                    <button type="submit" style="
                        background:none;
                        border:none;
                        color:white;
                        cursor:pointer;
                        padding:0;
                    ">
                        Déconnexion
                    </button>
                </form>
            </li>
        @endguest
    </ul>
</nav>

{{-- Burger menu script --}}
<script>
    const burger = document.getElementById('burger');
    const navLinks = document.getElementById('nav-links');

    burger.addEventListener('click', () => {
        navLinks.classList.toggle('active');
    });
</script>
