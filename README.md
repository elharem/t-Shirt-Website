<p align="center">
  <h1 align="center">👕 TshirtShop</h1>
</p>

<p align="center">
Site e-commerce développé avec Laravel 12 + Vue.js 3
</p>

<p align="center">
<img src="https://img.shields.io/badge/Laravel-12-red">
<img src="https://img.shields.io/badge/Vue.js-3-green">
<img src="https://img.shields.io/badge/PHP-8-blue">
<img src="https://img.shields.io/badge/MySQL-Database-orange">
</p>

---

# 📖 À propos du projet

TshirtShop est un projet e-commerce permettant :

- gestion des produits
- gestion des catégories
- authentification administrateur
- dashboard administrateur
- gestion des commandes
- gestion des utilisateurs
- gestion du stock
- statistiques financières

Le projet utilise Laravel comme backend API et Vue.js comme frontend dynamique.

---

# 🚀 Technologies utilisées

## Backend

- Laravel 12
- PHP 8+
- MySQL / MariaDB

## Frontend

- Vue.js 3
- Axios
- Vite

---

# 📦 Installation du projet

## 1. Cloner le projet

```bash
git clone https://github.com/VOTRE-LIEN-GITHUB.git
```

Puis :

```bash
cd t-shirt-website
```

---

# ⚙️ Installer les dépendances

## Laravel

```bash
composer install
```

## Vue.js

```bash
npm install
```

---

# 🗄️ Configuration de la base de données

Créer une base MySQL :

```sql
CREATE DATABASE tshirt_shop;
```

---

# 🔑 Configuration du fichier .env

Copier :

```bash
cp .env.example .env
```

Modifier :

```env
DB_DATABASE=tshirt_shop
DB_USERNAME=root
DB_PASSWORD=
```

---

# 🔥 Générer la clé Laravel

```bash
php artisan key:generate
```

---

# 📂 Créer les tables

```bash
php artisan migrate
```

---

# 👤 Créer le compte administrateur

Ouvrir Tinker :

```bash
php artisan tinker
```

Puis :

```php
\App\Models\User::create([
    'name' => 'admin',
    'email' => 'admin@test.com',
    'password' => bcrypt('123456')
]);
```

Quitter :

```php
exit
```

---

# ▶️ Lancer le projet

## Compiler Vue.js

```bash
npm run build
```

## Lancer Laravel

```bash
php artisan serve
```

---

# 🌐 Accès au site

## Site principal

```txt
http://127.0.0.1:8000
```

## Dashboard administrateur

```txt
http://127.0.0.1:8000/admin
```

---

# 🔐 Identifiants administrateur

Email :

```txt
admin@test.com
```

Mot de passe :

```txt
123456
```

---

# 📁 Structure du projet

## Backend Laravel

```txt
app/
routes/
database/
config/
```

## Frontend Vue.js

```txt
resources/js/components/
```

### Composants principaux

- Home.vue
- Admin.vue
- login.vue

---

# 📡 API disponibles

## Produits

```txt
GET    /api/products
POST   /api/products
PUT    /api/products/{id}
DELETE /api/products/{id}
```

---

## Catégories

```txt
GET    /api/categories
POST   /api/categories
DELETE /api/categories/{id}
```

---

## Authentification

```txt
POST /api/login
```

---

# 👨‍💻 Fonctionnalités administrateur

- Ajouter produit
- Modifier produit
- Supprimer produit
- Ajouter catégorie
- Supprimer catégorie
- Gestion du stock
- Gestion des commandes
- Gestion des utilisateurs
- Dashboard administrateur
- Statistiques financières

---

# 🛠️ Commandes importantes

## Voir les routes Laravel

```bash
php artisan route:list
```

---

## Nettoyer le cache

```bash
php artisan optimize:clear
```

---

## Recompiler Vue.js

```bash
npm run build
```

---

# ⚠️ Important

Après chaque modification Vue.js :

1. Sauvegarder les fichiers
2. Exécuter :

```bash
npm run build
```

3. Rafraîchir le navigateur

---

# 👥 Collaboration GitHub

## Récupérer les modifications

```bash
git pull
```

---

## Envoyer les modifications

```bash
git add .
git commit -m "message"
git push
```

---

# 📚 Auteur

Projet réalisé dans le cadre du cours de développement web.

👕 TshirtShop © 2026













<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).





















































<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
