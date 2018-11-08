-- --------------------------------------------------------
-- Servidor:                     localhost
-- Versão do servidor:           10.2.14-MariaDB-log - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura para tabela gitlab.commits
DROP TABLE IF EXISTS `commits`;
CREATE TABLE IF NOT EXISTS `commits` (
  `com_codigo` varchar(100) NOT NULL COMMENT 'ID do commit',
  `pro_codigo` int(11) NOT NULL COMMENT 'Codigo do projeto',
  `dev_email` varchar(200) NOT NULL COMMENT 'E-mail do dev',
  `com_title` text DEFAULT NULL COMMENT 'Titulo do commit',
  `com_message` text DEFAULT NULL COMMENT 'Messagem do commit',
  `com_data` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Data do commit',
  `com_additions` int(11) DEFAULT NULL COMMENT 'Linhas adicionadas no commit',
  `com_deletions` int(11) DEFAULT NULL COMMENT 'Linhas deletadas no commit',
  `com_total` int(11) DEFAULT NULL COMMENT 'Soma de linhas adicionadas e deletadas',
  PRIMARY KEY (`com_codigo`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela gitlab.configuracao
DROP TABLE IF EXISTS `configuracao`;
CREATE TABLE IF NOT EXISTS `configuracao` (
  `conf_codigo` int(11) NOT NULL,
  `conf_tempo_projeto` int(11) NOT NULL,
  `conf_tempo_sync` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela gitlab.devs
DROP TABLE IF EXISTS `devs`;
CREATE TABLE IF NOT EXISTS `devs` (
  `dev_email` varchar(200) NOT NULL COMMENT 'E-mail do dev',
  `dev_name` varchar(200) NOT NULL COMMENT 'Nome do dev',
  `dev_avatar` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`dev_email`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela gitlab.projects
DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `pro_codigo` int(11) NOT NULL COMMENT 'ID do projeto',
  `pro_name` varchar(200) NOT NULL COMMENT 'Nome do projeto',
  `pro_visibility` varchar(50) NOT NULL COMMENT 'Se o projeto é publico ou privado',
  `pro_data` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Data de criação do projeto',
  `pro_ativo` char(1) DEFAULT 'N' COMMENT 'S = Ativo\r\nN = Não Ativo',
  `pro_peso` double DEFAULT 1,
  PRIMARY KEY (`pro_codigo`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
