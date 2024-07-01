
CREATE DATABASE TechDrive;
USE TechDrive;

CREATE TABLE Administrador(
id_adm INT AUTO_INCREMENT,
nome VARCHAR(50) NOT NULL,
senha VARCHAR(50) NOT NULL,
PRIMARY KEY(id_adm)
) ENGINE=InnoDB;

-- A tabela Cliente armazena informações sobre os clientes que trazem seus veículos para manutenção. 
-- Cada cliente tem um identificador único, nome, telefone, CPF e endereço.
CREATE TABLE Cliente(
id_cliente INT AUTO_INCREMENT,
nome VARCHAR(50) NOT NULL,
telefone VARCHAR(15) NOT NULL,
cpf VARCHAR(14) UNIQUE,
endereco VARCHAR(100) NOT NULL,
numero varchar(100) NOT NULL,
PRIMARY KEY(id_cliente)
) ENGINE=InnoDB;

-- A tabela Veiculo armazena informações sobre os veículos que estão sendo atendidos. 
-- Cada veículo tem um identificador único, modelo, ano de fabricação, cor e placa.
CREATE TABLE Veiculo(
id_veiculo INT AUTO_INCREMENT,
modelo VARCHAR(50) NOT NULL,
marca varchar(50) NOT NULL,
ano YEAR NOT NULL,
cor VARCHAR(20) NOT NULL,
placa VARCHAR(7) UNIQUE,
PRIMARY KEY(id_veiculo)
) ENGINE=InnoDB;

-- A tabela Ordem_servico armazena informações sobre as ordens de serviço. 
-- Cada ordem de serviço tem um identificador único, nome, descrição, data de entrada, preço, status, 
-- e referências para o cliente, administrador e veículo associados.
CREATE TABLE Ordem_servico(
id_ordem_servico INT AUTO_INCREMENT,
descricao TEXT NOT NULL,
data_entrada DATE NOT NULL,
preco DECIMAL(10,2),
status ENUM('Aberto', 'Em Progresso', 'Concluído') DEFAULT 'Aberto',
id_cliente INT,
id_adm INT,
id_veiculo INT,
PRIMARY KEY(id_ordem_servico),
FOREIGN KEY(id_cliente) REFERENCES Cliente(id_cliente) ON DELETE CASCADE,
FOREIGN KEY(id_adm) REFERENCES Administrador(id_adm) ON DELETE SET NULL,
FOREIGN KEY(id_veiculo) REFERENCES Veiculo(id_veiculo) ON DELETE CASCADE
) ENGINE=InnoDB;

-- A tabela Estoque armazena informações sobre os produtos em estoque. 
-- Cada produto tem um identificador único, nome, quantidade em estoque, descrição e preço.
CREATE TABLE Estoque(
id_produto INT AUTO_INCREMENT,
nome_produto VARCHAR(50) NOT NULL,
quantidade INT CHECK (quantidade >= 0),
descricao TEXT NOT NULL,
preco DECIMAL(10,2) CHECK (preco >= 0),
PRIMARY KEY(id_produto)
) ENGINE=InnoDB;

-- A tabela Relatorio armazena informações sobre os relatórios gerados. 
-- Cada relatório tem um identificador único, data do relatório, descrição, 
-- e referências para o administrador, cliente e ordem de serviço associados.
CREATE TABLE Relatorio(
id_relatorio INT AUTO_INCREMENT,
id_adm INT,
id_cliente INT,
id_ordem_servico INT,
data_relatorio DATE NOT NULL,
descricao TEXT,
PRIMARY KEY(id_relatorio),
FOREIGN KEY(id_adm) REFERENCES Administrador(id_adm) ON DELETE SET NULL,
FOREIGN KEY(id_cliente) REFERENCES Cliente(id_cliente) ON DELETE CASCADE,
FOREIGN KEY(id_ordem_servico) REFERENCES Ordem_servico(id_ordem_servico) ON DELETE CASCADE
) ENGINE=InnoDB;

-- A tabela Faturamento armazena informações sobre as faturas geradas. 
-- Cada fatura tem um identificador único, data da fatura, valor total, status, 
-- e referências para o cliente e a ordem de serviço associados.
CREATE TABLE Faturamento(
id_fatura INT AUTO_INCREMENT,
id_cliente INT,
id_ordem_servico INT,
data_fatura DATE NOT NULL,
valor_total DECIMAL(10,2) NOT NULL CHECK (valor_total >= 0),
status ENUM('Pago', 'Pendente', 'Atrasado') DEFAULT 'Pendente',
PRIMARY KEY(id_fatura),
FOREIGN KEY(id_cliente) REFERENCES Cliente(id_cliente) ON DELETE CASCADE,
FOREIGN KEY(id_ordem_servico) REFERENCES Ordem_servico(id_ordem_servico) ON DELETE CASCADE
) ENGINE=InnoDB;

-- A tabela LucroDiario armazena informações sobre o lucro obtido diariamente. 
-- Cada entrada tem um identificador único, data e lucro.
CREATE TABLE Lucro_Diario(
id INT AUTO_INCREMENT,
data DATE NOT NULL,
lucro DECIMAL(10,2) NOT NULL CHECK (lucro >= 0),
PRIMARY KEY(id)
) ENGINE=InnoDB;


-- Este índice é criado para melhorar o desempenho das consultas que filtram pelo campo data na tabela Lucro_Diario.
CREATE INDEX idx_data_lucro ON Lucro_Diario(data);

-- Este gatilho é acionado após a atualização na tabela Ordem_servico.
-- Se o status de uma ordem de serviço for alterado para 'Concluído',
-- este gatilho adiciona o preço da ordem de serviço ao lucro do dia na tabela Lucro_Diario.
DELIMITER //
CREATE TRIGGER atualizar_lucro
AFTER UPDATE ON Ordem_servico
FOR EACH ROW
BEGIN
   IF NEW.status = 'Concluído' THEN
      INSERT INTO LucroDiario(data, lucro)
      VALUES(CURDATE(), NEW.preco)
      ON DUPLICATE KEY UPDATE lucro = lucro + NEW.preco;
   END IF;
END; //
DELIMITER ;

SELECT * FROM Administrador;
SELECT * FROM Cliente;
SELECT * FROM Veiculo;
SELECT * FROM Ordem_servico;
SELECT * FROM Estoque;
SELECT * FROM Relatorio;
SELECT * FROM Faturamento;
SELECT * FROM LucroDiario;

-- Consultas simples

-- Obter todas as ordens de serviço para um cliente específico:
SELECT * FROM Ordem_servico WHERE id_cliente = 1; -- substituir o id_cliente para pesquisa

-- Obter o total de lucro obtido em um dia específico:
SELECT lucro FROM LucroDiario WHERE data = '[Data]';

-- Obter todas as ordens de serviço que estão em progresso:
SELECT * FROM Ordem_servico WHERE status = 'Em Progresso';

-- Obter o estoque de um produto específico:
SELECT quantidade FROM Estoque WHERE nome_produto = '[Nome do Produto]';

-- Obter todas as faturas que estão pendentes:
SELECT * FROM Faturamento WHERE status = 'Pendente';
