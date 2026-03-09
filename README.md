Netflix Clone - Laravel Project

##  Sommaire
1. [Présentation du projet](#-présentation-du-projet)
2. [Fonctionnalités](#-fonctionnalités)
3. [Prérequis](#-prérequis)
4. [Installation](#-installation)
5. [Variables d’environnement](#-variables-denvironnement-env)
6. [Lancer le projet](#-lancer-le-projet)
7. [Sécurité](#-sécurité-et-validation)

Présentation du projet
Ce projet est une application web de gestion de catalogue de films inspirée de l'interface Netflix. Il a été réalisé dans le cadre d'un examen Laravel pour démontrer la maîtrise du CRUD, des systèmes d'authentification, et des relations entre modèles.

L'application permet aux visiteurs de parcourir un catalogue, tandis que les utilisateurs connectés peuvent administrer les films et gérer leurs propres listes de lecture personnalisées (Watchlists).

  Fonctionnalités
Catalogue Public : Consultation des films avec filtrage par genre.

Système d'Authentification : Inscription et connexion sécurisées pour accéder aux fonctionnalités avancées.

Administration (CRUD) : Création, modification et suppression de films avec validation stricte des données.

Gestion de Decks (Watchlists) : Création de plusieurs listes par utilisateur.

Données liées (Pivot) : Ajout de films dans les listes avec un système de priorité (1 à 5) propre à chaque association.

Interface Responsive : Design sombre "Netflix" adapté aux mobiles et tablettes.

  Prérequis
Avant d'installer le projet, assurez-vous d'avoir :

PHP >= 8.2

Composer

Node.js & NPM

SQLite (ou MySQL selon votre configuration)

 Installation
Cloner le dépôt :

Bash
git clone https://github.com/NGAMGA/Netflix-clone_Laravel.git
cd netflix-clone
Installer les dépendances PHP :

Bash
composer install
Installer les dépendances Frontend :

Bash
npm install && npm run build
 Variables d’environnement (.env)
Copiez le fichier d'exemple et générez la clé d'application :

Bash
cp .env.example .env
php artisan key:generate
Assurez-vous que DB_CONNECTION est configuré sur sqlite (ou votre base de données locale).

 Base de données
Exécutez les migrations pour créer les tables (Movies, Watchlists et la table pivot movie_watchlist) :

Bash
php artisan migrate --seed
Note : Le --seed remplira automatiquement le catalogue avec des films de test.

 Lancer le projet
Démarrez le serveur local Laravel :

Bash
php artisan serve
L'application sera disponible sur http://127.0.0.1:8000.

 Sécurité et Validation
Middleware Auth : Les fonctions d'ajout, de modification et de suppression sont protégées et réservées aux utilisateurs connectés.

Validation des données : Chaque formulaire (Film, Watchlist) valide les types de données, les longueurs de chaînes et les plages de valeurs (ex: priorité entre 1 et 5).

Protection CSRF : Toutes les requêtes POST/PUT/DELETE sont protégées contre les attaques CSRF via les jetons Laravel.

 Structure des données (Points Clés)
Le projet utilise une relation Many-to-Many entre Movie et Watchlist.

La table pivot contient une colonne supplémentaire priority, permettant de classer les films au sein de chaque liste.
