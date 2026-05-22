@extends('app')

@section('title', $slug)

@section('content')
    <div class="article-hero">
        <div class="breadcrumb">
            <a href="{{ route('home') }}">Accueil</a>
            <span>/</span>
            <a href="{{ route('articles.index') }}">Articles</a>
            <span>/</span>
            <span>{{ str_replace('-', ' ', $slug) }}</span>
        </div>
        <div class="article-cat">Technologie</div>
        <h1 class="article-title">{{ str_replace('-', ' ', $slug) }}</h1>
        <div class="article-meta-bar">
            <div class="author-block">
                <div class="author-avatar">A</div>
                <div>
                    <div class="author-name">Admin</div>
                    <div class="author-sub">Auteur</div>
                </div>
            </div>
            <div class="meta-item"><strong>Publié le</strong> 15 mai 2025</div>
            <div class="meta-item"><strong>Temps de lecture</strong> 5 min</div>
        </div>
    </div>

    <div class="article-layout">
        <div class="article-body">
            <p class="article-lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <div class="article-content">
                <p>Contenu détaillé de l'article : {{ $slug }}</p>
            </div>
            <div class="article-tags">
                <a href="#" class="tag">Laravel</a>
                <a href="#" class="tag">PHP</a>
                <a href="#" class="tag">Web</a>
            </div>
        </div>
        <aside class="sidebar">
            <div class="sidebar-block">
                <div class="sidebar-label">À propos</div>
                <p class="text-muted">Blog technique sur le développement web.</p>
            </div>
        </aside>
    </div>
@endsection
