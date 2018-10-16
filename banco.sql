CREATE TABLE `projects` (
  `pro_codigo` INTEGER(11) NOT NULL COMMENT 'ID do projeto',
  `pro_name` VARCHAR(200) COLLATE utf8_general_ci NOT NULL COMMENT 'Nome do projeto',
  `pro_visibility` VARCHAR(50) COLLATE utf8_general_ci NOT NULL COMMENT 'Se o projeto é publico ou privado',
  `pro_data` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Data de criação do projeto',
  `pro_ativo` CHAR(1) COLLATE utf8_general_ci DEFAULT 'N' COMMENT 'S = Ativo\r\nN = Não Ativo',
PRIMARY KEY USING BTREE (`pro_codigo`)
) ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci';

CREATE TABLE `devs` (
  `dev_email` VARCHAR(200) COLLATE utf8_general_ci NOT NULL COMMENT 'E-mail do dev',
  `dev_name` VARCHAR(200) COLLATE utf8_general_ci NOT NULL COMMENT 'Nome do dev',
PRIMARY KEY USING BTREE (`dev_email`)
) ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci';

CREATE TABLE `commits` (
  `com_codigo` VARCHAR(100) COLLATE utf8_general_ci NOT NULL COMMENT 'ID do commit',
  `pro_codigo` INTEGER(11) NOT NULL COMMENT 'Codigo do projeto',
  `dev_email` VARCHAR(200) COLLATE utf8_general_ci NOT NULL COMMENT 'E-mail do dev',
  `com_title` TEXT COLLATE utf8_general_ci COMMENT 'Titulo do commit',
  `com_message` TEXT COLLATE utf8_general_ci COMMENT 'Messagem do commit',
  `com_data` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Data do commit',
  `com_additions` INTEGER(11) DEFAULT NULL COMMENT 'Linhas adicionadas no commit',
  `com_deletions` INTEGER(11) DEFAULT NULL COMMENT 'Linhas deletadas no commit',
  `com_total` INTEGER(11) DEFAULT NULL COMMENT 'Soma de linhas adicionadas e deletadas',
PRIMARY KEY USING BTREE (`com_codigo`)
) ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci';