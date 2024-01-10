# Projet-QuaiAntique
Site du restaurant Le Quai Antique, réalisé avec Symfony.

La plateforme d'administration a été créée à l'aide de EasyAdmin. Elle permet de mettre à jour toutes les informations du site : caroussel d'images sur la page d'accueil, horaires d'ouvertures, menus, formules, mais aussi de gérer les réservations. La gestion des rôles avec Symfony permet de la réserver à l'administrateur. 

![admin](https://github.com/MartinelliSam/Projet-QuaiAntique/assets/122564923/463c6611-8ec5-4118-be63-c6f16a88dae6)

Le client régulier peut créer un compte, et ainsi renseigner plusieurs informations (nom, prénom, nombre de convives par défaut), qui permettront de lui pré-remplir le formulaire de réservation après connexion avec ses identifiants. 

![compte](https://github.com/MartinelliSam/Projet-QuaiAntique/assets/122564923/d57f7e62-812c-45cb-ac14-a0b593e5b148)

Selon les heures d'ouvertures renseignées, le formulaire de réservation sera modifié dynamiquement pour indiquer au client si le restaurant est fermé ou non, et le choix des horaires sera mis à jour en fonction. 

![reservation](https://github.com/MartinelliSam/Projet-QuaiAntique/assets/122564923/d89f0c5c-d8bf-4ec7-9a9a-0e59b89bae14)

## Démo 

https://restaurant-lequaiantique.herokuapp.com/

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
Si vous n'avez pas Symfony CLI, taper dans le terminal de votre IDE : 
```
php -S 127.0.0.1:8000 -t public/
```

### Créer un compte administrateur

Créer un compte, et modifier en BDD le rôle ["ROLE_USER"] en ["ROLE_ADMIN"]

### Plateforme d'administration

* Avant d'uploader une nouvelle image, compresser le fichier sur tinypng.com 
afin d'optimiser son poids

* Horaires du restaurant : laisser le champ "heure d'ouverture" et "heure de fermeture" 
vides selon que le restaurant est ouvert le midi ou le soir. Pour que soit indiqué "fermé" si le restaurant
 est fermé toute la journée, laisser les quatre champs vides et ne renseigner que le jour.














