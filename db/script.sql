CREATE DATABASE IF NOT EXISTS `forall` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `forall`;

CREATE TABLE IF NOT EXISTS `plano` (
  `id` INT(1) NOT NULL AUTO_INCREMENT,
  `valor_plano` float NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `imagem` varchar(40),
  `botao` varchar(15),
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `cliente` (
  `id` INT(5) NOT NULL AUTO_INCREMENT,
  `id_plano` INT(1),
  `nome` varchar(40) NOT NULL,
  `cpf` char(11) NOT NULL,
  `idade` int(3) NOT NULL,
  `telefone` VARCHAR(13) NOT NULL, -- 5519999123456
  `email` varchar(50) NOT NULL,
  `senha` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (id_plano) REFERENCES plano(id)
);

CREATE TABLE IF NOT EXISTS `pagamento` (
  `id_pgto` int(11) NOT NULL AUTO_INCREMENT,
  `id_plano` INT(1),
  `id_cliente` INT(5),
  `valor_pgto` DECIMAL(10,2) NOT NULL,
  `data_compra` date NOT NULL,
  PRIMARY KEY (`id_pgto`),
  FOREIGN KEY (id_plano) REFERENCES plano(id),
  FOREIGN KEY (id_cliente) REFERENCES cliente(id)
);

CREATE TABLE IF NOT EXISTS `perfil` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` INT(5) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `pontuacao` int(50) NOT NULL,
  PRIMARY KEY (`id_perfil`),
  FOREIGN KEY (id_cliente) REFERENCES cliente(id)
  );
  
  
  
  
-- Copiando estrutura para procedure bancodedados.registry
DELIMITER //
CREATE PROCEDURE `registry`(IN regnome VARCHAR(40),IN regcpf char(12),IN regidade INT(3),in regtelefone CHAR(12),IN regemail varchar(50),IN regsenha VARCHAR(20))
BEGIN
	INSERT INTO cliente (nome,cpf,idade,telefone,email,senha) 
	VALUES (regnome,regcpf,regidade,regtelefone,regemail,regsenha);
	END//
DELIMITER ;


-- VERIFICA LOGIN - EM VEZ DE CHAMAR A SELECT NO PHP, CHAMA A PROCEDURE
DELIMITER // 
CREATE PROCEDURE `sign_in`(IN email_usuario VARCHAR(40), IN senha_usuario VARCHAR(20))
BEGIN

	SELECT email, senha FROM cliente WHERE email = email_usuario && senha = senha_usuario;
	
	END//
DELIMITER ;
	
-- INSERT DE PAGAMENTOS 
DELIMITER //
CREATE PROCEDURE `reg_pagamento`(IN regvalor_pgto DECIMAL(10,2),IN regdata_compra DATE)
BEGIN
	INSERT INTO pagamento (valor_pgto, data_compra) 
	VALUES (regvalor_pgto,reg_data_compra);
	END//
DELIMITER ;

-- INSERT PERFIS
DELIMITER //
CREATE PROCEDURE `reg_perfil`(IN regnome VARCHAR(50),IN regpontuacao INT)
BEGIN
	INSERT INTO perfis (nome, pontuacao) 
	VALUES (regnome, regpontuacao);
	END//
DELIMITER ;

-- SELECT PERFIL

/* PROCEDURE  ////////////////////////////// */
delimiter $$
CREATE or replace PROCEDURE perfil_aluno(IN busca VARCHAR(50))
BEGIN
SELECT nome, pontuacao FROM perfis WHERE nome LIKE busca;
END $$
delimiter ;

-- /*TRIGGER PLANO PAGO  ////////////////////////////// */
-- delimiter $$
-- CREATE OR REPLACE TRIGGER status_plano_pago AFTER insert ON plano
-- FOR EACH row
-- BEGIN
-- DECLARE valor INT;

-- UPDATE plano SET tipo = 'Pago', valor_plano = 99.90 WHERE idplano = valor;

-- END $$
-- delimiter ;

/*TRIGGER PLANO GRATIS  ////////////////////////////// */
-- delimiter $$
-- CREATE OR REPLACE TRIGGER status_plano_gratis BEFORE insert ON plano
-- FOR EACH row
-- BEGIN
-- DECLARE valor INT;

-- UPDATE plano SET tipo = 'Gr??tis', valor_plano = 0 WHERE idplano = valor;

-- END $$
-- delimiter ;

/*view do cliente  ////////////////////////////// */
CREATE or replace VIEW vw_cliente AS
SELECT c.nome,c.idade,p.pontuacao
FROM cliente c 
INNER JOIN perfil p
WHERE c.nome 
LIKE c.nome;

INSERT INTO plano(valor_plano, tipo, imagem, botao) VALUES
(00.00, "Gratuito", "/p1.png", "Continuar"),
(14.99, "Intermedi??rio", "/p2.png", "Assinar"),
(36.99, "Avan??ado", "/p3.png", "Assinar")

INSERT INTO cliente VALUES
(1, 1, 'Bruno', 12345678912, 19, 5519999999999, 'bruno@email.com', 'e0f68134d29dc326d115de4c8fab8700a3c4b002'),
(2, 2, 'Vitor', 12343631942, 18, 5519977777777, 'vitor@email.com', 'c65d402856c41442bdc375db3d7d80c636e1132b'),
(3, 3, 'Thain??', 32164878904, 26, 5519922222222, 'thaina@email.com', 'e67aa6a0da0dc3fb97137a9717663c4a6ffeff4c')

INSERT INTO pagamento VALUES 
(1, 2, 2, 14.99, '2022-12-12'),
(2, 3, 3, 36.99, '2022-12-11')

INSERT INTO perfil VALUES
(1, 1, 'Enzo', 190),
(2, 1, 'Gabriel', 195),
(3, 2, 'Pietro', 189),
(4, 2, 'Valentina', 193),
(5, 3, 'Aquila', 176),
(6, 3, 'Priscila', 200)