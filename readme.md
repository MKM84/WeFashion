# WE FASHION
Site E-commerce réalisé avec Laravel Framework.
- Versions utilisées :
  php 7.4.12
  Laravel 5.5.50
  npm 6.14.4
  node v12.16.1
## Initialisation du projet
- Suivez ces étapes avant de lancer le projet dans votre environnement de développement :  
- Créer une table mySQL sur phpMyAdmin nommée wefashion.
- Ouvrez le projet dans votre environnement de développement.
- Dans votre ligne de commande :
  `composer update`
  `npm install`
  `npm run dev`
  `php artisan key:generate`
- Créer un fichier .env à la racine du projet, copier-coller le contenu du fichier .env.example et modifier les lignes suivantes comme suit :
   APP_NAME=WeFashion
   APP_KEY=`le key que vous venez de générer`
   DB_PORT=`le port qu'utilise votre machine...` (pensez à le modifier également dans `config/database.php`)
   DB_USERNAME=`root`(pour ma part)
   DB_PASSWORD=`root`(pour ma part)
- Faites un seed
  `php artisan migrate:fresh --seed`
- Vous pouvez lancer le projet
  `php artisan serve`
