CREATE DATABASE doacoes;

USE doacoes;

CREATE TABLE administrador (
  id_admin INT PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  senha VARCHAR(255) NOT NULL
);

CREATE TABLE doador (
  id_doador INT PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  telefone VARCHAR(20),
  endereco VARCHAR(200)
);

CREATE TABLE campanha (
  id_campanha INT PRIMARY KEY AUTO_INCREMENT,
  titulo VARCHAR(100) NOT NULL,
  descricao TEXT,
  data_inicio DATE,
  data_fim DATE,
  id_admin INT,
  FOREIGN KEY (id_admin) REFERENCES administrador(id_admin)
);

CREATE TABLE doacao (
  id_doacao INT PRIMARY KEY AUTO_INCREMENT,
  data_doacao DATE NOT NULL,
  item VARCHAR(100) NOT NULL,
  quantidade INT,
  validade DATE,
  id_doador INT,
  id_campanha INT,
  FOREIGN KEY (id_doador) REFERENCES doador(id_doador),
  FOREIGN KEY (id_campanha) REFERENCES campanha(id_campanha)
);