# SmartPantry

## Description

SmartPantry est une application web qui permet de gérer son frigo et ses placards. L'application permet de scanner les produits de son frigo et de ses placards pour les ajouter à sa liste de courses. L'application propose également des recettes en fonction des produits que l'utilisateur possède.

## Technologies

- React
- Laravel
- Bootstrap
- MySQL
- Spoonacular API

## Installation

1. Clone the repository => git clone https://github.com/BenjaminBoisedu/SmartPantry.git

2. Sous Windows, ouvrir le terminal en Bash et se placer dans le dossier du projet => cd SmartPantry

3. Installer les dépendances => composer install

4. Creer un fichier .env => cp .env.example .env

5. Copier le contenu dans le fichier .env

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=8889 (mac)// or 3306 (windows)
DB_DATABASE=API_SmartPantry
DB_USERNAME=root
DB_PASSWORD=root (mac)// or empty (windows)
```

6. Créer la base de données dans phpMyAdmin => API_SmartPantry

7. Créer la base de données => php artisan migrate

8. Seeder la base de données => php artisan db:seed --class=ProduitSeeder && php artisan db:seed --class=DatabaseSeeder

9. Lancer le serveur => php artisan serve

10. Ouvrir un autre terminal

11. Aller dans le dossier client => cd client

12. Installer les dépendances => npm install

13. Lancer le serveur => npm run dev

14. Ouvrir le navigateur et aller à l'adresse http://localhost:3000
