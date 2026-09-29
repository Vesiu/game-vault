CREATE DATABASE IF NOT EXISTS game_vault CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE game_vault;

CREATE TABLE IF NOT EXISTS genres (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS games (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    description TEXT,
    release_date DATE,
    rating DECIMAL(3,1),
    cover_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS game_genre (
    game_id INT NOT NULL,
    genre_id INT NOT NULL,
    PRIMARY KEY (game_id, genre_id),
    FOREIGN KEY (game_id) REFERENCES games(id) ON DELETE CASCADE,
    FOREIGN KEY (genre_id) REFERENCES genres(id) ON DELETE CASCADE
) ENGINE=InnoDB;

INSERT INTO genres (name) VALUES 
('Action'), ('RPG'), ('Aventure'), ('Sci-Fi'), ('Plateforme');

INSERT INTO games (title, description, release_date, rating, cover_url) VALUES 
('The Witcher 3: Wild Hunt', 'Un jeu de rôle en monde ouvert dans un univers dark fantasy.', '2015-05-19', 9.8, 'https://images.unsplash.com/photo-1550745165-9bc0b252726f?w=600'),
('Cyberpunk 2077', 'Aventure en monde ouvert dans la mégalopole futuriste de Night City.', '2020-12-10', 8.6, 'https://images.unsplash.com/photo-1542751371-adc38448a05e?w=600'),
('Hollow Knight', 'Metroidvania 2D dans les ruines mystérieuses d Hallownest.', '2017-02-24', 9.4, 'https://images.unsplash.com/photo-1511512578047-dfb367046420?w=600');

INSERT INTO game_genre (game_id, genre_id) VALUES 
(1, 2), (1, 3),
(2, 1), (2, 4),
(3, 1), (3, 5);