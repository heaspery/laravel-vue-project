## Histoires interactives

Ce projet met à disposition une application full-stack permettant la création de compte, l'authentification, puis la lecture d'histoires interactives à choix multiples.

### Outils et langages

* Laravel avec le starter kit Breeze + Inertia
* SQLite
* Vue.js
* Tailwind CSS

## Mise en place

Dans un premier temps, assurez-vous d’avoir :

1. Laravel installé

   * Installation : [https://laravel.com/docs/10.x/installation](https://laravel.com/docs/10.x/installation)
2. Node.js installé

   * Installation : [https://nodejs.org/en/download](https://nodejs.org/en/download)
3. Composer installé

   * Installation : [https://getcomposer.org/download/](https://getcomposer.org/download/)

Ensuite, vous pouvez cloner le dépôt Git.

Une fois téléchargé, exécutez les commandes suivantes dans le terminal pour installer les dépendances :

1. Installation des dépendances avec Composer :

   ```bash
   composer install
   ```

2. Installation des dépendances avec npm :

   ```bash
   npm install
   npm run build
   ```

3. Créer votre propre fichier de configuration :
   ```bash
   cp .env.example .env
   ```

4. Créer votre propre clé d'application, qui mettra à jour la valeur de votre APP_KEY dans votre fichier .env:
   ```bash
    php artisan key:generate
   ```
   
5. Créer la base de données :
   ```bash
    php artisan migrate
   ```
   Vous aurez cette question, à laquelle vous pourrez répondre oui : 

   ```bash
   WARN  The SQLite database configured for this application does not exist: database/database.sqlite.  
     ┌ Would you like to create it? ────────────────────────────────┐
     │ ● Yes / ○ No        
     ```
7. Remplir la base de données de la première histoire :

    ```bash
    php artisan db:seed --class=Story1Seeder
    ```

## Lancer le projet

Pour développer le projet en local, exécutez les commandes suivantes, chacune dans un terminal différent:

1. Démarrer le serveur PHP :

   ```bash
   php artisan serve
   ```

2. Démarrer le serveur Vite :

   ```bash
   npm run dev
   ```
