# Évaluation — Mini Blog Laravel / Blade

**Module :** Développement Web avec Laravel
**Niveau :** L3 — Informatique et Logiciels
**Dépôt GitHub :** [Dr-Lab1/mini-blog-l3-il](https://github.com/Dr-Lab1/mini-blog-l3-il)

---

## Mise en place du projet

Avant de commencer l'évaluation, effectuez les étapes suivantes dans l'ordre :

```bash
# 1. Cloner le dépôt GitHub
git clone https://github.com/Dr-Lab1/mini-blog-l3-il.git

# 2. Se déplacer dans le répertoire du projet
cd mini-blog-l3-il

# 3. Installer les dépendances PHP
composer install

# 4. Copier le fichier d'environnement
cp .env.example .env

# 5. Générer la clé de l'application
php artisan key:generate
```

> Assurez-vous d'avoir **PHP 8.1+**, **Composer** et **Laravel 10+** installés sur votre machine avant de commencer.

---

## Travail à réaliser

### Question 1 — Layouts Blade (racines des deux parties)

Créez deux fichiers root Blade distincts :

- `resources/views/App.blade.php` → pour la **partie publique** du blog
- `resources/views/Dashboard.blade.php` → pour la **partie dashboard** (administration)

Chaque root doit utiliser les directives `@yield` pour définir les zones dynamiques (au minimum : `title`, `content`). Chaque vue enfant devra utiliser `@extends` pour hériter du bon layout et `@section` / `@endsection` pour injecter son contenu dans les zones correspondantes.

**Questions :**

1. Quelle est la différence entre `@yield('title')` et `@yield('title', 'Valeur par défaut')` ?
reponse:
@yield('title') : Affiche le contenu de la section title. Si la section n'existe pas affiche rien.

@yield('title', 'Valeur par défaut') : Affiche le contenu de la section title. Si elle n'existe pas → affiche "Valeur par défaut".

2. Pourquoi utilise-t-on `@extends` plutôt que d'inclure le header et le footer manuellement dans chaque fichier de vue ?
reponse:
le code commun (header, footer, sidebar) n'est écrit qu'une seule fois

Maintenance facilitée : une modification dans le layout impacte toutes les vues enfants

Lisibilité : les vues enfants sont plus courtes et ne contiennent que ce qui est spécifique
3. Comment s'assure-t-on qu'une vue du dashboard n'étende jamais accidentellement le layout public ?

reponse:
Nommage distinct : @extends('dashboard') dif @extends('app')

Organisation des dossiers : toutes les vues dashboard sont dans resources/views/dashboard/

Contrôleur dédié : DashboardController retourne toujours des vues du dossier dashboard/

Vérification manuelle lors du développement



---

### Question 2 — Assets & Composants de la partie publique

1. Déplacez le fichier `index.css` dans le dossier `public/css/`.
2. Référencez-le dans vos layouts en utilisant la fonction **`asset()`** de Laravel.
3. Créez deux **composants Blade anonymes** :
   - `resources/views/components/header.blade.php`
   - `resources/views/components/footer.blade.php`
4. Incluez ces composants dans le layout public en utilisant la syntaxe `@include()`.


---

### Question 3 — Assets & Composants du dashboard

1. Déplacez le fichier `Dashboard.css` dans le dossier `public/css/`.
2. Référencez-le dans vos layouts en utilisant la fonction **`asset()`**.
3. Créez deux composants Blade pour le dashboard :
   - `resources/views/components/dashboard/topbar.blade.php`
   - `resources/views/components/dashboard/sidebar.blade.php`
4. Incluez ces composants dans `Dashboard.blade.php`.

**Questions :**

1. Comment rendre la classe `active` d'un lien de la sidebar **dynamique** selon la route courante, en utilisant `request()->routeIs()` ou `Route::currentRouteName()` ?
reponse:
Méthode avec request()->routeIs() :

blade
<a href="{{ route('dashboard.index') }}" class="nav-item {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
    Dashboard
</a>
Méthode avec Route::currentRouteName() :

blade
<a href="{{ route('dashboard.index') }}" class="nav-item {{ Route::currentRouteName() == 'dashboard.index' ? 'active' : '' }}">
    Dashboard
</a>
Différence :

request()->routeIs() → plus flexible, accepte des motifs (dashboard.*)

Route::currentRouteName() → comparaison exacte
2. Pourquoi placer les composants dashboard dans un sous-dossier ?
Avantage	Explication
Organisation	Sépare clairement les composants publics des composants d'administration
Évite les conflits	On peut avoir components/header.blade.php (public) et components/dashboard/header.blade.php (admin)
Maintenance	Plus facile de trouver et modifier les composants d'une section spécifique
Lisibilité	La structure du dossier reflète l'architecture de l'application

2. Pourquoi est-il préférable de placer les composants du dashboard dans un sous-dossier `components/dashboard/` plutôt que directement dans `components/` ?

---

### Question 4 — Création des routes

Dans le fichier `routes/web.php`, déclarez une route nommée pour chacune des vues suivantes :

**Partie publique :**

| URL | Nom de la route | Description |
|---|---|---|
| `/` | `home` | Page d'accueil |
| `/articles` | `articles.index` | Liste des articles |
| `/articles/{slug}` | `articles.show` | Détail d'un article |
| `/categories` | `categories.index` | Liste des catégories |
| `/about` | `about` | Page à propos |

**Questions :**

1. Quelle est la différence entre `Route::get()` et `Route::post()` ? Dans quel cas utilise-t-on l'un plutôt que l'autre ?

Méthode	Utilisation	Exemple d'utilisation
Route::get()	Récupérer des données (lecture)	Afficher une page, lister des articles, voir le détail d'un produit
Route::post()	Envoyer/modifier des données (écriture)	Formulaire de contact, connexion, création d'article, ajout de commentaire
Quand utiliser l'un plutôt que l'autre ?

GET : Quand l'utilisateur veut voir des données (pas de modification)

POST : Quand l'utilisateur veut envoyer des données qui modifient l'état du serveur

2. Comment déclarer et nommer une route avec la méthode `->name()` ? Pourquoi les noms de routes sont-ils indispensables pour utiliser `route()` dans les vues Blade ?
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Pourquoi les noms sont indispensables ?

Sans nom (URL en dur)	Avec nom (route())
<a href="/articles">Articles</a>	<a href="{{ route('articles.index') }}">Articles</a>
Si l'URL change, il faut modifier TOUS les fichiers	Si l'URL change, on modifie UNE SEULE fois dans web.php
Risque d'erreurs et de liens cassés	Plus maintenable et sécurisé
C'est une variable dans l'URL qui permet de passer des données spécifiques.

Déclaration :


Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');

3. Qu'est-ce qu'un paramètre de route dynamique comme `{id}` ? Comment le récupérer dans le contrôleur ?

C'est une variable dans l'URL qui permet de passer des données spécifiques.

Déclaration :

php
Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');

4. Que se passe-t-il si deux routes ont la même URL mais des méthodes HTTP différentes (`GET` et `POST`) ?

GET	Afficher le formulaire	L'utilisateur arrive sur la page
POST	Traiter le formulaire	L'utilisateur soumet le formulaire
Pourquoi c'est utile ? Une même URL peut avoir deux comportements différents selon l'action de l'utilisateur (afficher vs soumettre).

---

### Question 5 — Groupement des routes du dashboard

Créez un **groupe de routes** pour toutes les pages du dashboard en utilisant `Route::prefix()` et `->group()`.

Toutes les routes du dashboard doivent :
- Avoir le **préfixe d'URL** `/dashboard`
- Avoir le **préfixe de nom** `dashboard.`
- Pointer vers les méthodes de `DashboardController`

Exemple de routes attendues :

| URL | Nom de la route | Méthode du contrôleur |
|---|---|---|
| `/dashboard` | `dashboard.index` | `index` |
| `/dashboard/articles` | `dashboard.articles` | `articles` |
| `/dashboard/categories` | `dashboard.categories` | `categories` |
| `/dashboard/utilisateurs` | `dashboard.users` | `users` |
| `/dashboard/commentaires` | `dashboard.comments` | `comments` |
| `/dashboard/reglages` | `dashboard.settings` | `settings` |

**Questions :**

1. Quelle est la syntaxe complète pour créer un groupe de routes avec un préfixe d'URL et un préfixe de nom en même temps ?

La syntaxe complète est :

Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::get('/articles', [DashboardController::class, 'articles'])->name('articles');
    Route::get('/users', [DashboardController::class, 'users'])->name('users');
});
prefix('dashboard') ajoute /dashboard devant toutes les URLs du groupe. name('dashboard.') ajoute dashboard. devant tous les noms des routes. Ainsi, la route ci-dessus aura l'URL /dashboard et le nom dashboard.index.


