🤖 Concours de Robots – Application de Gestion
📌 Contexte

Ce projet est une application web dédiée à la gestion du concours de robots organisé annuellement entre plusieurs collèges des Deux-Sèvres, dans le cadre de l’enseignement de la technologie.

L’objectif principal est de proposer une plateforme moderne, sécurisée et responsive permettant d’administrer entièrement le concours, depuis l’inscription des équipes jusqu’à la publication des résultats finaux.

🚀 Fonctionnalités principales

L’application gère tous les aspects du concours :

Inscriptions en ligne des équipes par les enseignants.

Gestion complète des épreuves avec définition des barèmes et coefficients.

Saisie rapide des résultats par les secrétaires.

Consultation des résultats en temps réel.

Export des données au format CSV, XLS et ODS.

Génération automatique des classements :

Classement général

Esthétique

Site web

Meilleure équipe par collège

Accès public aux informations générales.

Interface responsive (ordinateur, tablette, mobile).

👤 Travail réalisé personnellement

Je me suis chargé des fonctionnalités CRUD (Créer, Lire, Modifier, Supprimer) pour les tables suivantes :

Table rôle

Création d’un rôle

Modification

Suppression

Table pays

Création

Modification

Suppression

Table genre

Création

Modification

Suppression

🛠️ Technologies utilisées

Le projet repose sur une architecture MVC moderne.

Backend : PHP avec Laravel
Frontend : Blade, HTML, CSS, Tailwind CSS
Base de données : MySQL / PostgreSQL / SQLite
Outils : Composer, Node.js, npm
Versionning : GitHub

⚙️ Installation complète (sur une machine vierge)

Cette section explique comment lancer le projet sur un ordinateur ne disposant pas de Laravel, Composer ou configuration préalable.

1️⃣ Installer les prérequis
PHP

Vérifier :

php -v


Installer PHP si nécessaire : https://www.php.net/downloads


Version recommandée : PHP 8.1 ou plus.

Composer

Vérifier :

composer -V


Installer : https://getcomposer.org/download/

Node.js et npm

Vérifier :

node -v
npm -v


Installer : https://nodejs.org

(version LTS recommandée)

Git

Vérifier :

git --version


Installer : https://git-scm.com/

Base de données

Installez l’une de ces bases :

MySQL / MariaDB

PostgreSQL

SQLite (plus simple pour débuter)

2️⃣ Cloner le projet GitHub
git clone https://github.com/AdrianoSIO/cr_26.git
cd cr_26

3️⃣ Installer les dépendances
PHP (Backend)
composer install

Frontend
npm install

4️⃣ Configuration de Laravel

Copier le fichier d’environnement :

cp .env.example .env


Générer la clé Laravel :

php artisan key:generate

5️⃣ Configuration de la base de données

Modifier le fichier .env

Exemple pour MySQL :
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=robot
DB_USERNAME=root
DB_PASSWORD=


Créer la base de données avant de continuer.

OU avec SQLite :
touch database/database.sqlite


Dans .env :

DB_CONNECTION=sqlite
DB_DATABASE=/chemin/absolu/cr_26/database/database.sqlite

6️⃣ Créer les tables
php artisan migrate --seed

7️⃣ Compiler le front

Développement :

npm run dev


Production :

npm run build

8️⃣ Démarrer le serveur
php artisan serve


Accéder à l’application :
http://127.0.0.1:8000

✅ Le projet est fonctionnel en local.

👥 Rôles utilisateurs

Administrateur : tous les droits

Gestionnaire : supervision générale

Secrétaire : saisie des notes

Jury : évaluation des épreuves

Enseignant : gestion des équipes

Élève : participation

Visiteur : consultation publique

🧰 Commandes utiles
php artisan serve               # Lancer le serveur
php artisan migrate:fresh --seed # Réinitialiser la base
php artisan optimize:clear      # Nettoyer le cache
php artisan route:list          # Voir les routes

🎯 Objectif pédagogique

Ce projet a pour but de développer des compétences en développement web professionnel, base de données, travail collaboratif et architecture MVC avec Laravel.
