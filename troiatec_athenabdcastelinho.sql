-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 25-Maio-2017 às 03:27
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `troiatec_athenabdcastelinho`
--
CREATE DATABASE IF NOT EXISTS `troiatec_athenabdcastelinho` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `troiatec_athenabdcastelinho`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda`
--

CREATE TABLE IF NOT EXISTS `agenda` (
  `id_agen` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_agen` varchar(150) NOT NULL,
  `mensagem_age` longtext NOT NULL,
  `remedio1` varchar(50) DEFAULT NULL,
  `dosagem1` varchar(50) DEFAULT NULL,
  `horario1` varchar(50) DEFAULT NULL,
  `remedio2` varchar(50) DEFAULT NULL,
  `dosagem2` varchar(50) DEFAULT NULL,
  `horario2` varchar(20) DEFAULT NULL,
  `remedio3` varchar(45) NOT NULL,
  `dosagem3` varchar(45) NOT NULL,
  `horario3` varchar(20) NOT NULL,
  `colacao` varchar(45) DEFAULT NULL,
  `almoco` varchar(45) DEFAULT NULL,
  `lanche` varchar(45) DEFAULT NULL,
  `janta` varchar(45) DEFAULT NULL,
  `sono` varchar(50) DEFAULT NULL,
  `evacuacao` varchar(50) DEFAULT NULL,
  `evacuacaox` int(11) DEFAULT NULL,
  `data_agen` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `matricula_alu_agen` int(11) DEFAULT NULL,
  `matricula_prof_agen` int(11) DEFAULT NULL,
  `nome_aluno` varchar(60) NOT NULL,
  `turma_aluno` varchar(40) NOT NULL,
  PRIMARY KEY (`id_agen`),
  KEY `matricula_alu_age_fk_idx` (`matricula_alu_agen`),
  KEY `matricula_prof_age` (`matricula_prof_agen`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE IF NOT EXISTS `aluno` (
  `id_aluno` int(11) NOT NULL AUTO_INCREMENT,
  `matricula_alu` int(11) NOT NULL,
  `nome_alu` varchar(50) DEFAULT NULL,
  `sexo` char(1) NOT NULL,
  `nome_foto` varchar(150) NOT NULL,
  `foto_aluno` mediumblob NOT NULL,
  `Tipo` varchar(150) NOT NULL,
  `data_nasc` date NOT NULL,
  `rg_alu` char(12) DEFAULT NULL,
  `cpf_alu` char(14) DEFAULT NULL,
  `turma_fk` varchar(45) DEFAULT NULL,
  `nome_resp` varchar(50) NOT NULL,
  `cpf_resp` char(14) NOT NULL,
  `rg_resp` char(12) NOT NULL,
  `data_nasc_resp` date NOT NULL,
  `email_resp` varchar(50) NOT NULL,
  `nome_resp2` varchar(60) NOT NULL,
  `cpf_resp2` char(14) NOT NULL,
  `rg_resp2` char(12) NOT NULL,
  `data_nasc_resp2` date NOT NULL,
  `email_resp2` varchar(50) NOT NULL,
  `nome_respf` varchar(60) NOT NULL,
  `cpf_respf` char(14) NOT NULL,
  `rg_respf` char(12) NOT NULL,
  `data_nasc_respf` date NOT NULL,
  `email_respf` varchar(50) NOT NULL,
  `celular_respf` char(18) NOT NULL,
  `logradouro_resp` varchar(50) NOT NULL,
  `bairro_resp` varchar(50) NOT NULL,
  `num_resp` varchar(20) NOT NULL,
  `cep_resp` char(9) NOT NULL,
  `cidade_resp` varchar(50) NOT NULL,
  `telefone_resp` char(18) NOT NULL,
  `celular_resp` char(18) NOT NULL,
  `celular_resp2` char(18) NOT NULL,
  `seg_nome` varchar(50) NOT NULL,
  `seg_celular` char(18) NOT NULL,
  `seg_cpf` char(14) NOT NULL,
  `seg2_nome` varchar(50) NOT NULL,
  `seg2_celular` char(18) NOT NULL,
  `seg2_cpf` char(14) NOT NULL,
  PRIMARY KEY (`id_aluno`),
  KEY `turma_fk_alu_idx` (`turma_fk`),
  KEY `matricula_alu` (`matricula_alu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=270 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivos`
--

CREATE TABLE IF NOT EXISTS `arquivos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Codigo',
  `nome_alu` varchar(50) NOT NULL,
  `rg` char(12) DEFAULT NULL,
  `NmArquivo` varchar(150) NOT NULL COMMENT 'nome original',
  `Arquivo` mediumblob NOT NULL COMMENT 'dados do arquivo',
  `Tipo` varchar(15) NOT NULL COMMENT 'Tipo do arquivo, jpeg, doc, mp3, etc..',
  `Tamanho` int(11) NOT NULL COMMENT 'Tamanho em bytes',
  `DtHrEnvio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Data e Hora de envio',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=211 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `frequencia`
--

CREATE TABLE IF NOT EXISTS `frequencia` (
  `id_freq` int(11) NOT NULL AUTO_INCREMENT,
  `data_freq` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `chamada` char(1) NOT NULL,
  `matricula_alu_freq` int(11) DEFAULT NULL,
  `matricula_prof_freq` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_freq`),
  KEY `matricula_alu_freq_fk_idx` (`matricula_alu_freq`),
  KEY `matricula_prof_freq_fk_idx` (`matricula_prof_freq`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id_login` int(11) NOT NULL AUTO_INCREMENT,
  `email_login` varchar(50) NOT NULL,
  `matricula_alu` int(7) NOT NULL,
  `turma_alu` varchar(15) NOT NULL,
  `token` varchar(5000) NOT NULL,
  `ref` varchar(15) NOT NULL,
  PRIMARY KEY (`id_login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=501 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `material`
--

CREATE TABLE IF NOT EXISTS `material` (
  `id_material` int(11) NOT NULL AUTO_INCREMENT,
  `nome_material` varchar(45) NOT NULL,
  `turma` varchar(45) NOT NULL,
  PRIMARY KEY (`id_material`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `nota`
--

CREATE TABLE IF NOT EXISTS `nota` (
  `id_nota` int(11) NOT NULL AUTO_INCREMENT,
  `nota` decimal(10,2) NOT NULL,
  `materia_not` varchar(50) NOT NULL,
  `epoca` varchar(50) NOT NULL,
  `matricula_alu_nota` int(11) DEFAULT NULL,
  `matricula_prof_nota` int(11) DEFAULT NULL,
  `data_not` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_nota`),
  KEY `matricula_prof_nota_fk_idx` (`matricula_prof_nota`),
  KEY `matricula_alu_nota_fk_idx` (`matricula_alu_nota`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ponto`
--

CREATE TABLE IF NOT EXISTS `ponto` (
  `id_ponto` int(11) NOT NULL AUTO_INCREMENT,
  `bateponto` char(7) NOT NULL,
  `dt_bp` datetime NOT NULL,
  `matricula_alu_p` varchar(7) NOT NULL,
  PRIMARY KEY (`id_ponto`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=69 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE IF NOT EXISTS `professor` (
  `id_professor` int(11) NOT NULL AUTO_INCREMENT,
  `matricula_prof` int(11) NOT NULL,
  `nome_prof` varchar(50) NOT NULL,
  `sexo` varchar(50) NOT NULL,
  `nome_foto` varchar(150) NOT NULL,
  `foto_prof` mediumblob NOT NULL,
  `tipo` varchar(150) NOT NULL,
  `data_nasc` date NOT NULL,
  `cpf_prof` char(14) NOT NULL,
  `rg_prof` char(12) NOT NULL,
  `email_prof` varchar(50) NOT NULL,
  `cep_prof` char(9) NOT NULL,
  `logradouro_prof` varchar(50) NOT NULL,
  `cidade_prof` varchar(50) NOT NULL,
  `bairro_prof` varchar(50) NOT NULL,
  `num_prof` varchar(45) NOT NULL,
  `celular_prof` char(18) NOT NULL,
  `telefone_prof` char(18) NOT NULL,
  `disciplina_prof` varchar(50) NOT NULL,
  `formacao` varchar(500) NOT NULL,
  PRIMARY KEY (`id_professor`),
  KEY `matricula_prof` (`matricula_prof`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=76 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE IF NOT EXISTS `turma` (
  `id_turma` int(11) NOT NULL AUTO_INCREMENT,
  `num_turma` varchar(45) NOT NULL,
  `serie_turma` varchar(50) NOT NULL,
  `turno_turma` varchar(25) NOT NULL,
  `num_alu_turma` int(11) NOT NULL,
  `matricula_prof_turm` int(11) NOT NULL,
  PRIMARY KEY (`num_turma`),
  UNIQUE KEY `idturma_UNIQUE` (`id_turma`),
  KEY `matricula_prof_turm` (`matricula_prof_turm`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `matricula_alu_age_fk` FOREIGN KEY (`matricula_alu_agen`) REFERENCES `aluno` (`matricula_alu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matricula_prof_age_fk` FOREIGN KEY (`matricula_prof_agen`) REFERENCES `professor` (`matricula_prof`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `turma_fk_alu` FOREIGN KEY (`turma_fk`) REFERENCES `turma` (`num_turma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `frequencia`
--
ALTER TABLE `frequencia`
  ADD CONSTRAINT `matricula_alu_freq_fk` FOREIGN KEY (`matricula_alu_freq`) REFERENCES `aluno` (`matricula_alu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `matricula_prof_freq_fk` FOREIGN KEY (`matricula_prof_freq`) REFERENCES `professor` (`matricula_prof`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `matricula_alu_nota_fk` FOREIGN KEY (`matricula_alu_nota`) REFERENCES `aluno` (`matricula_alu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matricula_prof_nota_fk` FOREIGN KEY (`matricula_prof_nota`) REFERENCES `professor` (`matricula_prof`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `matricula_prof_turm_fk` FOREIGN KEY (`matricula_prof_turm`) REFERENCES `professor` (`matricula_prof`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