2. Quelle est la différence entre `Route::prefix()` et `Route::middleware()` dans un groupe de routes ?
Route::prefix() permet d'ajouter un segment d'URL devant toutes les routes du groupe, par exemple pour regrouper toutes les routes d'administration sous /admin.

Route::middleware() permet d'appliquer des filtres ou des couches de sécurité à toutes les routes du groupe, par exemple middleware('auth') pour protéger les routes derrière une authentification, ou middleware('admin') pour réserver l'accès aux administrateurs.

On peut les combiner : Route::prefix('admin')->middleware('auth')->group(function() { ... }) pour avoir des routes d'administration protégées derrière /admin.

3. Qu'est-ce que `Route::resource()` ? Pour quelles ressources (articles, catégories, utilisateurs) serait-il pertinent de l'utiliser et quelles routes génère-t-il automatiquement ?

Route::resource() est une méthode qui génère automatiquement un ensemble complet de routes pour les opérations CRUD (Create, Read, Update, Delete) sur une ressource. Au lieu d'écrire manuellement les sept routes nécessaires, une seule ligne suffit.

Par exemple : Route::resource('articles', ArticleController::class);

Cette seule ligne génère les routes suivantes : l'index qui liste tous les articles, le formulaire de création, l'enregistrement d'un nouvel article, l'affichage d'un article spécifique, le formulaire d'édition, la mise à jour et enfin la suppression. Chaque route est automatiquement nommée avec le préfixe articles. suivi de index, create, store, show, edit, update, destroy.

