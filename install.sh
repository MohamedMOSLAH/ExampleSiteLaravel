#!/bin/bash

echo "Installation des dépendances avec Composer..."
composer install

echo "Exécution de migration..."
./vendor/bin/sail artisan migrate

echo "Démarrage de Docker..."
./vendor/bin/sail up -d

echo "Importation des films tendances..."
./vendor/bin/sail artisan movies:import-trending

echo "Compilation des assets..."
npm install
npm run dev 

echo "Installation terminée. Le site est disponible sur http://localhost"
