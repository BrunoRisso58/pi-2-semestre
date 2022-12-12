CREATE DATABASE IF NOT EXISTS `bancodedados` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `bancodedados`;


CREATE TABLE IF NOT EXISTS `plano` (
  `id` INT(1) NOT NULL AUTO_INCREMENT,
  `valor_plano` float NOT NULL,
  `tipo` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `cliente` (
  `id` INT(5) NOT NULL AUTO_INCREMENT,
  `idPlano` INT(1),
  `nome` varchar(40) NOT NULL,
  `CPF` char(11) NOT NULL,
  `idade` int(3) NOT NULL,
  `telefone` VARCHAR(13) NOT NULL, -- 5519999968543
  `email` varchar(50) NOT NULL,
  `senha` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (idPlano) REFERENCES plano(id)
);

CREATE TABLE IF NOT EXISTS `pagamento` (
  `id_pgto` int(11) NOT NULL AUTO_INCREMENT,
  `idPlano` INT(1),
  `idCliente` INT(5),
  `valor_pgto` DECIMAL(10,2) NOT NULL,
  `data_compra` date NOT NULL,
  PRIMARY KEY (`id_pgto`),
  FOREIGN KEY (idPlano) REFERENCES plano(id),
  FOREIGN KEY (idCliente) REFERENCES cliente(id)
);

CREATE TABLE IF NOT EXISTS `perfis` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(5) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `pontuacao` int(50) NOT NULL,
  PRIMARY KEY (`id_perfil`),
  FOREIGN KEY (id_cliente) REFERENCES cliente(id)
);
  
-- Copiando estrutura para procedure bancodedados.registry
DELIMITER //
CREATE OR REPLACE PROCEDURE `registry`(IN regnome VARCHAR(40),IN regcpf char(12),IN regidade INT(3),in regtelefone CHAR(12),IN regemail varchar(50),IN regsenha VARCHAR(20))
BEGIN
	INSERT INTO cliente (nome,cpf,idade,telefone,email,senha) 
	VALUES (regnome,regcpf,regidade,regtelefone,regemail,regsenha);
	END//
DELIMITER ;

-- VERIFICA LOGIN - EM VEZ DE CHAMAR A SELECT NO PHP, CHAMA A PROCEDURE
DELIMITER // 
CREATE OR REPLACE PROCEDURE `sign_in`(IN emailUsuario VARCHAR(40), IN senhaUsuario VARCHAR(20))
BEGIN

	SELECT email, senha FROM cliente WHERE email = emailUsuario && senha = senhaUsuario;
	
	END//
DELIMITER ;


/* O QUE AINDA FALTA: 
TRIGGER: quando cria o perfil seta como plano gratuito

PROCEDURE PERFIL ALUNO: select * da tabela perfil

VIEW PARA dados do perfil: procurar como pegar os dados da view e colocar no front
*/ 
