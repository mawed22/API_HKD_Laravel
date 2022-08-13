# api-hkdigitals

API REST du site catalogue et intranet de [hkigitals.com](https://hkdigitals.com)

## Switcher vers sa branche

* Remplacer `<maBranche>` par le nom de votre branche

```git
git checkout -b <maBranche>
```

## Installer les dépendances

* Copier et renommer `.env.example` en `.env`, remplacez _hostname_ et _database_ par les informations de connexion à votre base de données MongoDB. Ajouter votre _secret key JWT_ pour le champ `JWT_SECRET_KEY`.

```sh
cp .env.example .env
```

* Lancer la `composer install` et/ou `composer update` commande pour installer les dépendances de Laravel

```sh
compser install
```

```sh
composer update
```

* Lancer la `npm install` et `npm run` commande pour installer les dépendances javascript

```sh
npm install
```

```sh
npm run
```

* Lancer la `php artisan serve` commande pour demarrer le server

* Rendez-vous sur votre navigateur à l'adresse [localhost:8000/api/doc](http://localhost:8000/api/doc) pour observer la documentation Swagger de l'API
