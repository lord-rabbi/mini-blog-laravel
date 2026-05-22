<nav>
    <a href="{{ route('home') }}" class="nav-logo">Le Blog</a>
    <div class="nav-links">
        <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Accueil</a>
        <a href="{{ route('articles.index') }}" class="{{ request()->routeIs('articles.*') ? 'active' : '' }}">Articles</a>
        <a href="{{ route('categories.index') }}" class="{{ request()->routeIs('categories.*') ? 'active' : '' }}">Catégories</a>
        <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">À propos</a>
    </div>
</nav>
