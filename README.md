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
git clone https://github.com/TON_USERNAME/tshirt-store.git
cd tshirt-store
```

> Remplace `TON_USERNAME` par ton nom d'utilisateur GitHub.

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

Puis ouvre le fichier `.env` et modifie ces lignes :

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tshirt_shop
DB_USERNAME=root
DB_PASSWORD=
```

---



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

## 💳 Tester le paiement Stripe

Sur la page de checkout, utilise cette carte de test :

| Champ | Valeur |
|-------|--------|
| Numéro | `4242 4242 4242 4242` |
| Date d'expiration | N'importe quelle date future (ex: `12/30`) |
| CVC | N'importe quel code 3 chiffres (ex: `123`) |
| Code postal | N'importe quel code (ex: `1000`) |

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

## 🐛 Résolution des problèmes courants

### ❌ `No application encryption key has been specified`

```bash
php artisan key:generate
```

### ❌ Erreur lors de `php artisan migrate`

Vérifie que :
1. La base de données `tshirt_store` existe bien dans MySQL
2. Les credentials dans `.env` sont corrects (username, password)
3. MySQL est bien démarré

### ❌ Page blanche ou erreur 500

```bash
chmod -R 775 storage bootstrap/cache
php artisan config:clear
php artisan cache:clear
```

Vérifie aussi les logs : `storage/logs/laravel.log`

### ❌ Les assets (CSS/JS) ne chargent pas

Assure-toi que `npm run dev` tourne dans un terminal parallèle. Si tu es en production :

```bash
npm run build
```

### ❌ Les images uploadées n'apparaissent pas

```bash
php artisan storage:link
```

### ❌ Stripe retourne une erreur

1. Vérifie que tes clés dans `.env` commencent bien par `pk_test_` et `sk_test_`
2. Relance `php artisan config:clear` après modification du `.env`
3. Vérifie que ton APP_URL correspond bien à l'URL utilisée (ex: `http://localhost:8000`)

---

## 🔄 Remettre la base à zéro

Pour recommencer avec des données fraîches :

```bash
php artisan migrate:fresh --seed
```

⚠️ **Attention** : cette commande supprime toutes les données existantes.

---

## 📦 Commande tout-en-un

Une fois le projet cloné et `.env` configuré, tu peux tout enchaîner :

```bash
composer install && \
npm install && \
php artisan key:generate && \
php artisan migrate --seed && \
php artisan storage:link && \
npm run build && \
php artisan serve
```

---

## 📄 Documentation

La documentation complète se trouve dans le dossier `docs/` :

| Fichier | Description |
|---------|-------------|
| `docs/DOCUMENTATION_TECHNIQUE.md` | Architecture, modèle de données, sécurité, déploiement |
| `docs/MANUEL_UTILISATEUR.md` | Guide d'utilisation client + admin |

---

## ✅ User stories couvertes

| ID | Description | Statut |
|----|-------------|--------|
| US1 | Voir les catégories sur l'accueil | ✅ |
| US2 | Sélectionner une catégorie | ✅ |
| US3 | Voir le détail d'un produit | ✅ |
| US4 | Se connecter | ✅ |
| US5 | S'inscrire | ✅ |
| US6 | Modifier ses infos personnelles | ✅ |
| US7 | Se déconnecter | ✅ |
| US8 | Voir son panier | ✅ |
| US9 | Modifier le panier | ✅ |
| US10 | Payer (Stripe) | ✅ |
| US11 | Choisir un transporteur | ✅ |
| US12 | Gérer les produits (CRUD) | ✅ |
| US13 | Gérer les commandes | ✅ |
| US14 | Voir les statistiques | ✅ |
| US15 | Optimisation SEO | ✅ |
| US16 | Partage réseaux sociaux | ✅ |

---

## 👤 Auteur

**LAGHIM**  
Bachelier en Informatique de Gestion — Full-Stack Web Development  
EAFC Bruxelles — 2025/2026

---

*Projet réalisé dans le cadre du Travail de Fin d'Études (TFE)*

# t-Shirt-Website