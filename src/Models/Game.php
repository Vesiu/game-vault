<?php
require_once __DIR__ . '/../../config/database.php';

class Game {
    public static function getAll(): array {
        $pdo = Database::getConnection();
        $sql = "
            SELECT g.*, GROUP_CONCAT(ge.name SEPARATOR ', ') AS genres
            FROM games g
            LEFT JOIN game_genre gg ON g.id = gg.game_id
            LEFT JOIN genres ge ON gg.genre_id = ge.id
            GROUP BY g.id
            ORDER BY g.rating DESC
        ";
        return $pdo->query($sql)->fetchAll();
    }
}