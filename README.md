# 🤖 Concours de Robots – Documentation Technique

## 📌 Présentation

Application web de gestion du concours de robots annuel entre collèges des Deux-Sèvres. Plateforme complète pour l'administration du concours, de l'inscription jusqu'aux résultats finaux.
---

## 🚀 Installation rapide

### Prérequis (déjà installés)
- PHP 8.1+
- Composer
- Node.js & npm
- MySQL
- Git

### Installation en 5 étapes

```bash
# 1. Cloner le projet
git clone https://github.com/AdrianoSIO/cr_26.git
cd cr_26

# 2. Installer les dépendances
composer install
npm install

# 3. Configuration Laravel
cp .env.example .env
php artisan key:generate

# 4. Configurer la base de données
# Éditez .env avec vos paramètres MySQL :
# DB_DATABASE=robot
# DB_USERNAME=root
# DB_PASSWORD=votre_mot_de_passe

# Créer la base de données
mysql -u root -p -e "CREATE DATABASE robot;"

# 5. Initialiser et lancer
php artisan migrate --seed
npm run dev & php artisan serve
```

🎉 **Accès** : http://127.0.0.1:8000

---

## 🏗️ Architecture technique

### Stack technologique
- **Backend** : Laravel (PHP)
- **Frontend** : Blade, HTML, CSS
- **BDD** : MySQL
- **Build** : Vite
- **Versionning** : Git/GitHub

### Structure MVC

```
app/
├── Http/Controllers/     # Logique métier
├── Models/              # Entités de données
└── Policies/            # Autorisations

resources/
├── views/               # Templates Blade
└── css/js/              # Assets frontend

database/
├── migrations/          # Schémas de tables
└── seeders/            # Données de test

routes/
└── web.php             # Définition des routes
```

---

## 📊 Modèle de données

### Tables principales

#### Utilisateurs et authentification
- **users** : Comptes utilisateurs
- **roles** : Rôles système (Admin, Enseignant, Élève...)
- **genres** : Genres (M/F/Autre)
- **pays** : Référentiel pays

#### Gestion du concours
- **colleges** : Établissements participants
- **equipes** : Équipes de compétition
- **epreuves** : Épreuves du concours
- **resultats** : Scores et performances
- **classements** : Résultats calculés

### Relations clés
```
User → Role (1:N)
Equipe → College (N:1)
Equipe → User (N:N) [équipe_user]
Resultat → Equipe (N:1)
Resultat → Epreuve (N:1)
```

---

## 🔐 Système d'autorisation

### Rôles et permissions

| Rôle | Accès | Permissions |
|------|-------|-------------|
| **Administrateur** | Complet | Gestion totale de la plateforme |
| **Gestionnaire** | Étendu | Supervision concours et équipes |
| **Secrétaire** | Modéré | Saisie des résultats |
| **Jury** | Limité | Évaluation des épreuves |
| **Enseignant** | Standard | Gestion de ses équipes |
| **Élève** | Restreint | Consultation de son équipe |
| **Visiteur** | Public | Consultation résultats publics |

### Middleware d'authentification
```php
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Routes admin uniquement
});
```

---

## 🛣️ Routing et navigation

### Routes publiques
```
GET  /                  # Page d'accueil
GET  /resultats         # Résultats publics
GET  /classement        # Classements généraux
```

### Routes authentifiées
```
GET  /dashboard         # Tableau de bord
GET  /equipes           # Gestion équipes
POST /equipes           # Créer équipe
GET  /resultats/saisie  # Interface saisie notes
```

### Routes CRUD (exemple : rôles)
```
GET    /roles           # Liste
GET    /roles/create    # Formulaire création
POST   /roles           # Enregistrer
GET    /roles/{id}/edit # Formulaire édition
PUT    /roles/{id}      # Mettre à jour
DELETE /roles/{id}      # Supprimer
```

---

## 🎨 Interface utilisateur

### Pages principales

#### `/dashboard` - Tableau de bord
- **Rôle** : Tous (authentifiés)
- **Affichage** : Statistiques personnalisées selon le rôle
- **Composants** : Cards de résumé, graphiques, accès rapides

#### `/equipes` - Gestion des équipes
- **Rôle** : Enseignant, Admin
- **Fonctionnalités** :
  - Liste des équipes avec filtres
  - Création/modification d'équipe
  - Affectation des membres
  - Upload logo équipe

