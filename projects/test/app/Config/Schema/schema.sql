

DROP TABLE IF EXISTS `cake`.`tarefas`;


CREATE TABLE `cake`.`tarefas` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`titulo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`descricao` text CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
	`prioridade` int(11) DEFAULT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=InnoDB;

