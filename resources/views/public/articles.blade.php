@extends('app')

@section('title', 'Articles')

@section('content')
    <div class="page-header">
        <div class="page-tag">LE BLOG</div>
        <h1 class="page-title">Tous les articles</h1>
        <div class="page-count">3 articles</div>
    </div>

    <div class="articles-list">
        @php
            $articles = [
                ['slug' => 'laravel-13', 'title' => 'Bien démarrer avec Laravel 13', 'category' => 'Laravel', 'date' => '15 mai 2025', 'excerpt' => 'Découvrez les nouveautés...'],
                ['slug' => 'docker-essentiel', 'title' => 'Docker essentiel pour développeurs', 'category' => 'Docker', 'date' => '10 mai 2025', 'excerpt' => 'Conteneurisez vos applications...'],
                ['slug' => 'php-84', 'title' => 'Les nouveautés de PHP 8.4', 'category' => 'PHP', 'date' => '5 mai 2025', 'excerpt' => 'Découvrez les nouvelles fonctionnalités...']
            ];
        @endphp

        @foreach($articles as $index => $article)
        <article class="article-item">
            <div>
                <div class="ai-cat">{{ $article['category'] }}</div>
                <a href="{{ route('articles.show', $article['slug']) }}" style="text-decoration:none;color:inherit">
                    <h2 class="ai-title">{{ $article['title'] }}</h2>
                </a>
                <p class="ai-excerpt">{{ $article['excerpt'] }}</p>
                <div class="ai-meta">
                    <span>{{ $article['date'] }}</span>
                    <span><a href="{{ route('articles.show', $article['slug']) }}">Lire la suite →</a></span>
                </div>
            </div>
            <div class="ai-thumb c{{ $index + 1 }}">📖</div>
        </article>
        @endforeach
    </div>
@endsection
