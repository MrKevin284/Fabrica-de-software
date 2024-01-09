create database oficina;

use oficina;

create table login(
id INT AUTO_INCREMENT PRIMARY KEY,
login varchar(250),
senha varchar(250)
);
CREATE TABLE clientes (
    idcliente INT PRIMARY KEY auto_increment not null,
    nome VARCHAR(255),
    telefone VARCHAR(15),
    cpf VARCHAR(11)
);
CREATE TABLE ordensservico (
    idordem INT PRIMARY KEY auto_increment not null,
    idcliente INT,
    modelo varchar(50),
    marca varchar(50),
    ano int(4),
    cor varchar(25),
    placa varchar(7),
    dtentrada date,
    descricao varchar(500),
    custo DECIMAL(10,2),
    status ENUM('concluido', 'pendente') NOT NULL DEFAULT 'pendente',
    FOREIGN KEY (idcliente) REFERENCES clientes(idcliente)
);
CREATE TABLE estoque (
    idproduto INT PRIMARY KEY auto_increment not null,
    nomeproduto VARCHAR(255),
    quantidade INT,
    descricao varchar(500)
);
