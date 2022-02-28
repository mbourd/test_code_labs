- executer `docker-compose up --build` pour construire les conteneurs
    + executer `./runner php dev` pour entrer dans le conteneur php

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
    + remarque : je n'ai pas réussi à acceder à `http://test-symfony.vlabs`, je n'ai pas encore vu les host en symfony et les configuration associés
    + le chemin pour l'administration `http://localhost/admin/` qui redirige vers `http://localhost/admin/agencies/`
    + le chemin API `http://localhost/api/` (utilisation de Axios)
- je n'ai pas mis en place de OAuth, pas encore eu l'occasion. J'aurais mis en place JWT Auth avec un formulaire de connection React, mais avec un formulaire Twig je ne connait pas encore le méchanisme

- remarque: il ce peut qu'il faut mettre en commentaire la ligne `32` du fichier `docker-compose.yml`
    + `- $SSH_AUTH_SOCK:/ssh-agent` cette ligne n'est pas nécessaire de mon côté personnellement