Pour quelles ressources l'utiliser ?

Articles : pertinent car on a besoin de toutes les opérations CRUD (lister, créer, afficher, modifier, supprimer)

Catégories : pertinent pour les mêmes raisons (gestion complète des catégories)

Utilisateurs : pertinent pour gérer les comptes utilisateurs (création, édition, suppression)

Quand ne pas l'utiliser ? Pour les ressources où on n'a pas besoin de toutes les opérations, comme les commentaires où on a rarement besoin de formulaire de création (les commentaires sont créés sur la page publique) ou d'édition. Dans ce cas, on préfère créer les routes manuellement.
---

### Question 6 — Création des contrôleurs

Générez les deux contrôleurs suivants via la commande `php artisan make:controller` :

**`MainController`** — gérera toutes les vues publiques :
- `index()` → vue de la page d'accueil
- `articles()` → vue de la liste des articles
- `article($slug)` → vue du détail d'un article
- `categories()` → vue de la liste des catégories
- `about()` → vue de la page à propos

**`DashboardController`** — gérera toutes les vues du dashboard :
- `index()` → vue principale du dashboard
- `articles()` → vue des articles (admin)
- `categories()` → vue des catégories (admin)
- `users()` → vue des utilisateurs
- `comments()` → vue des commentaires
- `settings()` → vue des réglages

Chaque méthode doit retourner sa vue correspondante avec `return view('...')`.

**Questions :**

1. Quelle est la commande artisan pour générer un contrôleur ? Quelle option ajouter pour générer directement un **contrôleur de ressource** avec toutes les méthodes CRUD ?
La commande de base est : php artisan make:controller NomController

Pour générer un contrôleur de ressource avec toutes les méthodes CRUD, on ajoute l'option --resource :

php artisan make:controller ArticleController --resource

Cela crée automatiquement un contrôleur avec les sept méthodes pré-remplies : index(), create(), store(), show(), edit(), update(), destroy().

