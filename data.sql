--
-- Table structure for table `nb_nesting`
--

CREATE TABLE IF NOT EXISTS `nb_nesting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Nesting ' AUTO_INCREMENT=11 ;

--
-- Dumping data for table `nb_nesting`
--

INSERT INTO `nb_nesting` (`id`, `parent_id`, `name`) VALUES
(1, 0, 'North America'),
(2, 1, 'USA'),
(3, 1, 'California'),
(4, 2, 'Texas'),
(5, 1, 'Canada'),
(6, 3, 'San Francisco, CA'),
(7, 3, 'Los Angeles, CA'),
(8, 0, 'Europe'),
(9, 8, 'Italy'),
(10, 8, 'Germany');