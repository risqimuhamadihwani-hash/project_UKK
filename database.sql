CREATE DATABASE IF NOT EXISTS penjualan_toko
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE penjualan_toko;

CREATE TABLE IF NOT EXISTS users (
    id_user INT(11) NOT NULL AUTO_INCREMENT,
    nama VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(20) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id_user)
) ENGINE=InnoDB;

-- Akun awal untuk pengujian:
-- Username: admin
-- Password: admin123
INSERT INTO users (nama, username, password, role)
VALUES (
    'Administrator',
    'admin',
    '$2y$12$wSzuJ/j8jUxmpSKbtJR9TucKM9cJ.MOzXyu9HH.VxeBkjIgXHT7nC',
    'Admin'
)
ON DUPLICATE KEY UPDATE username = username;
