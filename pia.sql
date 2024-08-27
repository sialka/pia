-- --------------------------------------------------------
--
-- Estrutura da tabela `senhas`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,  
  `senha` INT NOT NULL,  
  `localidade_id` INT NOT NULL,  
  `status_ficha` char(1) NOT NULL,
  `status_reserva` char(1) NOT NULL,
  `status_envelope` char(1) NOT NULL,
  `setor` char(1) NOT NULL,
  `status` BOOLEAN DEFAULT TRUE,    
  `created` timestamp NULL DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------
--
-- Estrutura da tabela `panels`
--

DROP TABLE IF EXISTS `panels`;
CREATE TABLE IF NOT EXISTS `panels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,  
  `senha` varchar(255) NOT NULL,
  `fala` varchar(255) NOT NULL,
  `tipo` char(1) NOT NULL,
  `setor` char(1) NOT NULL,
  `status` BOOLEAN DEFAULT TRUE,    
  `created` timestamp NULL DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------
--
-- Estrutura da tabela `localidades`
--

DROP TABLE `localidades`;
CREATE TABLE IF NOT EXISTS `localidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `fala` varchar(50) NULL DEFAULT NULL,
  `setor` char(1) NOT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created` timestamp NULL DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `localidades`
--

INSERT INTO `localidades` (`id`, `codigo`, `nome`, `setor`, `status`, `created`, `modified`) VALUES
(1, '99-0000', 'Adm Gopouva', '0', 1, NULL, '2023-01-23 22:28:21'),
(2, '99-1111', 'Setor 1', '1', 1, NULL, '2023-01-23 23:31:46'),
(3, '99-2222', 'Setor 2', '2', 1, NULL, '2023-01-23 21:47:34'),
(4, '99-3333', 'Setor 3', '2', 1, NULL, '2023-01-16 22:34:17'),
(5, '99-4444', 'Setor 4', '4', 1, NULL, '2023-01-16 23:32:24'),
(6, '98-1111', 'Salão Piedade I', '1', 1, NULL, '2022-09-19 22:57:53'),
(7, '98-2222', 'SALÃO PIEDADE II', '2', 1, NULL, NULL),
(8, '98-3333', 'SALÃO PIEDADE III', '3', 1, NULL, NULL),
(9, '98-4444', 'SALÃO PIEDADE IV', '4', 1, NULL, NULL),
(10, '21-0247', 'Vila Endres', '1', 1, NULL, '2022-08-15 23:31:23'),
(11, '21-0248', 'Vila Galvão', '1', 1, NULL, '2023-01-23 23:30:31'),
(15, '21-0420', 'Sesi Cocaia', '2', 1, NULL, NULL),
(16, '21-0981', 'Vila das Malvinas', '2', 1, NULL, '2022-12-07 21:32:18'),
(20, '21-0904', 'Vila União', '3', 1, NULL, NULL),
(22, '21-0546', 'água Azul', '3', 1, NULL, '2023-01-16 22:19:59'),
(23, '21-0225', 'Bairro dos Pimentas', '4', 1, NULL, '2023-01-16 23:39:25'),
(24, '21-0969', 'Bom Clima', '1', 1, NULL, '2023-01-23 23:36:22'),
(25, '21-0250', 'Cabuçu Km18', '1', 1, NULL, '2022-11-16 22:50:47'),
(26, '21-0227', 'Cidade Aracília', '4', 1, NULL, '2023-01-16 23:30:54'),
(27, '21-1024', 'Cidade Jd Cumbica', '2', 1, NULL, '2022-12-07 21:37:28'),
(28, '21-0647', 'Cidade Soberana', '3', 1, NULL, '2022-10-26 22:22:47'),
(29, '21-0482', 'Cidade Soinco', '2', 1, NULL, NULL),
(30, '21-0778', 'Cidade Tupinamba', '4', 1, NULL, '2022-08-15 21:31:41'),
(31, '21-0229', 'Cumbica', '2', 1, NULL, '2022-10-17 21:42:12'),
(32, '21-0230', 'Gopouva', '1', 1, NULL, NULL),
(33, '21-0223', 'Guarulhos Centro', '1', 1, NULL, '2023-01-23 23:23:22'),
(34, '21-0398', 'Inocoop', '3', 1, NULL, '2022-10-26 22:29:34'),
(35, '21-0950', 'Inocoop II', '3', 1, NULL, '2023-01-16 22:21:25'),
(36, '21-1241', 'Jardim das Olivas', '4', 1, NULL, '2022-10-05 23:22:10'),
(37, '21-0231', 'Jd Acácio', '2', 1, NULL, NULL),
(38, '21-0473', 'Jd Adriana', '2', 1, NULL, '2022-09-19 23:58:56'),
(39, '21-0654', 'Jd Álamo', '3', 1, NULL, NULL),
(40, '21-0232', 'Jd Alice', '4', 1, NULL, '2023-01-16 23:27:58'),
(41, '21-0583', 'Jd Almeida Prado', '2', 1, NULL, '2022-11-21 21:44:48'),
(42, '21-0422', 'Jd Alvorada', '2', 1, NULL, NULL),
(43, '21-0424', 'Jd Angélica', '4', 1, NULL, '2022-08-15 22:00:22'),
(44, '21-0476', 'Jd Arapongas', '4', 1, NULL, '2022-08-15 21:52:00'),
(45, '21-0254', 'Jd Bela Vista', '2', 1, NULL, '2023-01-23 21:51:24'),
(46, '21-0374', 'Jd Brasil', '4', 1, NULL, '2023-01-16 23:33:32'),
(47, '21-0252', 'Jd Cumbica', '4', 1, NULL, '2022-08-15 21:39:47'),
(48, '21-0955', 'Jd dos Cardosos', '1', 1, NULL, '2023-01-23 23:29:13'),
(49, '21-0907', 'Jd Eliana', '2', 1, NULL, '2022-12-07 21:19:18'),
(50, '21-0399', 'Jd Fátima', '3', 1, NULL, NULL),
(51, '21-0480', 'Jd Flor da Montanha', '1', 1, NULL, '2022-11-28 23:50:41'),
(52, '21-0400', 'Jd Fortaleza', '3', 1, NULL, NULL),
(53, '21-1048', 'Jd Fortaleza II', '3', 1, NULL, NULL),
(54, '21-0510', 'Jd Gracinda', '1', 1, NULL, NULL),
(55, '21-1023', 'Jd Guilhermino', '4', 1, NULL, '2022-12-07 22:10:52'),
(56, '21-0916', 'Jd Iporanga', '2', 1, NULL, NULL),
(57, '21-0234', 'Jd Itapuã', '2', 1, NULL, NULL),
(58, '21-0687', 'Jd Jacy', '4', 1, NULL, '2022-12-07 21:59:31'),
(59, '21-0780', 'Jd Jovaia', '2', 1, NULL, NULL),
(60, '21-0988', 'Jd Julieta', '1', 1, NULL, '2022-11-16 22:45:43'),
(61, '21-0235', 'Jd Leda', '1', 1, NULL, '2023-01-23 23:19:51'),
(62, '21-0961', 'Jd Lenize', '3', 1, NULL, NULL),
(63, '21-1000', 'Jd Marilena', '2', 1, NULL, NULL),
(64, '21-1054', 'Jd Monte Alegre', '4', 1, NULL, NULL),
(65, '21-0236', 'Jd Munhoz', '1', 1, NULL, '2023-01-23 23:27:44'),
(66, '21-0792', 'Jd Munira', '2', 1, NULL, NULL),
(67, '21-0401', 'Jd Normandia', '4', 1, NULL, '2023-01-16 23:20:24'),
(68, '21-0972', 'Jd Nova Canaã', '4', 1, NULL, '2022-10-03 20:55:27'),
(69, '21-0237', 'Jd Nova Cumbica', '4', 1, NULL, '2022-08-15 21:27:46'),
(70, '21-0238', 'Jd Novo Portugal', '2', 1, NULL, '2023-01-16 22:32:44'),
(71, '21-0855', 'Jd Oliveira', '4', 1, NULL, '2023-01-16 23:26:51'),
(72, '21-0376', 'Jd Ottawa', '4', 1, NULL, '2023-01-16 23:21:20'),
(73, '21-0251', 'Jd Palmira', '1', 1, NULL, '2022-11-16 23:04:24'),
(74, '21-0402', 'Jd Papai', '1', 1, NULL, '2022-11-16 22:44:26'),
(75, '21-0809', 'Jd Paraiso - Taboão', '2', 1, NULL, '2023-01-23 21:46:35'),
(76, '21-0239', 'Jd Pinhal', '1', 1, NULL, NULL),
(77, '21-0582', 'Jd Ponte Alta', '3', 1, NULL, '2022-11-09 22:21:10'),
(78, '21-0926', 'Jd Ponte Alta II', '3', 1, NULL, NULL),
(79, '21-0240', 'Jd Presidente Dutra', '3', 1, NULL, '2023-01-16 22:15:50'),
(80, '21-1026', 'Jd Presidente Dutra - Maria Paula', '3', 1, NULL, '2023-01-16 22:13:56'),
(81, '21-0241', 'Jd Rosa de França', '1', 1, NULL, '2023-01-23 23:25:14'),
(82, '21-0242', 'Jd Santa Barbara', '2', 1, NULL, '2023-01-23 21:56:27'),
(83, '21-0243', 'Jd Santa Rita', '2', 1, NULL, '2022-10-17 23:26:02'),
(84, '21-0244', 'Jd Santo Afonso', '4', 1, NULL, '2022-10-05 23:42:59'),
(85, '21-0228', 'Jd São Domingos', '2', 1, NULL, '2022-12-07 22:25:48'),
(86, '21-0245', 'Jd São Paulo', '2', 1, NULL, '2023-01-23 21:43:48'),
(87, '21-0913', 'Jd Sta Paula', '3', 1, NULL, '2022-10-26 23:14:55'),
(88, '21-0824', 'Jd Sto Expedito', '3', 1, NULL, '2023-01-16 22:31:45'),
(89, '21-1025', 'Jd Triunfo', '3', 1, NULL, NULL),
(90, '21-0513', 'Jd Vila Galvão', '1', 1, NULL, '2022-11-16 23:09:56'),
(91, '21-0656', 'Jd Vila Rica', '2', 1, NULL, '2023-01-16 22:05:01'),
(92, '21-1033', 'Jd Vitória', '2', 1, NULL, NULL),
(93, '21-1255', 'Jd. Fortaleza - Rocinha', '3', 1, NULL, NULL),
(94, '21-1196', 'Jd. Silvia', '2', 1, NULL, '2022-12-07 22:21:42'),
(95, '21-0377', 'Lavras - Jardim IV Centenário', '3', 1, NULL, NULL),
(96, '21-0731', 'Macedo', '1', 1, NULL, NULL),
(97, '21-1254', 'Maria Clara - Soberana', '3', 1, NULL, NULL),
(98, '21-0863', 'Novo Recreio', '2', 1, NULL, NULL),
(99, '21-1293', 'Orquidiama', '3', 1, NULL, '2022-10-26 23:06:34'),
(100, '21-0879', 'Parque Continental V', '1', 1, NULL, NULL),
(101, '21-0226', 'Parque das Nações', '4', 1, NULL, '2023-01-16 23:23:43'),
(102, '21-0990', 'Parque Flamengo', '2', 1, NULL, '2023-01-23 21:54:47'),
(103, '21-0959', 'Parque Industrial', '4', 1, NULL, NULL),
(104, '21-0651', 'Parque Jandaia', '4', 1, NULL, NULL),
(105, '21-0735', 'Parque Mikail II', '2', 1, NULL, '2022-10-17 22:03:15'),
(106, '21-0423', 'Parque Primavera', '2', 1, NULL, '2022-10-17 21:30:48'),
(107, '21-0777', 'Parque São Miguel', '4', 1, NULL, '2022-10-03 20:53:49'),
(108, '21-0854', 'Parque Uirapuru', '4', 1, NULL, '2022-12-07 22:08:00'),
(109, '21-0917', 'Ponte Grande', '1', 1, NULL, '2023-01-23 23:34:15'),
(110, '21-0475', 'Pq Continental I', '1', 1, NULL, '2022-10-05 22:05:46'),
(111, '21-0725', 'Pq Continental III', '1', 1, NULL, NULL),
(112, '21-0481', 'Pq Maria Dirce', '3', 1, NULL, NULL),
(113, '21-0811', 'Pq Residencial Bambi', '3', 1, NULL, '2023-01-16 21:54:34'),
(114, '21-0246', 'Pq Santos Dumond', '2', 1, NULL, NULL),
(115, '21-0501', 'Pq Sto Antonio', '1', 1, NULL, '2022-11-16 23:02:47'),
(116, '21-0378', 'Recreio São Jorge', '2', 1, NULL, '2023-01-23 21:33:25'),
(117, '21-0420', 'Sesi Cocaia', '2', 1, NULL, NULL),
(118, '21-0779', 'Sítio São Francisco', '4', 1, NULL, '2022-12-07 22:09:27'),
(119, '21-0479', 'Estela Maris', '1', 1, NULL, '2023-01-23 23:26:20'),
(120, '21-0945', 'Vila Alzira', '4', 1, NULL, '2022-10-03 21:10:59'),
(121, '21-0233', 'Vila Anny', '4', 1, NULL, '2023-01-16 23:41:30'),
(122, '21-0375', 'Vila Barros', '2', 1, NULL, NULL),
(123, '21-0826', 'Vila Carmela', '3', 1, NULL, '2022-11-09 21:52:54'),
(125, '21-0599', 'Vila Dinamarca', '4', 1, NULL, '2023-01-16 23:35:15'),
(127, '21-0639', 'Vila Flora', '1', 1, NULL, NULL),
(129, '21-0253', 'Vila Nova Bonsucesso', '3', 1, NULL, '2022-11-09 21:51:37'),
(130, '21-1027', 'Vila Operária', '2', 1, NULL, NULL),
(131, '21-0474', 'Vila Paraiso', '4', 1, NULL, '2022-10-03 20:49:10'),
(132, '21-0419', 'Vila São João Batista', '2', 1, NULL, '2023-01-23 21:23:33'),
(133, '21-0943', 'Vila São José', '3', 1, NULL, '2022-11-09 22:14:03'),
(134, '21-1110', 'Vila Torre', '2', 1, NULL, NULL),
(135, '21-0904', 'Vila União', '3', 1, NULL, NULL);

-- --------------------------------------------------------
--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mod_admin` tinyint(1) DEFAULT '0',
  `mod_user` tinyint(1) DEFAULT '0',
  `mod_localidade` tinyint(1) DEFAULT '0',
  `mod_setores` tinyint(1) DEFAULT '0',
  `mod_atendimento` tinyint(1) DEFAULT '0',
  `status` tinyint(1) DEFAULT '0',
  `created` timestamp NULL DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `username`, `email`, `password`, `mod_admin`, `mod_user`, `mod_localidade`, `mod_setores`, `mod_atendimento`,`status`, `created`, `modified`) VALUES (1, 'Sistema', 'sistema', 'sialkas@gmail.com', '$2y$10$OlQdL/TfLoCAZGqV9hI0Geu3/MfaDmhTnl13VqqFRfv9biSNgdN86', 1, 1, 1, 1, 1, 1, NULL, NULL);

