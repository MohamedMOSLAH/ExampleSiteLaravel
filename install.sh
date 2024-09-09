#!/bin/bash
echo "Clone le projet..."
git clone https://github.com/MohamedMOSLAH/ExampleSiteLaravel.git
cd ExampleSiteLaravel


echo "Installation des dépendances avec Composer..."
composer install

echo "Génération de la clé de site..."
./vendor/bin/sail artisan key:generate

echo "Exécution de migration..."
./vendor/bin/sail artisan migrate

echo "Démarrage de Docker..."
./vendor/bin/sail up -d

echo "Importation des films tendances..."
./vendor/bin/sail artisan movies:import-trending

echo "Installation terminée. Le site est disponible sur http://localhost"
