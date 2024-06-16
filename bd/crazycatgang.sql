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

-- Copiando estrutura para tabela crazycatgang.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` text NOT NULL,
  `data_nascimento` date NOT NULL,
  `email` text NOT NULL,
  `celular` text NOT NULL,
  `cpf` text NOT NULL,
  `@` text DEFAULT NULL,
  `senha` text NOT NULL,
  `estudante` int(11) DEFAULT 0,
  `escolaridade` text DEFAULT NULL,
  `curso_graduacao` text DEFAULT NULL,
  `periodo_graduacao` text DEFAULT NULL,
  `area_atuacao` text DEFAULT NULL,
  `funcoes` text DEFAULT NULL,
  `funcoes_interesse` text DEFAULT NULL,
  `caronas_disponibilidade` text DEFAULT NULL,
  `razao` text DEFAULT NULL,
  `certificado` int(11) DEFAULT NULL,
  `disponibilidade` text DEFAULT NULL,
  `observacao` text DEFAULT NULL,
  `newsletter` int(11) DEFAULT 0,
  `amor` text DEFAULT NULL,
  `mora_em` text DEFAULT NULL,
  `pets` text DEFAULT NULL,
  `pets_quais` text DEFAULT NULL,
  `pets_vacinas` text DEFAULT NULL,
  `pets_testados` text DEFAULT NULL,
  `pets_castrados` text DEFAULT NULL,
  `bairro` text DEFAULT NULL,
  `endereco` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela crazycatgang.user: ~0 rows (aproximadamente)
DELETE FROM `user`;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
