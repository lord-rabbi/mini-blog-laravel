@extends('app')

@section('title', 'Articles')

@section('content')
    <div class="page-header">
        <div class="page-tag">Blog</div>
        <h1 class="page-title">Tous les articles</h1>
        <p class="page-count">50 articles publiés dans 5 catégories</p>
    </div>

    <div class="filters-bar">
        <div class="search-wrap">
            <input type="search" placeholder="Rechercher un article...">
        </div>
        <div class="filter-cats">
            <a href="{{ route('categories.index') }}" class="cat-pill active">Tout</a>
            <a href="{{ route('categories.index') }}?cat=vitae" class="cat-pill">Vitae</a>
            <a href="{{ route('categories.index') }}?cat=dignissimos" class="cat-pill">Dignissimos</a>
            <a href="{{ route('categories.index') }}?cat=optio" class="cat-pill">Optio</a>
            <a href="{{ route('categories.index') }}?cat=aperiam" class="cat-pill">Aperiam</a>
            <a href="{{ route('categories.index') }}?cat=tenetur" class="cat-pill">Tenetur</a>
        </div>
        <select class="sort-select">
            <option>Plus récents</option>
            <option>Plus anciens</option>
            <option>Plus commentés</option>
        </select>
    </div>

    <div class="main-layout">
        <div class="articles-col">
            <div class="articles-list">
                @php
                    $articles = [
                        ['slug' => 'excepturi-eligendi', 'cat' => 'Optio', 'title' => 'Excepturi eligendi aliquid iste laboriosam et soluta cum', 'author' => 'Jacklyn Lueilwitz', 'date' => '15 juillet 2015', 'comments' => 5, 'thumb' => 'c1', 'letter' => 'E'],
                        ['slug' => 'aut-repellat', 'cat' => 'Aperiam', 'title' => 'Aut repellat ut qui et', 'author' => 'Dr. Travon Kirlin', 'date' => '8 octobre 2019', 'comments' => 5, 'thumb' => 'c2', 'letter' => 'A'],
                        ['slug' => 'dignissimos-et-eaque', 'cat' => 'Optio', 'title' => 'Dignissimos et eaque aut sed fugiat et', 'author' => 'Dr. Jenifer Sipes', 'date' => '23 septembre 1988', 'comments' => 5, 'thumb' => 'c3', 'letter' => 'D'],
                        ['slug' => 'velit-ad-quo', 'cat' => 'Aperiam', 'title' => 'Velit ad quo quo vel', 'author' => 'Janet Keeling IV', 'date' => '9 juillet 2009', 'comments' => 5, 'thumb' => 'c4', 'letter' => 'V'],
                        ['slug' => 'sed-molestiae', 'cat' => 'Vitae', 'title' => 'Sed molestiae omnis ratione ea enim ea', 'author' => 'Annetta Runolfsson', 'date' => '21 janvier 2012', 'comments' => 5, 'thumb' => 'c5', 'letter' => 'S'],
                        ['slug' => 'blanditiis-commodi', 'cat' => 'Dignissimos', 'title' => 'Blanditiis commodi qui iure optio', 'author' => 'Juwan Wiegand', 'date' => '27 juin 2000', 'comments' => 5, 'thumb' => 'c1', 'letter' => 'B'],
                    ];
                @endphp

                @foreach($articles as $article)
                <a href="{{ route('articles.show', $article['slug']) }}" class="article-item">
                    <div>
                        <div class="ai-cat">{{ $article['cat'] }}</div>
                        <div class="ai-title">{{ $article['title'] }}</div>
                        <div class="ai-excerpt">Recusandae non totam rerum vero at. Vel ut soluta ipsum nihil aut natus suscipit explicabo.</div>
                        <div class="ai-meta">
                            <span>{{ $article['author'] }}</span>
                            <span>{{ $article['date'] }}</span>
                            <span>{{ $article['comments'] }} commentaires</span>
                        </div>
                    </div>
                    <div class="ai-thumb {{ $article['thumb'] }}">{{ $article['letter'] }}</div>
                </a>
                @endforeach
            </div>
            <div class="pagination">
                <a href="#" class="page-btn active">1</a>
                <a href="#" class="page-btn">2</a>
                <a href="#" class="page-btn">3</a>
                <a href="#" class="page-btn">4</a>
                <a href="#" class="page-btn">5</a>
                <a href="#" class="page-btn">→</a>
            </div>
        </div>

        <aside class="sidebar-col">
            <div class="sidebar-block">
                <div class="sidebar-label">Catégories</div>
                <a href="#" class="cat-item">Vitae <span class="cat-count">10 articles</span></a>
                <a href="#" class="cat-item">Dignissimos <span class="cat-count">10 articles</span></a>
                <a href="#" class="cat-item">Optio <span class="cat-count">10 articles</span></a>
                <a href="#" class="cat-item">Aperiam <span class="cat-count">10 articles</span></a>
                <a href="#" class="cat-item">Tenetur <span class="cat-count">10 articles</span></a>
            </div>

            <div class="sidebar-block">
                <div class="sidebar-label">Articles populaires</div>
                <a href="{{ route('articles.show', 'excepturi-eligendi') }}" class="popular-item">
                    <div class="pop-num">01</div>
                    <div>
                        <div class="pop-title">Excepturi eligendi aliquid iste laboriosam</div>
                        <div class="pop-cat">Optio</div>
                    </div>
                </a>
                <a href="{{ route('articles.show', 'aut-repellat') }}" class="popular-item">
                    <div class="pop-num">02</div>
                    <div>
                        <div class="pop-title">Aut repellat ut qui et</div>
                        <div class="pop-cat">Aperiam</div>
                    </div>
                </a>
                <a href="{{ route('articles.show', 'dignissimos-et-eaque') }}" class="popular-item">
                    <div class="pop-num">03</div>
                    <div>
                        <div class="pop-title">Dignissimos et eaque aut sed fugiat et</div>
                        <div class="pop-cat">Optio</div>
                    </div>
                </a>
            </div>

            <div class="sidebar-block">
                <div class="sidebar-label">Tags</div>
                <div class="tag-cloud">
                    <a href="#" class="tag">Vitae</a>
                    <a href="#" class="tag">Eligendi</a>
                    <a href="#" class="tag">Laboriosam</a>
                    <a href="#" class="tag">Optio</a>
                    <a href="#" class="tag">Soluta</a>
                    <a href="#" class="tag">Repellat</a>
                </div>
            </div>
        </aside>
    </div>
@endsection