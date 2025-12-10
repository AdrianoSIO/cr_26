# 🤖 Concours de Robots – Application de Gestion

## 📌 Contexte

Ce projet est une application web dédiée à la gestion du concours de robots organisé annuellement entre plusieurs collèges des Deux-Sèvres, dans le cadre de l'enseignement de la technologie. L'objectif principal est de proposer une plateforme moderne, sécurisée et responsive permettant d'administrer entièrement le concours, depuis l'inscription des équipes jusqu'à la publication des résultats finaux.

### Identifiants de test
- **Login** : `Prof@futaie.com`
- **Mot de passe** : `Prof`

---

## 🚀 Fonctionnalités principales

L'application gère tous les aspects du concours :

- ✅ Inscriptions en ligne des équipes par les enseignants
- ✅ Gestion complète des épreuves avec définition des barèmes et coefficients
- ✅ Saisie rapide des résultats par les secrétaires
- ✅ Consultation des résultats en temps réel
- ✅ Export des données au format CSV, XLS et ODS
- ✅ Génération automatique des classements :
  - Classement général
  - Esthétique
  - Site web
  - Meilleure équipe par collège
- ✅ Accès public aux informations générales
- ✅ Interface responsive (ordinateur, tablette, mobile)

---

## 👤 Travail réalisé personnellement

Je me suis chargé des fonctionnalités CRUD (Créer, Lire, Modifier, Supprimer) pour les tables suivantes :

### Table rôle
- Création d'un rôle
- Modification
- Suppression

### Table pays
- Création
- Modification
- Suppression

### Table genre
- Création
- Modification
- Suppression

---

## 🛠️ Technologies utilisées

Le projet repose sur une architecture MVC moderne.

- **Backend** : PHP avec Laravel
- **Frontend** : Blade, HTML, CSS
- **Base de données** : MySQL
- **Outils** : Composer, Node.js, npm
- **Versionning** : GitHub

---

## ⚙️ Installation complète

Cette section explique comment lancer le projet sur un ordinateur ne disposant pas de Laravel, Composer ou configuration préalable.

### 1️⃣ Vérification des prérequis

Avant de commencer, vérifiez si les outils suivants sont installés :

```bash
# PHP
php -v

# Composer
composer -V

# Node.js et npm
node -v
npm -v

# Git
git --version
```

---

### 2️⃣ Installation des prérequis manquants

#### 🪟 Installation sur Windows

