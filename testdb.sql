CREATE DATABASE IF NOT EXISTS `testdb`;
USE `testdb`;

CREATE TABLE IF NOT EXISTS `func` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name_func` varchar(30) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
  ) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

  
CREATE TABLE IF NOT EXISTS `servico` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `dt_serv` DATE NOT NULL,
  `tipo_serv` varchar(30) NOT NULL,
  `obs` varchar(80) NOT NULL,
  `vl_serv` DOUBLE NOT NULL,
  `name_cli` varchar(30) NOT NULL,
  name_atendente varchar(30) NOT NULL,
  status varchar(30) NOT NULL DEFAULT 'Novo',
  PRIMARY KEY (`id`)
  ) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;