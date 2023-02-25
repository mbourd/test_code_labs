<!--
<p align="center">
  <a href="http://v-labs.fr/">
    <img src="http://v3.v-labs.fr/wp-content/themes/vlabs/dist/assets/img/logo_vlabs.svg" alt="Logo V-labs" width="177.976" height="42.739">
  </a>

  <h3 align="center">Test pré-entretien - Symfony</h3>

  <p align="center">
    Ce projet est utilisé dans le cadre d'une évaluation des compétences en Symfony après l'entretien technique.
  </p>
</p>

----

<p align="center">
    <strong><a href="mailto:valentin@v-labs.fr?cc=quentin@v-labs.fr&subject=Question%20concernant%20le%20test%20post%20entretien%20technique%20en%20Symfony&body=Bonjour%2C%0D%0AJ%27ai%20une%20question%20concernant%20le%20test%20post%20entretien%20technique%20en%20Symfony%20%3A%0D%0A%7BVotre%20question%7D">J'ai une question</a></strong>
    •
    <strong><a href="mailto:valentin@v-labs.fr?cc=quentin@v-labs.fr&subject=Probl%C3%A8me%20concernant%20le%20test%20post%20entretien%20technique%20en%20Symfony&body=Bonjour%2C%0D%0AJ%27ai%20rencontr%C3%A9%20un%20probl%C3%A8me%20lors%20du%20test%20post%20entretien%20technique%20en%20Symfony%20%3A%0D%0A%7BVotre%20probl%C3%A8me%7D">Remonter un problème</a></strong>
    •
    <strong><a href="mailto:valentin@v-labs.fr?cc=quentin@v-labs.fr&subject=Envoi%20du%20test%20post%20entretien%20technique%20en%20Symfony%20pour%20v%C3%A9rification&body=Bonjour%2C%0D%0AVoici%20le%20lien%20vers%20le%20repository%20du%20projet%20%3A%0D%0A%7BVotre%20repository%7D">Envoyer votre projet pour vérification</a></strong>
</p>

----

<p align="center">
  <h4 align="center">:exclamation: Note importante :exclamation:</h4>

  <p align="center">
    Veuillez <strong>lire l'ensemble des informations avant de commencer le projet</strong> et les <strong>relire avant d'envoyer pour validation</strong> pour éviter tout oubli dans le livrable.
    </p>
</p>
-->

## :bookmark_tabs: Sommaire

