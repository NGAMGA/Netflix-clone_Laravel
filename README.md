Netflix Clone - Laravel Project

## 📌 Table of Contents

- [1. Objectif du Projet](#objectif-du-projet)
- [2. Stack Technique](#stack-technique)
- [3. Fonctionnalités](#fonctionnalités)
- [4. Prérequis](#prérequis)
- [5. Installation](#installation)
- [6. Variables d'environnement](#variables-denvironnement)
- [7. Lancer le projet](#lancer-le-projet)
- [8. Sécurité et Validation](#sécurité-et-validation)
- [9. Tests et Vérifications](#tests-et-vérifications)


- # objectif-du-projet
- # stack-technique
- # fonctionnalités
- # prérequis
- # installation
- # variables-denvironnement
- # lancer-le-projet
- # sécurité-et-validation
- # tests-et-vérifications






1. Objectif du Projet


L'objectif de ce projet est de concevoir une application web inspirée de Netflix permettant de gérer un catalogue de films et des listes de lecture personnalisées (Watchlists). Ce projet valide la maîtrise du framework Laravel, de la gestion des bases de données relationnelles (Many-to-Many) et de l'authentification.


2. Stack Technique


Framework PHP : Laravel 11+

Frontend : Blade, Bootstrap 5 (Thème sombre personnalisé)

Base de données : SQLite / MySQL

Gestionnaire de paquets : Composer & NPM


3. Fonctionnalités


Catalogue Public : Consultation des films et filtrage par genre.

CRUD Admin : Ajouter, modifier et supprimer des films avec validation.

Gestion des Decks (Watchlists) : Création, renommage et suppression de plusieurs listes par utilisateur.

Donnée liée (Pivot) : Ajout de films dans les listes avec un système de priorité (1 à 5) spécifique à l'association.

Responsive Design : Interface optimisée pour mobile et tablette via Bootstrap.



4. Prérequis


PHP >= 8.2

Composer

Node.js & NPM

SQLite (activé dans votre configuration PHP)


5. Installation


Cloner le projet :

bash
git clone https://github.com/NGAMGA/Netflix-clone_Laravel.git

cd netflix-clone

Installer les dépendances PHP :

Bash
composer install
Installer les dépendances JS/CSS :

Bash
npm install


6. Variables d'environnement


Créez votre fichier .env à partir de l'exemple :

Bash
cp .env.example .env
php artisan key:generate
Vérifiez que DB_CONNECTION est configuré sur sqlite dans le fichier .env.


7. Lancer le projet


Pour que l'application fonctionne correctement (Vite pour le CSS et Artisan pour le PHP), vous devez ouvrir deux terminaux différents et les exécuter en même temps :

Terminal 1 (Serveur PHP) :

Bash
php artisan serve
Terminal 2 (Compilation Assets) :

Bash
npm run dev
Note : N'oubliez pas de lancer les migrations lors du premier lancement : php artisan migrate --seed.


 8. Sécurité et Validation


Authentification : Accès restreint aux fonctionnalités CRUD pour les invités.

Validation : Contrôle strict des types de données (ex: priorité numérique 1-5).

Protection CSRF : Sécurisation de tous les formulaires via @csrf.


9. Tests et Vérifications


Des tests manuels ont été effectués pour vérifier la suppression en cascade (un film supprimé du catalogue disparaît des listes).

Multi-Decks : Vérification de la possibilité de créer plusieurs listes distinctes pour un même utilisateur.
