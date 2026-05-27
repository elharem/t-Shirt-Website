# 👕 TEE/SHOP — Boutique de t-shirts en ligne


---

## 📋 Présentation

TEE/SHOP est une boutique e-commerce complète de vente de t-shirts en ligne, développée avec **Laravel 11**, **Tailwind CSS**, **Alpine.js**, **Stripe** et **Chart.js**.

Toutes les **16 user stories** du cahier des charges sont implémentées.

---

## 🛠 Stack technique

| Couche | Technologie |
|--------|-------------|
| Backend | PHP 8.2 + Laravel 11 |
| Authentification | Laravel Breeze |
| Frontend | Blade + Tailwind CSS 3 + Alpine.js |
| Build | Vite |
| Paiement | Stripe Checkout (mode test) |
| Base de données | MySQL 8 |
| Graphiques | Chart.js 4 |

---

## ⚡ Prérequis

Avant de commencer, assure-toi d'avoir installé sur ta machine :

- **PHP** ≥ 8.2
- **Composer** ≥ 2.x
- **Node.js** ≥ 18 + **npm**
- **MySQL** ≥ 8.0
- **Git**

Pour vérifier :

```bash
php -v
composer -V
node -v
npm -v
mysql --version
git --version
```

---

## 🚀 Installation depuis GitHub

### 1. Cloner le dépôt

```bash
git clone https://github.com/elharem/t-Shirt-Website.git
```

---

### 2. Installer les dépendances PHP

```bash
composer install
```

---

### 3. Installer les dépendances JavaScript

```bash
npm install
```

---

### 4. Créer le fichier d'environnement

```bash
cp .env.example .env
php artisan key:generate
```

---

### 5. Configurer la base de données

Crée une base de données MySQL :

```sql
CREATE DATABASE tshirt_store CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

Puis ouvre le fichier `.env`  :

APP_NAME="T-Shirt Store"
APP_ENV=local
APP_KEY=base64:HVSiVBohtbYCyoi6xsEU5+qrx5Qro1NfLoZ2g6xcTqU=
APP_DEBUG=true
APP_URL=http://localhost:8000

APP_LOCALE=fr
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=fr_FR

APP_MAINTENANCE_DRIVER=file
APP_MAINTENANCE_STORE=database

BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tshirt_store
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=public
QUEUE_CONNECTION=database

CACHE_STORE=database
CACHE_PREFIX=

MEMCACHED_HOST=127.0.0.1

REDIS_CLIENT=phpredis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=log
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@tshirt-store.test"
MAIL_FROM_NAME="${APP_NAME}"

VITE_APP_NAME="${APP_NAME}"





---


### 7. Lancer les migrations et les seeders

```bash
php artisan migrate --seed
```

Cette commande crée toutes les tables et insère les données de démonstration :
- 3 catégories (Homme, Femme, Enfant)
- 11 produits avec photos
- 1 compte admin + 1 compte client + 5 clients fictifs
- 20 commandes de démonstration pour les statistiques

---

### 8. Créer le lien symbolique pour le stockage

```bash
php artisan storage:link
```

---

### 9. Compiler les assets

**En développement** (rechargement automatique) :

```bash
npm run dev
```

**En production** (fichiers minifiés) :

```bash
npm run build
```

---

### 10. Lancer le serveur de développement

Dans un **nouveau terminal** (si tu utilises `npm run dev` en parallèle) :

```bash
php artisan serve
```

Le site est maintenant accessible sur **[http://localhost:8000](http://localhost:8000)** 🎉

---

## 🔑 Comptes de démonstration

Après le seed, ces comptes sont prêts à utiliser :

| Rôle | Email | Mot de passe |
|------|-------|--------------|
| 👑 Admin | `admin@tshirt-store.test` | `password` |
| 👤 Client | `client@tshirt-store.test` | `password` |

---


---

## 📁 Structure du projet

```
tshirt-store/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/          # Dashboard, Produits, Commandes, SEO
│   │   │   ├── Auth/           # Login, Register
│   │   │   ├── CartController.php
│   │   │   ├── CheckoutController.php   # Intégration Stripe
│   │   │   ├── CookieController.php     # RGPD
│   │   │   ├── PageController.php       # Pages statiques
│   │   │   └── ...
│   │   └── Middleware/
│   │       ├── EnsureUserIsAdmin.php
│   │       └── MergeGuestCartOnLogin.php
│   └── Models/
│       ├── User.php
│       ├── Category.php
│       ├── Product.php
│       ├── Cart.php / CartItem.php
│       ├── Order.php / OrderItem.php
│       └── CookieConsent.php
├── database/
│   ├── migrations/             # Schéma BDD versionné
│   └── seeders/                # Données de démo
├── resources/
│   ├── css/app.css             # Tailwind + styles custom
│   ├── js/app.js               # Alpine.js + Chart.js
│   └── views/                  # Templates Blade
│       ├── layouts/            # app.blade.php + admin.blade.php
│       ├── partials/           # header, footer, cookie-banner
│       ├── auth/               # login, register
│       ├── admin/              # dashboard, produits, commandes, SEO
│       ├── products/           # index, show, search
│       ├── cart/               # index
│       ├── checkout/           # index, success
│       ├── orders/             # index, show
│       ├── profile/            # edit
│       ├── cookies/            # policy
│       └── pages/              # cgv, faq, livraison, contact, etc.
├── routes/
│   └── web.php                 # Toutes les routes
├── .env.example
├── composer.json
├── package.json
└── vite.config.js
```

---

## 🌐 Routes principales

### Partie publique

| URL | Description |
|-----|-------------|
| `/` | Page d'accueil |
| `/categories` | Liste des catégories |
| `/categories/{slug}` | Produits d'une catégorie |
| `/products` | Tous les produits |
| `/products/{slug}` | Détail d'un produit |
| `/search?q=...` | Recherche |
| `/cart` | Panier |
| `/login` | Connexion |
| `/register` | Inscription |

### Partie membre (connecté)

| URL | Description |
|-----|-------------|
| `/profile` | Mon profil |
| `/checkout` | Finaliser la commande |
| `/orders` | Mes commandes |

### Partie admin (`/admin/*`)

| URL | Description |
|-----|-------------|
| `/admin` | Dashboard + statistiques |
| `/admin/products` | Gestion produits (CRUD) |
| `/admin/categories` | Gestion catégories |
| `/admin/orders` | Gestion commandes |
| `/admin/seo` | SEO & partage social |

---

