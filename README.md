# Projet-QuaiAntique
Site du restaurant Le Quai Antique

## Installation en local

### Pré-requis
Avoir installé Composer

Avoir installé NPM

Avoir installé un logiciel permettant d'initialiser un serveur en local, tel que WAMP ou MAMP

Avoir installé MariaDB

Avoir installé Symfony CLI


### Cloner le projet 

Créer un répertoire pour télécharger le projet.

Via le terminal de commandes, se positionner dans ce répertoire et taper : 
```
git clone https://github.com/MartinelliSam/Projet-QuaiAntique
```

### Télécharger les dépendances

Dans le terminal de commandes, taper les commandes suivantes : 
```
npm install
npm run build
composer install
```

### Préparer l'environnement local

Renommer le fichier .env.test en .env.local
Modifier la ligne 27 pour mettre vos identifiants MariaDB

### Créer la base de données

Dans le terminal de commandes, taper : 
```
php bin/console doctrine:database:create
php bin/console make:migration
php bin/console doctrine:migrations:migrate
```

### Lancement du serveur symfony

Dans le terminal de commandes, taper :
```
symfony serve:start
```

### Créer un compte administrateur

Créer un compte, et modifier en BDD le rôle ["ROLE_USER"] en ["ROLE_ADMIN"]

### Plateforme d'administration

* Avant d'uploader une nouvelle image, compresser le fichier sur tinypng.com 
afin d'optimiser son poids

* Horaires du restaurant : laisser le champ "heure d'ouverture" et "heure de fermeture" 
vides selon que le restaurant est ouvert le midi ou le soir. Pour que soit indiqué "fermé" si le restaurant
 est fermé toute la journée, laisser les quatre champs vides et ne renseigner que le jour.