+ :vertical_traffic_light: [Pour commencer](#vertical_traffic_light-pour-commencer)
  - :book: [Présentation du projet](#book-présentation-du-projet)
  - :luggage: [Prérequis](#luggage-prérequis)
  - :gear: [Installation](#gear-installation)
+ :notebook_with_decorative_cover: [Cahier des charges](#notebook_with_decorative_cover-cahier-des-charges)
  - :outbox_tray: [Ressources à rendre](#outbox_tray-ressources-à-rendre)
  - :mag: [Description technique](#mag-description-technique)
  - :dart: [Objectifs à atteindre](#dart-objectifs-à-atteindre)
  - :warning: [Conditions à remplir](#warning-conditions-à-remplir)
  - :heavy_check_mark: [Bonus pouvant être réalisés](#heavy_check_mark-bonus-pouvant-être-réalisés-cocher-si-cest-le-cas)
+ :man_technologist: [Créateur](#man_technologist-créateur)


## :vertical_traffic_light: Pour commencer

### :book: Présentation du projet

Dans le cadre de cet exercice, un client vous a contacté pour réaliser un outil lui permettant de gérer ses différentes agences. Il vous demande donc de pouvoir **se connecter à une administration** sur laquelle vous pouvez **lister, ajouter, supprimer, ou modifier une agence**, puis, via une API, **lister, ajouter et voir le détail d'une agence**. Ces **agences seront géolocalisées** et nous aurons une **interface accessible publiquement** sur laquelle une **carte Google Maps** sera présente avec des **marqueurs pour localiser chacune d'entre elles** dessus.

### :luggage: Prérequis

- Installez et utilisez [Docker Compose](https://docs.docker.com/compose/) si possible, sinon simplement [Docker](https://www.docker.com/get-started/) sans passer par Docker Compose. La configuration de Docker et Docker Compose est déjà faite dans le projet à fork. Dans le **cas où l'utilisation de Docker n'est pas possible** (problème d'OS par exemple), **précisez le** dans le `note.md`, ainsi que votre méthode pour lancer le projet en local.
- Pour l'**utilisation des différentes API Google** (Google Maps + Google Places), voici la **clé API que vous pouvez utiliser** : `AIzaSyDNmwdasFOXQLkTbdu3iK_zOnwL-9-CHEY`.

### :gear: Installation

- Fork le repository puis le cloner.
- Faire une copie du fichier `docker-compose.yml.dist` et la nommer `docker-compose.yml`.
- Aller dans le dossier racine `test-symfony` puis lancer la commande `docker-compose up --build`.
- Effectuer l'installation de la [dernière version LTS de Symfony](https://symfony.com/releases/) (actuellement la 5.4.4) dans le dossier `test-symfony/symfony`. Vous pouvez accéder au container Docker PHP en utilisateur dev via `./runner php dev` à la racine du projet. Une fois dans le container, vous pouvez utiliser `composer` (pour installer Symfony et les autres vendors) et les commandes Symfony via `bin/console` directement.
- Voici les configurations à utiliser :
  + Utilisateur super admin à créer (Memory User Provider ou en base de données):
    * Email : `admin@domain.com`
    * Mot de passe : `admin`
  + Base de données :
    * Nom : `symfony`
    * Utilisateur : `root`
    * Mot de passe : `root`
    * Hôte : `mariadb`
  <!-- + URL de l'administration : `http://admin.test-symfony.vlabs` (dans le cas de l'utilisation de la configuration Docker Compose, sinon, précisez en haut du `README.md`). Par défaut, l'accès est `http://test-symfony.vlabs`, il faudra donc créer un [host](https://symfony.com/doc/current/routing.html#sub-domain-routing) pour gérer le sous-domaine, sa valeur provenant du fichier `.env` (ou `.env.local`, mais il faudra la version finale dans le `.env` pour avoir les informations sur git) et pouvant être appliqué à un [groupe de routes](https://symfony.com/doc/current/routing.html#routing-route-groups).
  + URL de l'API : `http://api.test-symfony.vlabs` (même cas que l'administration)
  + URL du front : `http://test-symfony.vlabs` (même cas que l'administration) -->

Votre projet devrait donc avoir cette structure :

```text
test-symfony/
├── docker/
│   ├── nginx/
│   ├── mariadb/
│   └── php/
├── symfony/
│   ├── src/
│   └── ...
├── .gitignore
├── docker-compose.yml
├── docker-compose.yml.dist
└── runner
```

## :notebook_with_decorative_cover: Cahier des charges

### :outbox_tray: Ressources à rendre

- Repository GitHub (Fork du projet).
- Export SQL (INSERT INTO) des Users en base de données ou de la base de données complète s'il n'y a pas d'utilisation de Doctrine Migrations. S'il y a utilisation de Doctrine Migrations et que le User à créer est en Memory Provider, aucun export SQL ne sera à fournir.
- `note.md` à la racine du projet s'il y a des informations à connaître pour l'installation ou le test, sinon le laisser vide.

### :mag: Description technique

Vous devrez réaliser une administration Symfony **sécurisée par une connexion préalable** et une **API REST**. Les formulaires doivent avoir des **validations côté serveur**.

Pour **obtenir la latitude et longitude d'une agence**, vous devrez utiliser [Google Places Autocomplete en JavaScript](https://developers.google.com/maps/documentation/javascript/places-autocomplete) (le widget ou le service) sur votre formulaire d'agence sur l'administration, ainsi que l'[API Google Places](https://developers.google.com/maps/documentation/places/web-service/search) pour **créer votre propre service par dessus** (l'équivalent d'un SDK, avoir des méthodes qui appellent les différentes routes que propose l'API, selon celles nécessaires) qui sera utilisé pour trouver les coordonnées GPS d'une agence à partir de son adresse lors de sa création via l'API.

Voici la **liste non exhaustive des entités** (vous pourriez en avoir besoin d'autre pour répondre à une utilisation fonctionnelle, des bonus ou des ajouts spontanés) :

```mermaid
classDiagram

class Agency {
int id
string name
string address
float latitude
float longitude
}

class User {
int id
string email
string roles
string password
string salt
}
```

#### Routes

##### Administration (Sous-domaine : `admin`)

<!-- Note : Il faudra rediriger la route `/` de l'administration (`http://admin.test-symfony.vlabs/`) vers la route qui liste les agences. -->
Note : Il faudra rediriger la route `/` de l'administration vers la route qui liste les agences.

| Page                                                          | Route                         |
| ------------------------------------------------------------- | ----------------------------- |
| Connexion                                                     | `/login`                      |
| Déconnexion                                                   | `/logout`                     |
| Liste des agences                                         | `/agencies`                |
| Ajout d'une agence                                        | `/agencies/create`         |
| Modification d'une agence                                 | `/agencies/{id}/update`    |
| Suppression d'une agence                                  | `/agencies/{id}/delete`    |

##### API (Sous-domaine : `api`)

Note : Pour vos tests, vous pouvez utiliser [Postman](https://www.postman.com/).

| Action                                     | Méthode  | Route            | Query param |
| ------------------------------------------ | -------- | ---------------- | ----------- |
| Liste des agences filtrable par nom        | `GET`    | `/agencies`      | name        |
| Ajout d'une agence                         | `POST`   | `/agencies`      | -           |
| Détail d'une agence                        | `GET`    | `/agencies/{id}` | -           |

##### Front (Aucun sous-domaine)

| Page                                                          | Route                         |
| ------------------------------------------------------------- | ----------------------------- |
| Page d'accueil avec la carte                                  | `/`                      |

### :dart: Objectifs à atteindre

- Savoir installer et configurer un projet Symfony.
- Savoir administrer une entité pour : créer, lister, afficher le détail, mettre à jour et supprimer.
- Savoir sécuriser une administration via une connexion obligatoire.
- Savoir créer une API REST pour ajouter et exposer des données.
- Savoir utiliser le pattern MVC pour la conception du code.
- Connaître et comprendre les principes de base de Symfony : Routing, Controller, Repository, Mapping, Templates, Forms, Validations...

### :warning: Conditions à remplir

- Avoir un projet fonctionnel après un clone, utilisation de `docker-compose up --build` (si utilisation de Docker) et lancement des commandes d'installation de Composer, Yarn/NPM et des migrations Doctrine. Si d'autres étapes sont nécessaires, veuillez les préciser dans le `note.md`.
- Bien configurer le `.gitignore` pour Symfony, l'IDE utilisé ainsi que les potentiels vendors et dépendances Node. Les générateurs sont utilisables, par exemple [gitignore.io](https://www.toptal.com/developers/gitignore), mais ne pas se fier aveuglément au résultat généré et bien tester que le projet est utilisable une fois cloné avec les fichiers ignorés. Si des fichiers nécessaires sont ignorés, comme le `.env.local` par exemple, une copie devra être présente dans le repository, nommée dans ce cas précis `.env` (ou `*.dist` pour les autres cas). Nous utiliserons cette copie pour remplacer la version originale ignorée par Git pendant notre test du projet. Préciser les fichiers concernés en haut du `note.md`.

### :heavy_check_mark: Bonus pouvant être réalisés (cocher si c'est le cas)

- [X] Mettre en place une recherche sur le nom et une [pagination](https://github.com/KnpLabs/KnpPaginatorBundle) pour la liste des agences dans l'administration.
- [X] Utiliser [FOSRestBundle](https://packagist.org/packages/friendsofsymfony/rest-bundle) pour votre API.
- [X] Utiliser le [JMS Serializer Bundle](http://jmsyst.com/bundles/jmsserializerbundle) pour sérialiser les retours de votre API (Si utilisation de FOSRestBundle, il devrait l'utiliser automatiquement, sinon, [il suffit de lui préciser dans la configuration](https://fosrestbundle.readthedocs.io/en/3.x/1-setting_up_the_bundle.html#b-enable-a-serializer), il se chargera de sérialiser).
- [ ] Utiliser [FOSOAuthServerBundle](https://packagist.org/packages/friendsofsymfony/oauth-server-bundle) ou un équivalent pour gérer la connexion à l'API via le protocole OAuth/JWT. Routes à rajouter : `/oauth/v2/token` pour obtenir son access token. Optionnellement `/oauth/v2/disconnect` pour supprimer les tokens de l'utilisateur en base de données et donc le déconnecter. (si d'autres routes ou informations sont à connaitre, précisez les dans le `note.md`)
- [X] Ajouter une couche Service au MVC partout où c'est possible. Pour mieux comprendre, voici le fonctionnement : Effectuer la logique métier, toutes les manipulations et les appels au Model dans un service à part, permettant d'alléger le code présent dans le Controller. Pour vous guider, voici comment communiquent les différentes couches : Model <--> Service <--> Controller <--> View. Le Controller ne sert que de pont entre la requête, les données et la vue.
- [X] Utiliser le format YAML pour le routing et les validations de formulaire. Utiliser le format XML pour le mapping Doctrine. Dans l'idée, quand il est possible d'utiliser un autre format que les annotations, le privilégier.
- [X] Utiliser des traductions (seulement en français) dans les templates plutôt que des textes en dur.
- [X] Utiliser [Webpack Encore](https://symfony.com/doc/current/frontend.html) pour la gestion des assets (CSS/JavaScript/Images/Fonts). Installation des dépendances via [Yarn](https://yarnpkg.com/) recommandée.
- [X] Ajouts spontanés ? Si c'est le cas, précisez le dans le `note.md`.

<!--
## :man_technologist: Créateur
* **Maxime Bourdin** - *Projet initial* - [V-labs](https://github.com/V-labs/test-symfony)

----

<p align="center">
    <strong><a href="http://www.v-labs.fr/" target="_blank">Site V-labs</a></strong>
    •
    <strong><a href="https://github.com/V-labs" target="_blank">GitHub V-labs</a></strong>
</p>
-->
