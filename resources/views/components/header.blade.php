<nav>
    <a href="{{ route('home') }}" class="nav-logo">Le Blog</a>
    <ul class="nav-links">
        <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Accueil</a></li>
        <li><a href="{{ route('articles.index') }}">Articles</a></li>
        <li><a href="{{ route('categories.index') }}">Catégories</a></li>
        <li><a href="{{ route('about') }}">À propos</a></li>
        <li><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
    </ul>
</nav>