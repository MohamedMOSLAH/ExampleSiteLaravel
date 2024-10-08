<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Prérequis

[Docker](https://www.docker.com/get-started)

## Installation

Pour l'installation vous pouvez cloner le projet et exécuter le fichier ./install.sh ou bien suivre les 7 étapes ci-dessous:

### 1. Cloner le projet

git clone https://github.com/MohamedMOSLAH/ExampleSiteLaravel.git

cd ExampleSiteLaravel

## 2. Démarrage de Docker et construction des conteneurs avec Sail.

docker run --rm \ -u "$(id -u):$(id -g)" \ -v "$(pwd)":/var/www/html \ -w /var/www/html \ laravelsail/php82-composer:latest \ composer install

## 3. Migrer la base de données

./vendor/bin/sail artisan migrate

## 4. Démarrer l'environnement Docker

./vendor/bin/sail up -d

## 5. Importer les films tendances

./vendor/bin/sail artisan movies:import-trending

## 6. Compiler les assets

npm install

npm run dev

## 7. Tester

http://localhost

## Utilisation de Site

1. / pour visiter la liste des films (page d'accueil)

2. /movie/{id} pour visiter la fiche d'un film

3. /register pour créer un compte

4. /login pour s'authentifier

5. /movies-crud pour utiliser toutes les fonctionnalités CRUD (il faut être connecté : créer un compte et se connecter ensuite) :
    - création d'un film
    - modification d'un film
    - suppression d'un film
    - voir toute la liste des films avec pagination
