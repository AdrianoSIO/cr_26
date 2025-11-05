<!doctype html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/pico.amber.css" media="all">
</head>
<body>
    
<div class="website">
<header class="header">
@include('includes.header')

</header>
<aside class="aside">
<nav class="navigation">
@include('includes.menu')
</nav>
</aside>
<center>
<main id="main" class="main">
@yield('contenu')
</main>
</center>
</div>
</body>
</html>