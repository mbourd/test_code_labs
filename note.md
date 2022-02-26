- executer `composer install` à l'intérieur du conteneur php


- utilisateur de doctrine migrations
- exectuer `php bin/console doctrine:migrations:migrate -n` à l'intérieur du conteneur php


- il y a des données fixtures pour initialiser remplir la table User avec un utilisateur
- executer `php bin/console doctrine:fixtures:load -n` à l'intérieur du conteneur php
- utilisateur : `admin@local.com`
- mot de passe : `admin`


- executer `npm install` à l'intérieur du dossier `test-symfony/symfony/`
- executer `npm run dev` à l'intérieur du dossier `test-symfony/symfony/`


- pas utilisé de "host" sur Symfony, pas encore eu l'occasion
- je n'ai pas mis en place de OAuth, pas encore eu l'occasion
