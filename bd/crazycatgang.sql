-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.25-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para crazycatgang
CREATE DATABASE IF NOT EXISTS `crazycatgang` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `crazycatgang`;

-- Copiando estrutura para tabela crazycatgang.gato
CREATE TABLE IF NOT EXISTS `gato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` text NOT NULL,
  `descricao` text NOT NULL,
  `foto` text DEFAULT NULL,
  `castrado` int(11) NOT NULL DEFAULT 0,
  `alocado_clinica` int(11) DEFAULT 0,
  `doacao` int(11) DEFAULT 0,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela crazycatgang.gato: ~4 rows (aproximadamente)
DELETE FROM `gato`;

-- Copiando estrutura para tabela crazycatgang.resgate
CREATE TABLE IF NOT EXISTS `resgate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` timestamp NULL DEFAULT current_timestamp(),
  `nome` text DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `endereco` text DEFAULT NULL,
  `resgate_status` int(11) DEFAULT 0,
  `foto` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela crazycatgang.resgate: ~3 rows (aproximadamente)
DELETE FROM `resgate`;

-- Copiando estrutura para tabela crazycatgang.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `registrado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nome` text NOT NULL,
  `data_nascimento` date NOT NULL,
  `email` text NOT NULL,
  `celular` text NOT NULL,
  `cpf` text NOT NULL,
  `insta` text DEFAULT NULL,
  `senha` text DEFAULT NULL,
  `tipo` text NOT NULL,
  `estudante` int(11) DEFAULT 0,
  `escolaridade` text DEFAULT NULL,
  `curso_graduacao` text DEFAULT NULL,
  `periodo_graduacao` text DEFAULT NULL,
  `area_atuacao` text DEFAULT NULL,
  `funcoes` text DEFAULT NULL,
  `funcoes_interesse` text DEFAULT NULL,
  `carona_disponibilidade` text DEFAULT NULL,
  `razao` text DEFAULT NULL,
  `certificado` int(11) DEFAULT NULL,
  `disponibilidade` text DEFAULT NULL,
  `observacao` text DEFAULT NULL,
  `amor` text DEFAULT NULL,
  `newsletter` int(11) DEFAULT 0,
  `mora_em` text DEFAULT NULL,
  `pets` int(11) DEFAULT 0,
  `pets_quais` text DEFAULT NULL,
  `pets_vacinas` text DEFAULT NULL,
  `pets_testados` text DEFAULT NULL,
  `pets_castrados` text DEFAULT NULL,
  `bairro` text DEFAULT NULL,
  `endereco` text DEFAULT NULL,
  `user_status` varchar(50) NOT NULL DEFAULT 'Em análise',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela crazycatgang.user: ~5 rows (aproximadamente)
DELETE FROM `user`;
INSERT INTO `user` (`id`, `registrado`, `nome`, `data_nascimento`, `email`, `celular`, `cpf`, `insta`, `senha`, `tipo`, `estudante`, `escolaridade`, `curso_graduacao`, `periodo_graduacao`, `area_atuacao`, `funcoes`, `funcoes_interesse`, `carona_disponibilidade`, `razao`, `certificado`, `disponibilidade`, `observacao`, `amor`, `newsletter`, `mora_em`, `pets`, `pets_quais`, `pets_vacinas`, `pets_testados`, `pets_castrados`, `bairro`, `endereco`, `user_status`) VALUES
	(16, '2024-06-17 11:18:31', 'ADM', '1231-03-12', 'adm@gmail.com', '(13) 99648-6934', '123.123.123-31', '@vicruk_edits', '6c46f8e09b95837be28ef00ef721827a', 'Administrativo', 1, 'Ensino fundamental completo', 'Ciência da Computação', '1º', 'TI', 'Carona,Participação somente no dia do evento,Fotografia,Edição gráfica,Edição de vídeos,Programação e desenvolvimento de site,Produção de conteúdo,Administrativo', 'Edição de Vídeos', NULL, 'Porque eu gosto', 1, 'Toda hora', 'Nenhuma', 'Felícia é meu segundo nome', 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'Aprovado');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