DROP TABLE IF EXISTS `setores`;
CREATE TABLE IF NOT EXISTS `setores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,  
  `setor` char(1) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `status` BOOLEAN DEFAULT TRUE,    
  `created` timestamp NULL DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;

INSERT INTO `setores` (`setor`, `nome`, `status`, `created`, `modified`) VALUES ('0', '0 - Administração', 1, NULL, NULL);
INSERT INTO `setores` (`setor`, `nome`, `status`, `created`, `modified`) VALUES ('1', '1 - Centro', 1, NULL, NULL);
INSERT INTO `setores` (`setor`, `nome`, `status`, `created`, `modified`) VALUES ('2', '2 - Aeroporto', 1, NULL, NULL);
INSERT INTO `setores` (`setor`, `nome`, `status`, `created`, `modified`) VALUES ('3', '3 - Bonsucesso', 1, NULL, NULL);
INSERT INTO `setores` (`setor`, `nome`, `status`, `created`, `modified`) VALUES ('4', '4 - Pimentas', 1, NULL, NULL);


DROP TABLE `setup`;
CREATE TABLE `setup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,  
  `chave` varchar(250) NOT NULL,
  `valor` varchar(250) NOT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;

INSERT INTO `pia_ccb`.`setup` (`chave`, `valor`) VALUES ('key', 'value');
