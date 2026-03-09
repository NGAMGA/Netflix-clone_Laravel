Netflix Clone - Laravel Project

##  Table of Contents

- [1. Objectif du Projet](#objectif-du-projet)
- [2. Stack Technique](#stack-technique)
- [3. Fonctionnalités](#fonctionnalités)
- [4. Prérequis](#prérequis)
- [5. Installation](#installation)
- [6. Variables d'environnement](#variables-denvironnement)
- [7. Lancer le projet](#lancer-le-projet)
- [8. Sécurité et Validation](#sécurité-et-validation)
- [9. Tests et Vérifications](#tests-et-vérifications)



# objectif-du-projet


L'objectif de ce projet est de concevoir une application web inspirée de Netflix permettant de gérer un catalogue de films et des listes de lecture personnalisées (Watchlists). Ce projet valide la maîtrise du framework Laravel, de la gestion des bases de données relationnelles (Many-to-Many) et de l'authentification.


# stack-technique


- Framework PHP : Laravel 11+

- Frontend : Blade, Bootstrap 5

- Base de données : SQLite / MySQL

- Gestionnaire de paquets : Composer & npm


# fonctionnalités


- Catalogue Public : Consultation des films et filtrage par genre.

- CRUD Admin : Ajouter, modifier et supprimer des films avec validation.

- Gestion des Watchlists : Création, renommage et suppression de plusieurs listes par utilisateur.

- Donnée liée : Ajout de films dans les listes avec un système de priorité (1 à 5) spécifique à l'association.

- Responsive Design : Interface optimisée pour mobile et tablette via Bootstrap.



# prérequis


- PHP >= 8.2

- Composer

- Node.js & npm

- SQLite (activé dans votre configuration PHP)


# installation


- Cloner le projet :


git clone https://github.com/NGAMGA/Netflix-clone_Laravel.git

cd netflix-clone


- Installer les dépendances PHP :

```bash
composer install
``

- Installer les dépendances JS/CSS :

```bash
npm install
```

# variables-denvironnement


Créez votre fichier .env à partir de l'exemple :


cp .env.example .env
php artisan key:generate
Vérifiez que DB_CONNECTION est configuré sur sqlite dans le fichier .env.


# lancer-le-projet


Pour que l'application fonctionne correctement (Vite pour le CSS et Artisan pour le PHP), vous devez ouvrir deux terminaux différents et les exécuter en même temps :


Terminal 1  :

```bash
 php artisan serve
```

Terminal 2  :

```bash
- npm run dev
```

Note : N'oubliez pas de lancer les migrations lors du premier lancement : php artisan migrate --seed.



# sécurité-et-validation


- Authentification : Accès restreint aux fonctionnalités CRUD pour les invités.

- Validation : Contrôle strict des types de données (ex: priorité numérique 1-5).

- Protection CSRF : Sécurisation de tous les formulaires via @csrf.


# tests-et-vérifications


- Des tests manuels ont été effectués pour vérifier la suppression en cascade (un film supprimé du catalogue disparaît des listes).

- Multi-Decks : Vérification de la possibilité de créer plusieurs listes distinctes pour un même utilisateur.
