-- Active: 1759406026980@@172.17.0.2@3306@crud_db
CREATE TABLE IF NOT EXISTS `student` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL,
    `address` VARCHAR(255) NOT NULL,
    `marks` INT NOT NULL,
    PRIMARY KEY (`id`)
);

INSERT INTO
    `student` (
        `name`,
        `address`,
        `nationality`,
        `marks`
    )
VALUES (
        'Ana Silva',
        'Rua das Flores, 123',
        'Brasileira',
        85
    ),
    (
        'Carlos Souza',
        'Av. Paulista, 456',
        'Brasileiro',
        90
    ),
    (
        'Maria Oliveira',
        'Rua Verde, 789',
        'Portuguesa',
        78
    ),
    (
        'João Pereira',
        'Rua Azul, 321',
        'Brasileiro',
        88
    ),
    (
        'Fernanda Lima',
        'Av. Central, 654',
        'Brasileira',
        92
    ),
    (
        'Pedro Santos',
        'Rua Amarela, 987',
        'Brasileiro',
        80
    ),
    (
        'Lucas Costa',
        'Av. Norte, 159',
        'Brasileiro',
        75
    ),
    (
        'Juliana Alves',
        'Rua Sul, 753',
        'Brasileira',
        95
    ),
    (
        'Rafael Martins',
        'Av. Leste, 852',
        'Brasileiro',
        83
    ),
    (
        'Beatriz Ramos',
        'Rua Oeste, 951',
        'Brasileira',
        89
    );