2. Quelle est la convention de nommage des méthodes d'un contrôleur de ressource Laravel (`index`, `show`, `create`, `store`, `edit`, `update`, `destroy`) ? À quelle action correspond chacune ?
Méthode	Action correspondante
index()	Affiche la liste complète de toutes les ressources (page d'accueil de la ressource)
create()	Affiche le formulaire de création d'une nouvelle ressource
store()	Enregistre et valide la nouvelle ressource dans la base de données (reçoit les données du formulaire de création)
show($id)	Affiche le détail d'une ressource spécifique identifiée par son identifiant
edit($id)	Affiche le formulaire d'édition pré-rempli avec les données d'une ressource existante
update($id)	Met à jour la ressource dans la base de données avec les données du formulaire d'édition
destroy($id)	Supprime définitivement la ressource de la base de données


3. Quelle est la différence entre ces trois façons de passer des données à une vue depuis un contrôleur ?
   ```php
   return view('articles', ['posts' => $posts]);
   return view('articles', compact('posts'));
   return view('articles')->with('posts', $posts);
   ```
Les trois façons sont fonctionnellement équivalentes : elles transmettent la variable $posts à la vue articles.

Première façon : return view('articles', ['posts' => $posts]);
On passe un tableau associatif où la clé 'posts' est le nom de la variable accessible dans la vue et la valeur $posts est la donnée. Cette syntaxe est explicite et permet de passer plusieurs variables facilement : ['posts' => $posts, 'title' => $title].

Deuxième façon : return view('articles', compact('posts'));
La fonction PHP compact() crée automatiquement un tableau associatif en utilisant le nom de la variable comme clé et sa valeur comme contenu. C'est la syntaxe la plus courte et la plus lisible quand les noms des variables dans le contrôleur et dans la vue sont identiques.

Troisième façon : return view('articles')->with('posts', $posts);
On utilise la méthode with() qui permet un chaînage fluide pour ajouter plusieurs variables : ->with('posts', $posts)->with('title', 'Mon titre'). Cette syntaxe est utile quand on veut ajouter conditionnellement des variables ou quand on préfère une approche orientée objet.

Les développeurs Laravel préfèrent généralement compact() car elle est concise, mais les trois syntaxes sont valides et largement utilisées dans la communauté.
---

### Question 7 — Liens et navigation

Sont concernés (liste non exhaustive) :
- Les liens de la navbar publique (Accueil, Articles, Catégories, À propos)
- Les liens de la sidebar du dashboard (Dashboard, Articles, Catégories, Utilisateurs, Commentaires, Réglages)
- Le lien « Voir le blog » dans la topbar du dashboard
- Le lien « Dashboard / Admin » dans le footer public
- Les liens « Voir tout → » sur la page d'accueil
- Les liens sur les cartes d'articles (qui mènent vers le détail d'un article)
- Le breadcrumb sur la page article
- Le bouton « ↗ Voir le blog » dans le dashboard

---

## 📁 Structure de fichiers attendue

À la fin de l'évaluation, votre projet doit respecter l'arborescence suivante :

```
resources/
└── views/
    ├── app.blade.php       ← Layout partie publique
    ├── dashboard.blade.php ← Layout dashboard
    ├── components/
    │   ├── header.blade.php           ← Header public
    │   ├── footer.blade.php           ← Footer public
    │   └── dashboard/
    │       ├── topbar.blade.php       ← Topbar dashboard
    │       └── sidebar.blade.php      ← Sidebar dashboard
    ├── public/                        ← Vues publiques
    │   ├── index.blade.php
    │   ├── articles.blade.php
    │   ├── article.blade.php
    │   ├── categories.blade.php
    │   └── about.blade.php
    └── dashboard/                     ← Vues dashboard
        ├── index.blade.php
        ├── articles.blade.php
        ├── categories.blade.php
        ├── users.blade.php
        ├── comments.blade.php
        └── settings.blade.php

app/
└── Http/
    └── Controllers/
        ├── MainController.php
        └── DashboardController.php

public/
└── css/
    ├── public.css
    └── dashboard.css

routes/
└── web.php
```

---

## Critères d'évaluation

| Critère | Points |
|---|---|
| Layouts Blade corrects avec `@extends`, `@yield`, `@section` | 3 pts |
| Composants publics (header, footer) fonctionnels avec `asset()` | 3 pts |
| Composants dashboard (topbar, sidebar) fonctionnels avec `asset()` | 3 pts |
| Routes publiques nommées et correctement déclarées | 3 pts |
| Routes dashboard groupées avec préfixe et nommage cohérent | 3 pts |
| Contrôleurs créés avec les bonnes méthodes et retours de vues | 3 pts |
| Liens Blade partout | 4 pts |
| Réponses aux questions théoriques | 8 pts |
| **Total** | **30 pts** |

---

## Consignes générales

- Le travail est **individuel**.
- Soumettez votre travail en poussant votre code sur un dépôt GitHub **personnel** et en partageant le lien.
- Le dépôt doit contenir un fichier `.env.example` à jour mais **jamais** le fichier `.env` lui-même.
- Toute ressemblance de code entre deux rendus entraînera un **zéro** pour les deux parties concernées.
- Les réponses aux questions théoriques sont à rédiger directement dans ce fichier `README.md`, sous chaque question.

**Bonne évaluation !**