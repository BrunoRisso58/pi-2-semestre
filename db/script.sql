CREATE DATABASE IF NOT EXISTS `forall` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `forall`;

CREATE TABLE IF NOT EXISTS `plano` (
  `id` INT(1) NOT NULL AUTO_INCREMENT,
  `valor_plano` float NOT NULL,
  `tipo` varchar(15) NOT NULL,
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

/*TRIGGER PLANO PAGO  ////////////////////////////// */
delimiter $$
CREATE OR REPLACE TRIGGER status_plano_pago AFTER insert ON plano
FOR EACH row
BEGIN
DECLARE valor INT;

UPDATE plano SET tipo = 'Pago', valor_plano = 99.90 WHERE idplano = valor;

END $$
delimiter ;

/*TRIGGER PLANO GRATIS  ////////////////////////////// */
delimiter $$
CREATE OR REPLACE TRIGGER status_plano_gratis BEFORE insert ON plano
FOR EACH row
BEGIN
DECLARE valor INT;

UPDATE plano SET tipo = 'Grátis', valor_plano = 0 WHERE idplano = valor;

END $$
delimiter ;

/*view do cliente  ////////////////////////////// */
CREATE or replace VIEW vw_cliente AS
SELECT c.nome,c.idade,p.pontuacao
FROM cliente c 
INNER JOIN perfil p
WHERE c.nome 
LIKE c.nome;