#### `/epreuves` - Configuration épreuves
- **Rôle** : Admin, Gestionnaire
- **Fonctionnalités** :
  - Définition des épreuves
  - Barèmes et coefficients
  - Critères d'évaluation

#### `/resultats/saisie` - Saisie des notes
- **Rôle** : Secrétaire, Jury
- **Fonctionnalités** :
  - Interface de saisie rapide
  - Validation en temps réel
  - Historique des modifications

#### `/classements` - Résultats et classements
- **Rôle** : Public
- **Fonctionnalités** :
  - Classement général
  - Classement par catégorie (Esthétique, Site web)
  - Meilleure équipe par collège
  - Export CSV/XLS/ODS

#### `/admin/roles` - Gestion des rôles
- **Rôle** : Admin
- **Fonctionnalités** : CRUD complet sur les rôles

#### `/admin/pays` - Gestion des pays
- **Rôle** : Admin
- **Fonctionnalités** : CRUD complet sur le référentiel pays

#### `/admin/genres` - Gestion des genres
- **Rôle** : Admin
- **Fonctionnalités** : CRUD complet sur les genres

---

## 💾 Gestion des données

### Migrations
```bash
# Créer une migration
php artisan make:migration create_table_name

# Exécuter les migrations
php artisan migrate

# Rollback
php artisan migrate:rollback

# Reset complet
php artisan migrate:fresh --seed
```

### Seeders
```bash
# Créer un seeder
php artisan make:seeder TableNameSeeder

# Exécuter les seeders
php artisan db:seed
php artisan db:seed --class=SpecificSeeder
```

### Exports
Formats supportés :
- **CSV** : Export standard
- **XLS** : Excel classique
- **ODS** : LibreOffice

---

## 🔧 Commandes de développement

### Serveur
```bash
php artisan serve              # Démarrer sur :8000
php artisan serve --port=8080  # Port personnalisé
```

### Cache
```bash
php artisan optimize:clear     # Nettoyer tout
php artisan config:clear       # Config
php artisan route:clear        # Routes
php artisan view:clear         # Vues
```

### Base de données
```bash
php artisan migrate:fresh --seed  # Reset + données test
php artisan db:seed               # Données uniquement
```

### Assets frontend
```bash
npm run dev     # Mode développement (watch)
npm run build   # Compilation production
```

### Génération de code
```bash
php artisan make:controller NameController
php artisan make:model Name -m
php artisan make:migration create_table
php artisan make:seeder NameSeeder
php artisan make:policy NamePolicy
```

---

## 📦 Dépendances principales

### Backend (Composer)
```json
{
  "laravel/framework": "^10.0",
  "laravel/sanctum": "^3.0",
  "laravel/tinker": "^2.8"
}
```

### Frontend (NPM)
```json
{
  "vite": "^4.0",
  "laravel-vite-plugin": "^0.7"
}
```

---

## 🐛 Dépannage rapide

### Erreur "Class not found"
```bash
composer dump-autoload
```

### Erreur permissions (Linux/Mac)
```bash
chmod -R 775 storage bootstrap/cache
```

### Page blanche / 500
```bash
php artisan optimize:clear
```

### Assets non chargés
```bash
npm run build
php artisan view:clear
```

---

## 👨‍💻 Développement réalisé (Personnel)

### Fonctionnalités CRUD implémentées

#### Module Rôles (`/admin/roles`)
- ✅ Liste avec pagination
- ✅ Création de rôle
- ✅ Modification
- ✅ Suppression sécurisée
- ✅ Validation des données

#### Module Pays (`/admin/pays`)
- ✅ Référentiel complet
- ✅ CRUD standard
- ✅ Recherche et filtres

#### Module Genres (`/admin/genres`)
- ✅ Gestion des genres
- ✅ CRUD complet
- ✅ Interface responsive

---

## 🎯 Fonctionnalités clés

- ✅ Authentification multi-rôles
- ✅ Inscription en ligne des équipes
- ✅ Gestion complète des épreuves
- ✅ Saisie rapide des résultats
- ✅ Calcul automatique des classements
- ✅ Exports multiformats (CSV/XLS/ODS)
- ✅ Interface responsive
- ✅ Consultation temps réel
- ✅ Accès public sécurisé

---

## 📞 Support

**Repository** : [github.com/AdrianoSIO/cr_26](https://github.com/AdrianoSIO/cr_26)

**Issues** : Ouvrir un ticket sur GitHub pour tout bug ou suggestion.
