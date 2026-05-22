@extends('app')

@section('title', 'Catégories')

@section('content')
    <div class="page-header">
        <div class="page-tag">ORGANISATION</div>
        <h1 class="page-title">Catégories</h1>
        <div class="page-desc">Retrouvez tous nos articles par thématique</div>
    </div>

    <div class="categories-grid">
        <div class="category-card">
            <div class="cat-icon">🤖</div>
            <h3>Intelligence Artificielle</h3>
            <p class="cat-desc">IA, machine learning, ChatGPT et innovations</p>
            <span class="cat-count">12 articles</span>
            <a href="#" class="cat-link">Voir les articles →</a>
        </div>

        <div class="category-card">
            <div class="cat-icon">🔒</div>
            <h3>Cybersécurité</h3>
            <p class="cat-desc">Protection des données, sécurité web et bonnes pratiques</p>
            <span class="cat-count">8 articles</span>
            <a href="#" class="cat-link">Voir les articles →</a>
        </div>

        <div class="category-card">
            <div class="cat-icon">⚡</div>
            <h3>Performance Web</h3>
            <p class="cat-desc">Optimisation, caching et vitesse de chargement</p>
            <span class="cat-count">6 articles</span>
            <a href="#" class="cat-link">Voir les articles →</a>
        </div>

        <div class="category-card">
            <div class="cat-icon">🎨</div>
            <h3>Design UI/UX</h3>
            <p class="cat-desc">Interface utilisateur, expérience et accessibilité</p>
            <span class="cat-count">5 articles</span>
            <a href="#" class="cat-link">Voir les articles →</a>
        </div>

        <div class="category-card">
            <div class="cat-icon">📦</div>
            <h3>DevOps</h3>
            <p class="cat-desc">Docker, CI/CD, déploiement et automatisation</p>
            <span class="cat-count">9 articles</span>
            <a href="#" class="cat-link">Voir les articles →</a>
        </div>

        <div class="category-card">
            <div class="cat-icon">🌍</div>
            <h3>Tendances Tech</h3>
            <p class="cat-desc">Actualités, innovations et veille technologique</p>
            <span class="cat-count">7 articles</span>
            <a href="#" class="cat-link">Voir les articles →</a>
        </div>
    </div>
@endsection
