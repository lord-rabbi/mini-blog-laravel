@extends('app')

@section('title', 'Accueil')

@section('content')
    <div class="hero">
        <div class="hero-left">
            <div class="hero-tag">BIENVENUE</div>
            <h1 class="hero-title">Le Blog</h1>
            <p class="hero-desc">Des articles sur Laravel, Docker et les technologies web.</p>
        </div>
    </div>

    <div class="section">
        <div class="section-header">
            <h2 class="section-title">Articles récents</h2>
            <a href="{{ route('articles.index') }}" class="section-link">Voir tout →</a>
        </div>
        <div class="articles-grid">
            <article class="article-card featured">
                <div class="article-cat">Laravel</div>
                <h3 class="article-title">Bien démarrer avec Laravel 13</h3>
                <p class="article-excerpt">Découvrez les nouveautés de Laravel 13...</p>
                <div class="article-meta">
                    <span>15 mai 2025</span>
                    <span><a href="{{ route('articles.show', 'laravel-13') }}">Lire la suite →</a></span>
                </div>
            </article>
        </div>
    </div>

    <div class="section">
        <div class="section-header">
            <h2 class="section-title">Catégories</h2>
            <a href="{{ route('categories.index') }}" class="section-link">Voir tout →</a>
        </div>
        <div class="categories-row">
            <a href="{{ route('categories.index') }}?cat=laravel" class="cat-pill">Laravel</a>
            <a href="{{ route('categories.index') }}?cat=docker" class="cat-pill">Docker</a>
            <a href="{{ route('categories.index') }}?cat=php" class="cat-pill">PHP</a>
        </div>
    </div>
@endsection
