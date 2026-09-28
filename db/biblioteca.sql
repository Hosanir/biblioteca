CREATE DATABASE IF NOT EXISTS biblioteca;

USE biblioteca;

CREATE TABLE IF NOT EXISTS categoria (
    id_categoria INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS livro (
    id_livro INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(255) NOT NULL,
    ano_pub VARCHAR(4),
    autor VARCHAR(255),
    resumo TEXT,
    capa VARCHAR(255),
    id_categoria INT,
    FOREIGN KEY (id_categoria) REFERENCES categoria (id_categoria) ON DELETE SET NULL
);

CREATE TABLE IF NOT EXISTS usuario (
    id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    foto VARCHAR(255)
);

-- seeds
INSERT INTO categoria (nome) VALUES ("Romance"), ("Terror"), ("Fantasia");

INSERT INTO livro (titulo, ano_pub, autor, resumo, id_categoria) VALUES ("Orgulho e Preconceito", "1813", "Jane Austen", "Lorem Ipsum", 1), ("It: A Coisa", "1986", "Stephen King", "Lorem Ipsum", 2), ("Harry Potter e a Pedra Filosofal", "1997", "J.K. Rowling", "Lorem Ipsum", 3);


