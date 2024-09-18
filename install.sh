#!/bin/bash

echo "Démarrage de Docker et construction des conteneurs avec Sail..."
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd)":/var/www/html \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install


echo "Démarrage de Docker..."
./vendor/bin/sail up -d


echo "Exécution de migration..."
./vendor/bin/sail artisan migrate



echo "Importation des films tendances..."
./vendor/bin/sail artisan movies:import-trending

echo "Compilation des assets..."
npm install
npm run dev 
