@extends('dashboard')

@section('title', 'Commentaires')

@section('content')
    <div class="stats-row" style="display:grid;grid-template-columns:repeat(4,1fr);gap:1rem;margin-bottom:1.5rem">
        <div class="stat-card" style="background:var(--surface);border:1px solid var(--border);padding:1.2rem;display:flex;align-items:center;gap:1rem">
            <div class="stat-icon">◇</div>
            <div>
                <div class="stat-num" style="font-size:1.6rem;font-weight:700">250</div>
                <div class="stat-lbl" style="color:var(--muted)">Total</div>
            </div>
        </div>
        <div class="stat-card" style="background:var(--surface);border:1px solid var(--border);padding:1.2rem;display:flex;align-items:center;gap:1rem">
            <div class="stat-icon" style="color:var(--success)">◈</div>
            <div>
                <div class="stat-num" style="font-size:1.6rem;font-weight:700">218</div>
                <div class="stat-lbl" style="color:var(--muted)">Approuvés</div>
            </div>
        </div>
        <div class="stat-card" style="background:var(--surface);border:1px solid var(--border);padding:1.2rem;display:flex;align-items:center;gap:1rem">
            <div class="stat-icon" style="color:var(--warning)">◎</div>
            <div>
                <div class="stat-num" style="font-size:1.6rem;font-weight:700">24</div>
                <div class="stat-lbl" style="color:var(--muted)">En attente</div>
            </div>
        </div>
        <div class="stat-card" style="background:var(--surface);border:1px solid var(--border);padding:1.2rem;display:flex;align-items:center;gap:1rem">
            <div class="stat-icon" style="color:#E74C3C">✕</div>
            <div>
                <div class="stat-num" style="font-size:1.6rem;font-weight:700">8</div>
                <div class="stat-lbl" style="color:var(--muted)">Spam</div>
            </div>
        </div>
    </div>

    <div class="tabs" style="display:flex;gap:0.5rem;margin-bottom:1rem;border-bottom:1px solid var(--border)">
        <button class="tab" style="background:transparent;color:var(--muted);padding:0.6rem 1rem;border:none;cursor:pointer">Tous (250)</button>
        <button class="tab" style="background:transparent;color:var(--muted);padding:0.6rem 1rem;border:none;cursor:pointer">En attente (24)</button>
        <button class="tab" style="background:transparent;color:var(--muted);padding:0.6rem 1rem;border:none;cursor:pointer">Approuvés (218)</button>
        <button class="tab" style="background:transparent;color:var(--muted);padding:0.6rem 1rem;border:none;cursor:pointer">Spam (8)</button>
    </div>

    <div class="toolbar" style="display:flex;gap:1rem;margin-bottom:1.5rem;flex-wrap:wrap">
        <input type="search" class="search-input" placeholder="Rechercher dans les commentaires..." style="flex:1;padding:0.6rem;background:var(--bg);border:1px solid var(--border);color:var(--ink)">
        <select class="filter" style="padding:0.6rem;background:var(--bg);border:1px solid var(--border);color:var(--muted)">
            <option>Tous les articles</option>
            <option>Excepturi eligendi aliquid...</option>
            <option>Aut repellat ut qui et</option>
            <option>Sed molestiae omnis...</option>
        </select>
        <button class="btn btn-ghost" style="margin-left:auto;background:transparent;border:1px solid var(--border);color:var(--muted);padding:0.5rem 1rem">Tout approuver</button>
    </div>

    <div class="comments-list">
        <div class="comment-row pending" style="background:var(--surface);border:1px solid var(--border);margin-bottom:0.5rem;padding:1rem;display:flex;gap:1rem;flex-wrap:wrap">
            <div class="c-avatar" style="background:#E67E22;color:#fff;width:40px;height:40px;border-radius:50%;display:flex;align-items:center;justify-content:center">WR</div>
            <div style="flex:1">
                <div class="c-meta" style="display:flex;gap:1rem;align-items:center;flex-wrap:wrap;margin-bottom:0.5rem">
                    <span class="c-author" style="font-weight:500">Weldon Walter</span>
                    <span class="badge badge-pending" style="background:rgba(243,156,18,0.15);color:var(--warning);padding:0.2rem 0.5rem;font-size:0.7rem">En attente</span>
                    <span class="c-date" style="color:var(--muted);font-size:0.75rem">17 avr. 2026 à 06:35</span>
                </div>
                <div class="c-article" style="font-size:0.75rem;color:var(--muted);margin-bottom:0.5rem">Sur : <a href="#" style="color:var(--accent)">Sed molestiae omnis ratione ea enim ea</a></div>
                <div class="c-text" style="color:var(--ink);font-size:0.85rem;line-height:1.5">Molestiae modi minus molestiae. Perspiciatis blanditiis libero earum quod eos omnis placeat nesciunt.</div>
            </div>
            <div class="c-actions" style="display:flex;gap:0.5rem;align-items:center">
                <button class="btn btn-success" onclick="openView()" style="background:transparent;border:1px solid var(--success);color:var(--success);padding:0.3rem 0.8rem">Voir</button>
                <button class="btn btn-success" style="background:transparent;border:1px solid var(--success);color:var(--success);padding:0.3rem 0.8rem">✓</button>
                <button class="btn btn-warning" style="background:transparent;border:1px solid var(--warning);color:var(--warning);padding:0.3rem 0.8rem">Spam</button>
                <button class="btn btn-danger" style="background:transparent;border:1px solid #E74C3C;color:#E74C3C;padding:0.3rem 0.8rem">✕</button>
            </div>
        </div>

        <div class="comment-row pending" style="background:var(--surface);border:1px solid var(--border);margin-bottom:0.5rem;padding:1rem;display:flex;gap:1rem;flex-wrap:wrap">
            <div class="c-avatar" style="background:#8E44AD;color:#fff;width:40px;height:40px;border-radius:50%;display:flex;align-items:center;justify-content:center">SF</div>
            <div style="flex:1">
                <div class="c-meta" style="display:flex;gap:1rem;align-items:center;flex-wrap:wrap;margin-bottom:0.5rem">
                    <span class="c-author" style="font-weight:500">Sherman Feeney</span>
                    <span class="badge badge-pending" style="background:rgba(243,156,18,0.15);color:var(--warning);padding:0.2rem 0.5rem;font-size:0.7rem">En attente</span>
                    <span class="c-date" style="color:var(--muted);font-size:0.75rem">17 avr. 2026 à 06:35</span>
                </div>
                <div class="c-article" style="font-size:0.75rem;color:var(--muted);margin-bottom:0.5rem">Sur : <a href="#" style="color:var(--accent)">Sed molestiae omnis ratione ea enim ea</a></div>
                <div class="c-text" style="color:var(--ink);font-size:0.85rem;line-height:1.5">Quis nemo architecto ea rerum iusto nulla. Vel ut soluta ipsum nihil aut natus suscipit explicabo perspiciatis.</div>
            </div>
            <div class="c-actions" style="display:flex;gap:0.5rem;align-items:center">
                <button class="btn btn-success" onclick="openView()" style="background:transparent;border:1px solid var(--success);color:var(--success);padding:0.3rem 0.8rem">Voir</button>
                <button class="btn btn-success" style="background:transparent;border:1px solid var(--success);color:var(--success);padding:0.3rem 0.8rem">✓</button>
                <button class="btn btn-warning" style="background:transparent;border:1px solid var(--warning);color:var(--warning);padding:0.3rem 0.8rem">Spam</button>
                <button class="btn btn-danger" style="background:transparent;border:1px solid #E74C3C;color:#E74C3C;padding:0.3rem 0.8rem">✕</button>
            </div>
        </div>

        <div class="comment-row approved" style="background:var(--surface);border:1px solid var(--border);margin-bottom:0.5rem;padding:1rem;display:flex;gap:1rem;flex-wrap:wrap">
            <div class="c-avatar" style="background:#27AE60;color:#fff;width:40px;height:40px;border-radius:50%;display:flex;align-items:center;justify-content:center">VK</div>
            <div style="flex:1">
                <div class="c-meta" style="display:flex;gap:1rem;align-items:center;flex-wrap:wrap;margin-bottom:0.5rem">
                    <span class="c-author" style="font-weight:500">Veronica Kunze</span>
                    <span class="badge badge-approved" style="background:rgba(39,174,96,0.15);color:var(--success);padding:0.2rem 0.5rem;font-size:0.7rem">Approuvé</span>
                    <span class="c-date" style="color:var(--muted);font-size:0.75rem">17 avr. 2026 à 06:35</span>
                </div>
                <div class="c-article" style="font-size:0.75rem;color:var(--muted);margin-bottom:0.5rem">Sur : <a href="#" style="color:var(--accent)">Sed molestiae omnis ratione ea enim ea</a></div>
                <div class="c-text" style="color:var(--ink);font-size:0.85rem;line-height:1.5">Iure atque aspernatur aliquid dolor id. Officiis expedita pariatur aperiam commodi eligendi.</div>
            </div>
            <div class="c-actions" style="display:flex;gap:0.5rem;align-items:center">
                <button class="btn btn-success" onclick="openView()" style="background:transparent;border:1px solid var(--success);color:var(--success);padding:0.3rem 0.8rem">Voir</button>
                <button class="btn btn-warning" style="background:transparent;border:1px solid var(--warning);color:var(--warning);padding:0.3rem 0.8rem">Spam</button>
                <button class="btn btn-danger" style="background:transparent;border:1px solid #E74C3C;color:#E74C3C;padding:0.3rem 0.8rem">✕</button>
            </div>
        </div>
    </div>

    <div class="pagination" style="display:flex;gap:0.5rem;margin-top:1.5rem;justify-content:center">
        <button class="page-btn active" style="background:var(--accent);color:#fff;border:none;width:36px;height:36px">1</button>
        <button class="page-btn" style="background:var(--surface);border:1px solid var(--border);color:var(--muted);width:36px;height:36px">2</button>
        <button class="page-btn" style="background:var(--surface);border:1px solid var(--border);color:var(--muted);width:36px;height:36px">3</button>
        <button class="page-btn" style="background:var(--surface);border:1px solid var(--border);color:var(--muted);width:36px;height:36px">→</button>
    </div>

    <!-- VIEW MODAL -->
    <div class="modal-overlay" id="viewModal" style="display:none;position:fixed;top:0;left:0;right:0;bottom:0;background:rgba(0,0,0,0.8);z-index:1000;align-items:center;justify-content:center">
        <div class="modal" style="background:var(--surface);border:1px solid var(--border);width:500px;max-width:90%;border-radius:4px">
            <div class="modal-header" style="padding:1rem;border-bottom:1px solid var(--border);display:flex;justify-content:space-between;align-items:center">
                <div class="modal-title" style="font-weight:500">Détail du commentaire</div>
                <button class="modal-close" onclick="document.getElementById('viewModal').style.display='none'" style="background:none;border:none;color:var(--muted);font-size:1.2rem">✕</button>
            </div>
            <div class="modal-body" style="padding:1rem">
                <div style="margin-bottom:1rem">
                    <div style="margin-bottom:0.5rem"><strong>Auteur :</strong> Weldon Walter</div>
                    <div style="margin-bottom:0.5rem"><strong>Email :</strong> luciano.sporer@example.net</div>
                    <div style="margin-bottom:0.5rem"><strong>Statut :</strong> <span class="badge badge-pending" style="background:rgba(243,156,18,0.15);color:var(--warning);padding:0.2rem 0.5rem">En attente</span></div>
                </div>
                <div class="form-group">
                    <label class="form-label">Contenu du commentaire</label>
                    <textarea class="form-control" style="width:100%;padding:0.6rem;background:var(--bg);border:1px solid var(--border);color:var(--ink);min-height:100px">Molestiae modi minus molestiae. Perspiciatis blanditiis libero earum quod eos omnis placeat nesciunt ut ut.</textarea>
                </div>
            </div>
            <div class="modal-footer" style="padding:1rem;border-top:1px solid var(--border);display:flex;justify-content:flex-end;gap:0.5rem">
                <button class="btn btn-ghost" onclick="document.getElementById('viewModal').style.display='none'" style="background:transparent;border:1px solid var(--border);color:var(--muted);padding:0.4rem 1rem">Fermer</button>
                <button class="btn btn-primary" style="background:var(--accent);border:none;color:#fff;padding:0.4rem 1rem">Approuver</button>
            </div>
        </div>
    </div>

    <script>
        function openView() {
            document.getElementById('viewModal').style.display = 'flex';
        }
        document.querySelectorAll('.tab').forEach(t => t.addEventListener('click', function() {
            document.querySelectorAll('.tab').forEach(x => x.classList.remove('active'));
            this.classList.add('active');
        }));
    </script>
@endsection