##### **PHP**
1. Téléchargez PHP depuis [windows.php.net/download](https://windows.php.net/download/)
2. Choisissez **Thread Safe** version 8.1 ou supérieure
3. Extrayez le fichier ZIP dans `C:\php`
4. Ajoutez `C:\php` au PATH système :
   - Ouvrez **Panneau de configuration** → **Système** → **Paramètres système avancés**
   - Cliquez sur **Variables d'environnement**
   - Dans **Variables système**, sélectionnez **Path** et cliquez sur **Modifier**
   - Ajoutez `C:\php`
5. Renommez `php.ini-development` en `php.ini` dans le dossier PHP
6. Ouvrez `php.ini` et activez les extensions suivantes (retirez le `;` devant) :
   ```ini
   extension=fileinfo
   extension=pdo_mysql
   extension=mbstring
   extension=openssl
   extension=zip
   extension=curl
   ```
7. Vérifiez l'installation : `php -v`

##### **Composer**
1. Téléchargez l'installateur depuis [getcomposer.org](https://getcomposer.org/Composer-Setup.exe)
2. Exécutez l'installateur
3. Suivez les instructions (il détectera automatiquement PHP)
4. Vérifiez : `composer -V`

##### **Node.js et npm**
1. Téléchargez l'installateur LTS depuis [nodejs.org](https://nodejs.org)
2. Exécutez l'installateur et suivez les instructions
3. Redémarrez votre terminal
4. Vérifiez :
   ```bash
   node -v
   npm -v
   ```

##### **Git**
1. Téléchargez depuis [git-scm.com](https://git-scm.com/download/win)
2. Exécutez l'installateur avec les options par défaut
3. Vérifiez : `git --version`

##### **MySQL (Base de données)**
1. Téléchargez **XAMPP** depuis [apachefriends.org](https://www.apachefriends.org)
2. Installez XAMPP (cochez MySQL)
3. Lancez le panneau de contrôle XAMPP
4. Démarrez **Apache** et **MySQL**
5. Accédez à phpMyAdmin : [http://localhost/phpmyadmin](http://localhost/phpmyadmin)

---

#### 🐧 Installation sur Linux (Ubuntu/Debian)

##### **PHP**
```bash
sudo apt update
sudo apt install php8.1 php8.1-cli php8.1-common php8.1-mysql php8.1-zip php8.1-gd php8.1-mbstring php8.1-curl php8.1-xml php8.1-bcmath
php -v
```

##### **Composer**
```bash
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
sudo chmod +x /usr/local/bin/composer
composer -V
```

##### **Node.js et npm**
```bash
curl -fsSL https://deb.nodesource.com/setup_lts.x | sudo -E bash -
sudo apt install -y nodejs
node -v
npm -v
```

##### **Git**
```bash
sudo apt install git
git --version
```

##### **MySQL**
```bash
sudo apt install mysql-server
sudo systemctl start mysql
sudo systemctl enable mysql
sudo mysql_secure_installation
```

Créez un utilisateur MySQL :
```bash
sudo mysql
```
```sql
CREATE USER 'robot_user'@'localhost' IDENTIFIED BY 'votre_mot_de_passe';
GRANT ALL PRIVILEGES ON *.* TO 'robot_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

---

#### 🍎 Installation sur macOS

##### **Homebrew (gestionnaire de paquets)**
```bash
/bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"
```

##### **PHP**
```bash
brew install php@8.1
echo 'export PATH="/usr/local/opt/php@8.1/bin:$PATH"' >> ~/.zshrc
source ~/.zshrc
php -v
```

##### **Composer**
```bash
brew install composer
composer -V
```

##### **Node.js et npm**
```bash
brew install node
node -v
npm -v
```

##### **Git**
```bash
brew install git
git --version
```

##### **MySQL**
```bash
brew install mysql
brew services start mysql
mysql_secure_installation
```

---

### 3️⃣ Cloner le projet depuis GitHub

```bash
git clone https://github.com/AdrianoSIO/cr_26.git
cd cr_26
```

---

### 4️⃣ Installer les dépendances

#### Backend PHP
```bash
composer install
```

#### Frontend
```bash
npm install
```

---

### 5️⃣ Configuration de Laravel

#### Copier le fichier d'environnement
```bash
cp .env.example .env
```

#### Générer la clé Laravel
```bash
php artisan key:generate
```

---

### 6️⃣ Configuration de la base de données

#### Option 1 : MySQL (recommandé)

1. Créez la base de données :
   ```sql
   CREATE DATABASE robot CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   ```

2. Modifiez le fichier `.env` :
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=robot
   DB_USERNAME=root
   DB_PASSWORD=
   ```

#### Option 2 : SQLite (plus simple pour débuter)

1. Créez le fichier de base de données :
   ```bash
   touch database/database.sqlite
   ```

2. Modifiez le fichier `.env` :
   ```env
   DB_CONNECTION=sqlite
   DB_DATABASE=/chemin/absolu/cr_26/database/database.sqlite
   ```

---

### 7️⃣ Créer les tables et données de test

```bash
php artisan migrate --seed
```

Cette commande crée toutes les tables et insère des données de démonstration.

---

### 8️⃣ Compiler le frontend

#### Mode développement (avec rechargement automatique)
```bash
npm run dev
```

#### Mode production (optimisé)
```bash
npm run build
```

---

### 9️⃣ Démarrer le serveur

```bash
php artisan serve
```

🎉 **Accédez à l'application** : [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## 👥 Rôles utilisateurs

| Rôle | Permissions |
|------|-------------|
| **Administrateur** | Tous les droits |
| **Gestionnaire** | Supervision générale |
| **Secrétaire** | Saisie des notes |
| **Jury** | Évaluation des épreuves |
| **Enseignant** | Gestion des équipes |
| **Élève** | Participation |
| **Visiteur** | Consultation publique |

---

## 🧰 Commandes utiles

```bash
# Lancer le serveur de développement
php artisan serve

# Réinitialiser la base de données (⚠️ supprime toutes les données)
php artisan migrate:fresh --seed

# Nettoyer tous les caches Laravel
php artisan optimize:clear

# Voir toutes les routes disponibles
php artisan route:list

# Créer un nouveau contrôleur
php artisan make:controller NomController

# Créer un nouveau modèle avec migration
php artisan make:model NomModele -m

# Compiler les assets en temps réel (mode watch)
npm run dev

# Vider le cache de configuration
php artisan config:clear

# Vider le cache des vues Blade
php artisan view:clear
```

---

## 🐛 Résolution des problèmes courants

### Erreur : "Class not found"
```bash
composer dump-autoload
php artisan optimize:clear
```

### Erreur : "Permission denied" (Linux/macOS)
```bash
sudo chmod -R 775 storage bootstrap/cache
sudo chown -R $USER:www-data storage bootstrap/cache
```

### Erreur : "npm ERR! code ELIFECYCLE"
```bash
rm -rf node_modules package-lock.json
npm install
```

### La page ne charge pas / erreur 500
```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```

---

## 📁 Structure du projet

```
cr_26/
├── app/                    # Code applicatif (Contrôleurs, Modèles)
├── bootstrap/              # Fichiers de démarrage Laravel
├── config/                 # Fichiers de configuration
├── database/               # Migrations et seeders
├── public/                 # Point d'entrée public (index.php, assets)
├── resources/              # Vues Blade, CSS, JS
├── routes/                 # Définition des routes
├── storage/                # Fichiers générés (logs, cache, uploads)
├── tests/                  # Tests automatisés
├── vendor/                 # Dépendances PHP (Composer)
├── .env                    # Configuration environnement
├── artisan                 # CLI Laravel
├── composer.json           # Dépendances PHP
└── package.json            # Dépendances Node.js
```

---

## 🎯 Objectif pédagogique

Ce projet a pour but de développer des compétences en :
- Développement web professionnel
- Gestion de bases de données relationnelles
- Travail collaboratif avec Git/GitHub
- Architecture MVC avec Laravel
- Authentification et gestion des permissions
- Interface responsive et UX moderne

---

## 📝 Licence

Ce projet est développé dans un cadre éducatif.

---

## 🤝 Contribution

Pour contribuer au projet :
1. Fork le repository
2. Créez une branche pour votre fonctionnalité (`git checkout -b feature/nouvelle-fonctionnalite`)
3. Committez vos changements (`git commit -m 'Ajout nouvelle fonctionnalité'`)
4. Push vers la branche (`git push origin feature/nouvelle-fonctionnalite`)
5. Ouvrez une Pull Request

---

## 📞 Contact

Pour toute question concernant le projet, contactez l'équipe de développement via GitHub.
