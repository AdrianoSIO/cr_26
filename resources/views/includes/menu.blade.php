<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Menu Aligné</title>
  <style>
    /* Style général du menu */
    nav {
      background-color: #f5f5f5;
      padding: 10px 20px;
      display: flex;
      justify-content: center; /* Centre tout le menu */
      align-items: center;
      gap: 15px; /* espace entre éléments */
      border-radius: 12px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      font-family: Arial, sans-serif;
    }

    ul.navigation {
      list-style: none;
      display: flex;
      align-items: center;
      margin: 0;
      padding: 0;
      gap: 15px;
    }

    li.navigation-item {
      display: flex;
      align-items: center;
    }

    button {
      border: none;
      border-radius: 8px;
      padding: 8px 15px;
      cursor: pointer;
      font-size: 14px;
      transition: background 0.3s ease;
    }

    button.contrast {
      background-color: #333;
      color: white;
    }

    button.contrast:hover {
      background-color: #555;
    }

    button.secondary {
      background-color: #ddd;
      color: #333;
    }

    button.secondary:hover {
      background-color: #ccc;
    }

    a {
      text-decoration: none;
      color: inherit;
    }

    select {
      border-radius: 8px;
      padding: 8px 10px;
      border: 1px solid #aaa;
      background-color: white;
      font-size: 14px;
      cursor: pointer;
    }

    select:focus {
      outline: none;
      border-color: #333;
    }
  </style>
</head>
<body>

  <nav>
    <li class="navigation-item">
  <button class="contrast">
    <a href="{{ route('accueil') }}">Accueil</a>
  </button>
</li>

<li class="navigation-item">
  <select name="classement" aria-label="Classement" onchange="if (this.value) window.location.href=this.value;">
    <option selected disabled value="">Collège </option>
    <option value="{{ route('eleves') }}">Élève</option>
    <option value="{{ route('equipe') }}">Équipe</option>
  </select>
</li>

<li class="navigation-item">
  <button class="secondary">
    <a href="{{ route('genre') }}">Genres</a>
  </button>
</li>

<li class="navigation-item">
  <button class="contrast">
    <a href="{{ route('pays') }}">Pays</a>
  </button>
</li>

<li class="navigation-item">
  <button class="secondary">
    <a href="{{ route('epreuve') }}">Épreuves</a>
  </button>
</li>
<li class="navigation-item">
  <select name="admin" aria-label="Admin" onchange="if (this.value) window.location.href=this.value;">
    <option selected disabled value="">Edition </option>
    <option value="{{ route('edition') }}">2025</option>
    <option value="{{ route('edition') }}">2024</option>
  </select>
</li>

<li class="navigation-item">
  <select name="admin" aria-label="Admin" onchange="if (this.value) window.location.href=this.value;">
    <option selected disabled value="">Admin </option>
    <option value="{{ route('edition') }}">Édition</option>
    <option value="{{ route('secretaire') }}">Sécretaire</option>
    <option value="{{ route('gestionnaire') }}">Gestionnaire</option>
  </select>
</li>

<li class="navigation-item">
  <button class="contrast">
    <a href="{{ route('utilisateurs') }}">Utilisateurs</a>
  </button>
</li>

<li class="navigation-item">
  <button class="secondary">
    <a href="{{ route('roles') }}">Rôles</a>
  </button>
</li>

<li class="navigation-item">
  <select name="resultat" aria-label="Résultat" onchange="if (this.value) window.location.href=this.value;">
    <option selected disabled value="">Résultat </option>
    <option value="{{ route('resultat.edition') }}">Édition</option>
    <option value="{{ route('resultat.exportation') }}">Exportation</option>
    <option value="{{ route('resultat.modification') }}">Modification</option>
  </select>
</li>


      </li>
    </ul>
  </nav>

</body>
</html>
