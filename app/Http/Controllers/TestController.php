<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class TestController extends Controller
{
    function index(){
        return view('accueil');
    }
    function accueil(): View{
        return view('accueil');
    }function mentions(){
        return view('mentions_légale');
    }function collège(){
        return view('collège');
    }function epreuve(){
        return view('epreuve');
    }function classement(){
        return view('classement');
    }function edition(){
        return view('édition');
    }function secrétaire(){
        return view('sécrétaire');
    }function gestionnaire(){
        return view('gestionnaire');
    }function administrateur(){
        return view('administrateur');
    }
    function equipe(){
        return view('equipe');
    }
    function welcome(){
        return view('welcome');
    }
    
    
    function resultat(){
        return view('resultat');
    }
    function role(){
        return view('resultat');
    }
    function genre(){
        return view('genre');

    }
    function pays(){
        return view('pays');

    }
}
