Concours de Robots - Application de Gestion

📌 Contexte

Ce projet est une application web dédiée à la gestion du concours de robots organisé annuellement entre plusieurs collèges des Deux-Sèvres, dans le cadre de l'enseignement de technologie.

L'objectif principal est d'offrir une plateforme moderne, sécurisée et responsive pour administrer l'intégralité du concours, de l'inscription des équipes à la publication des résultats finaux.

🚀 Fonctionnalités principales

L'application couvre tous les aspects de la gestion du concours :

    Inscriptions en ligne : Les équipes peuvent être inscrites par les professeurs de technologie de chaque collège.

    Gestion des épreuves : Administration complète des différentes épreuves, incluant la définition des barèmes et des coefficients.

    Saisie des résultats : Interface dédiée pour la saisie rapide des notes par les secrétaires pendant l'événement.

    Consultation et Export : Accès aux résultats en temps réel et possibilité d'exporter les données au format tableur (CSV, ODS, XLS).

    Classements dynamiques : Génération automatique des classements selon différentes catégories (Concours général, Esthétique, Site web, Meilleure équipe par collège).

    Accès Public : Mise à disposition d'un espace public pour consulter les informations générales et les résultats finaux.

    Design Responsive : Optimisation pour une utilisation fluide sur ordinateur, tablette et smartphone.

Mais Je me suis occupé de la creation,consulation , mise à jour et la suppression :

    De la tables rôle donc l'ajout d'un rôle, sa supression, sa modification.

    De la table Pays donc l'ajout d'un rôle, sa supression, sa modification.

    De la table Genre donc l'ajout d'un rôle, sa supression, sa modification.


🛠️ Technologies Utilisées

Ce projet est construit sur une architecture robuste et moderne MVC:

    Backend : PHP avec le framework Laravel.

    Base de Données : (Configuration via .env.example, généralement MySQL ou PostgreSQL).

    Frontend : HTML (avec moteur de templates Blade), CSS (majoritairement Tailwind CSS).

⚙️ Installation

Suivez ces étapes pour installer et lancer l'application en local.

Prérequis

    PHP (version compatible avec Laravel)

    Composer

    Node.js et npm/yarn

    Une base de données (ex : MySQL, SQLite, PostgreSQL)

Étapes

    Cloner le dépôt :
    Bash

git clone https://github.com/AdrianoSIO/cr_26.git
cd cr_26

Installer les dépendances PHP :
Bash

composer install

Installer les dépendances Frontend :
Bash

npm install

Configuration de l'environnement :

    Copie de mon .env dans le .env exemple

cp .env.example .env

Générez une clé d'application :
Bash

    php artisan key:generate

    Modifiez le fichier .env pour configurer l'accès à votre base de données (DB_*).

Exécuter les migrations et le seeder (si existant) :
Bash

php artisan migrate --seed

Compiler les assets :
Bash

npm run dev  # Pour le développement
# ou
npm run build # Pour la production

Lancer le serveur de développement Laravel :
Bash

    php artisan serve

L'application sera accessible à l'adresse communiqué après l'execution de l'installation

👥 Rôles Utilisateurs

Le système gère un ensemble de rôles utilisateurs pour assurer la sécurité et la séparation des responsabilités :
Rôle	Accès et Responsabilités
Administrateur	Tous les droits sur l'application (Super-utilisateur).
Gestionnaire	Supervision générale, modification des notes, édition des résultats, gestion des utilisateurs.
Secrétaire	Saisie des notes et des résultats pendant les épreuves.
Jury	Évaluation spécifique des épreuves (ex: esthétique, site web).
Enseignant	Inscription des équipes de son collège et suivi de leur progression.
Élève	Membre d'équipe (si authentification spécifique) ou rôle de support (Jury/Secrétaire simplifié).
Abonné	Accès en lecture seule à certaines sections.
Visiteur	Consultation publique des informations générales et des résultats finaux.
