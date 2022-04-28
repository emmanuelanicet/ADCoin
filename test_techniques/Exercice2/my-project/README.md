# Advisor 

## Prérequis

- php 
- composer 
- mysql

## Installation 

Cloner le repository : 
```bash
git clone git@github.com:emmanuelanicet/ADCoin.git
```

Une fois cloné il faudra aller dans le chemin de ce dernier pour écrire les commandes suivantes : 
```
composer install --ignore-platform-reqs
```
```bash
composer update --ignore-platform-reqs
```

Ensuite quelques variables s'imposent : 
```cp .env.example .env```

Une fois copié, éditez votre ficher .env en prenant soin de bien renseigner les variables `DB_DATABASE`,`DB_PASSWORD`,`DB_USERNAME`: 
![configuration  env](https://user-images.githubusercontent.com/92017625/165823016-35d15574-5ca3-400f-bed2-1def07bef89c.png)

Vous pourrez après ça déployer votre serveur :
```php artisan serv```
![image](https://user-images.githubusercontent.com/92017625/165823369-007a3ea6-a848-4267-9f10-be8104c0d2ec.png)

Allez à l'adresse `http://127.0.0.1:8000` sur votre navigateur: 
![image](https://user-images.githubusercontent.com/92017625/165823561-fc7db02c-36fb-47e2-bb6c-b131e104d3c3.png)

Maintenant il faudra mettre en place votre base de donné qui portera le même nom donné dans `DB_DATABASE`. Connectez vous à mysql et créez la base de données: 
```mysql -u <utilisateur> -p```
```create database advisor;```
Vérifiez si elle est bien là : 
```show databases;```

De retour sur le CLI au chemin dans le chemin de votre application, migrez vos tables : 
```php artisan migrate```

Si jamais vous avez cette erreur: 

![migrationfail](https://user-images.githubusercontent.com/92017625/165824589-68b0c637-8770-4d9e-a79d-f17ed4ef7811.png)

Allez décommentez la ligne `extension=pdo_mysql` pour activer l'extension permettant de migrer vers mysql. 
![extensionmysqlphp](https://user-images.githubusercontent.com/92017625/165824997-4226d054-3e3c-497b-9c16-c186b8b60cc0.png)

De retour sur le CLI migrez de nouveau : 
```php artisan migrate```

![image](https://user-images.githubusercontent.com/92017625/165825294-a8692222-49b8-4232-86ba-3d5c997484b7.png)

Votre base donnée étant reliée vous pourrez enfin tester l'API.

# Présentation API 

Cette API reprend le concept d'un advisor avec l'enregistrement des menus, des utilisateurs (authentification comprise) et des menus. 

## Présentation des routes

### Restaurant 

Méthode GET pour afficher la liste des restaurants : 

- http://127.0.0.1:8000/api/restaurants

Méthode POST pour créer un restaurant : 

- http://127.0.0.1:8000/api/restaurant
```json
{

"name" : "Macdo",
"description" : "Classic, long-running fast-food chain known for its burgers, fries & shakes.",
"grade" : 3.2,
"localization" : "Centre Commercial Grand Ciel, 30 Boulevard Paul Vaillant Couturier, 94200 Ivry-sur-Seine",
"phone_number" : "01 49 60 62 60",
"website" : "macdonalds.fr",
"hours" : "Monday-Saturday 9AM–9PM, Sunday Closed"
}
```

Méthode PUT pour modifier un restaurant : 

- http://127.0.0.1:8000/api/restaurant/{id_restaurant}

Méthode DELETE pour supprimer un restaurant : 

- http://127.0.0.1:8000/api/restaurant/{id_restaurant}

### Menus

Méthode GET pour afficher la liste de menus d'un restaurant : 

- http://127.0.0.1:8000/api/restaurant/{id_restaurant}/menus 

Méthode POST pour enregistrer un menu à un restaurant : 

- http://127.0.0.1:8000/api/restaurant/{id_restaurant}/menu

```json
{
"id" : 9,
"name" : "grec",
"description" : "8 sushis, 4 makis, 4 calofornia rolls",
"price" : 16.5
}
```

Méthode PUT pour modifier le menu d'un restaurant : 

- http://127.0.0.1:8000/api/restaurant/{id_restaurant}/menu/{id_menu}

Méthode DELETE pour supprimer le menu d'un restaurant : 

- http://127.0.0.1:8000/api/restaurant/{id_restaurant}/menu/{id_menu}

### Utillisateur 

Méthode GET pour voir la liste des utilisateur : 

- http://127.0.0.1:8000/api/users

Méthode GET pour voir un utilisateur en particulier : 

- http://127.0.0.1:8000/api/user/{id_utilisateur}

Méthode POST pour enregistrer un utilisateur : 

- http://127.0.0.1:8000/api/register

```json
{
"id": "1",
"username" : "Fullmetal",
"firstname" : "Edward",
"name" : "Elric",
"email" : "edward@gmail.com", 
"password" : "azertyuiop",
"age" : 19
}
```

Méthode POST pour qu'un utilisateur se déconnecte : 

- http://127.0.0.1:8000/api/logout  

Méthode POST pour q'un utilisateur puisse s'authentifier : 

- http://127.0.0.1:8000/api/auth








