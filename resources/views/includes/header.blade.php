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
        
<script>
    const burger = document.getElementById('burger');
    const navLinks = document.getElementById('nav-links');

    burger.addEventListener('click', () => {
        navLinks.classList.toggle('active');
    });
</script>