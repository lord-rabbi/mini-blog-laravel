<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard — Le Blog</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=DM+Sans:wght@300;400;500&display=swap"
        rel="stylesheet">
</head>

<body>

    <aside class="sidebar">
        <div class="sidebar-brand">
            <a href="index.html" class="sidebar-logo">Le Blog</a>
            <div class="sidebar-sub">Administration</div>
        </div>
        <nav class="sidebar-nav">
            <div class="nav-section-label">Vue d'ensemble</div>
            <a href="dashboard.html" class="nav-item active">
                <span class="nav-icon">◈</span> Dashboard
            </a>

            <div class="nav-section-label">Contenu</div>
            <a href="articles.html" class="nav-item">
                <span class="nav-icon">✦</span> Articles
                <span class="nav-badge">50</span>
            </a>
            <a href="categories.html" class="nav-item">
                <span class="nav-icon">◎</span> Catégories
            </a>
            <a href="#" class="nav-item">
                <span class="nav-icon">◇</span> Commentaires
                <span class="nav-badge">250</span>
            </a>

            <div class="nav-section-label">Utilisateurs</div>
            <a href="users.html" class="nav-item">
                <span class="nav-icon">○</span> Utilisateurs
            </a>

            <div class="nav-section-label">Paramètres</div>
            <a href="#" class="nav-item">
                <span class="nav-icon">◻</span> Réglages
            </a>
        </nav>
        <div class="sidebar-footer">
            <div class="sidebar-user">
                <div class="user-avatar">A</div>
                <div>
                    <div class="user-name">Admin</div>
                    <div class="user-role">Super administrateur</div>
                </div>
            </div>
        </div>
    </aside>

    <div class="main">
        <div class="topbar">
            <div class="topbar-title">Dashboard</div>
            <div class="topbar-actions">
                <a href="index.html" class="view-site">↗ Voir le blog</a>
            </div>
        </div>

        <div class="content">
            @extends('dashboard')

@section('title', 'Tableau de bord')

@section('content')
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-label">Articles publiés</div>
            <div class="stat-value">26</div>
            <div class="stat-change up">↑ Sur 50 total</div>
        </div>
        <div class="stat-card green">
            <div class="stat-label">Commentaires</div>
            <div class="stat-value">250</div>
            <div class="stat-change">5 par article en moyenne</div>
        </div>
        <div class="stat-card orange">
            <div class="stat-label">Utilisateurs</div>
            <div class="stat-value">305</div>
            <div class="stat-change up">↑ +12 ce mois</div>
        </div>
        <div class="stat-card yellow">
            <div class="stat-label">Catégories</div>
            <div class="stat-value">5</div>
            <div class="stat-change">10 articles / catégorie</div>
        </div>
    </div>

    <div class="dash-grid">
        <div class="panel">
            <div class="panel-header">
                <div class="panel-title">Articles récents</div>
                <a href="articles.html" class="panel-action">Voir tout →</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Catégorie</th>
                        <th>Statut</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="truncate">Excepturi eligendi aliquid iste laboriosam</td>
                        <td class="text-muted">Optio</td>
                        <td><span class="badge badge-published">Publié</span></td>
                        <td class="text-muted">15 jul. 2015</td>
                    </tr>
                    <tr>
                        <td class="truncate">Aut repellat ut qui et</td>
                        <td class="text-muted">Aperiam</td>
                        <td><span class="badge badge-published">Publié</span></td>
                        <td class="text-muted">8 oct. 2019</td>
                    </tr>
                    <tr>
                        <td class="truncate">Dignissimos et eaque aut sed fugiat et</td>
                        <td class="text-muted">Optio</td>
                        <td><span class="badge badge-published">Publié</span></td>
                        <td class="text-muted">23 sep. 1988</td>
                    </tr>
                    <tr>
                        <td class="truncate">Aut eveniet libero autem voluptatum eos</td>
                        <td class="text-muted">Optio</td>
                        <td><span class="badge badge-draft">Brouillon</span></td>
                        <td class="text-muted">—</td>
                    </tr>
                    <tr>
                        <td class="truncate">Veritatis ut corrupti minus harum</td>
                        <td class="text-muted">Optio</td>
                        <td><span class="badge badge-published">Publié</span></td>
                        <td class="text-muted">6 fév. 1984</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="panel">
            <div class="panel-header">
                <div class="panel-title">Activité récente</div>
            </div>
            <div class="activity-list">
                <div class="activity-item">
                    <div class="activity-dot green"></div>
                    <div>
                        <div class="activity-text">Nouvel article publié par <strong>Jacklyn Lueilwitz</strong></div>
                        <div class="activity-time">Il y a 2 heures</div>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="activity-dot"></div>
                    <div>
                        <div class="activity-text">Nouveau commentaire sur <strong>Excepturi eligendi...</strong></div>
                        <div class="activity-time">Il y a 4 heures</div>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="activity-dot orange"></div>
                    <div>
                        <div class="activity-text">Nouvel utilisateur inscrit : <strong>Mikel Lynch</strong></div>
                        <div class="activity-time">Il y a 6 heures</div>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="activity-dot green"></div>
                    <div>
                        <div class="activity-text">Article modifié par <strong>Dr. Travon Kirlin</strong></div>
                        <div class="activity-time">Hier à 14:32</div>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="activity-dot"></div>
                    <div>
                        <div class="activity-text">5 nouveaux commentaires en attente de modération</div>
                        <div class="activity-time">Hier à 09:15</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
        </div>
    </div>

</body>

</html>
