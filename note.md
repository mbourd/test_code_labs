- executer `composer install` à l'intérieur du conteneur php

- créer la base de données
    + executer `php bin/console doctrine:database:create` à l'intérieur du conteneur php


- utilisation de doctrine migrations
    + exectuer `php bin/console doctrine:migrations:migrate -n` à l'intérieur du conteneur php


- utilisation de fixtures fixtures pour initialiser remplir la table User avec un utilisateur
    + executer `php bin/console doctrine:fixtures:load -n` à l'intérieur du conteneur php
        * utilisateur : `admin@v-labs.fr`
        * mot de passe : `admin`


- utilisation de Webpack Encore pour gérer les fichiers js
    + executer `npm install` à l'intérieur du dossier `test-symfony/symfony/`
    + executer `npm run dev` à l'intérieur du dossier `test-symfony/symfony/`


- pas utilisé de "host" sur Symfony, pas encore eu l'occasion
    + le chemin pour l'administration `/admin/`
    + le chemin API `/api/`
- je n'ai pas mis en place de OAuth, pas encore eu l'occasion
