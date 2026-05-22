@extends('app')

@section('title', 'À propos')

@section('content')
    <div class="page-header">
        <div class="page-tag">QUI SOMMES-NOUS</div>
        <h1 class="page-title">À propos de ce blog</h1>
    </div>

    <div class="about-content">
        <div class="about-section">
            <h2>Notre histoire</h2>
            <p>Ce blog a été créé dans le cadre d'un projet d'étude sur Laravel et Docker. Notre objectif est de partager des connaissances sur les technologies web modernes.</p>
        </div>

        <div class="about-section">
            <h2>Notre mission</h2>
            <p>Fournir des tutoriels de qualité, des bonnes pratiques et des retours d'expérience pour aider les développeurs à progresser dans leur carrière.</p>
        </div>

        <div class="about-section">
            <h2>Technologies utilisées</h2>
            <ul>
                <li>🐘 Laravel 13 - Framework PHP</li>
                <li>🐳 Docker - Conteneurisation</li>
                <li>🎨 Blade - Templating engine</li>
                <li>🐬 MariaDB - Base de données</li>
            </ul>
        </div>

        <div class="about-section">
            <h2>Nous contacter</h2>
            <p>Email : contact@monblog.com</p>
            <p>GitHub : github.com/monblog</p>
        </div>
    </div>
@endsection
