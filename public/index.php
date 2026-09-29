<?php
require_once __DIR__ . '/../src/Models/Game.php';

$games = Game::getAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameVault — Catalogue</title>
    <style>
        body { font-family: system-ui, sans-serif; background: #0f172a; color: #f8fafc; padding: 2rem; margin: 0; }
        h1 { text-align: center; }
        .grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 1.5rem; max-width: 1200px; margin: 2rem auto; }
        .card { background: #1e293b; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.3); }
        .card img { width: 100%; height: 160px; object-fit: cover; }
        .card-body { padding: 1rem; }
        .badge { background: #3b82f6; color: white; padding: 0.2rem 0.5rem; border-radius: 4px; font-size: 0.8rem; }
        .rating { color: #f59e0b; font-weight: bold; }
    </style>
</head>
<body>
    <h1>🎮 GameVault</h1>
    <div class="grid">
        <?php foreach ($games as $game): ?>
            <article class="card">
                <img src="<?= htmlspecialchars($game['cover_url']) ?>" alt="<?= htmlspecialchars($game['title']) ?>">
                <div class="card-body">
                    <h3><?= htmlspecialchars($game['title']) ?></h3>
                    <p class="rating">★ <?= htmlspecialchars($game['rating']) ?> / 10</p>
                    <p><span class="badge"><?= htmlspecialchars($game['genres'] ?? 'Non classé') ?></span></p>
                    <p><?= htmlspecialchars($game['description']) ?></p>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</body>
</html>