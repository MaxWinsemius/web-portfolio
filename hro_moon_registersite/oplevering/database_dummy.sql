-- phpMyAdmin SQL Dump
-- version 4.0.9deb1
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 19 apr 2015 om 09:43
-- Serverversie: 5.5.42-1
-- PHP-versie: 5.4.4-14+deb7u14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `clientID` int(11) NOT NULL,
  `day` tinyint(1) NOT NULL,
  `dayPart` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Gegevens worden uitgevoerd voor tabel `appointment`
--

INSERT INTO `appointment` (`ID`, `clientID`, `day`, `dayPart`) VALUES
(1, 1, 1, 1),
(2, 2, 0, 1),
(3, 3, 0, 1),
(4, 4, 0, 1),
(5, 4, 0, 1),
(6, 5, 3, 1),
(7, 5, 3, 1),
(8, 5, 3, 1),
(9, 5, 3, 1),
(10, 5, 3, 1),
(11, 5, 3, 1),
(12, 5, 3, 1),
(13, 5, 3, 1),
(14, 5, 0, 1),
(15, 5, 3, 1),
(16, 5, 0, 1),
(17, 5, 3, 1),
(18, 5, 0, 1),
(19, 6, 0, 1),
(20, 7, 0, 1),
(21, 8, 0, 1),
(22, 9, 0, 1),
(23, 10, 3, 1),
(24, 11, 0, 1),
(25, 12, 0, 1),
(26, 13, 0, 1),
(27, 14, 0, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Childeren`
--

CREATE TABLE IF NOT EXISTS `Childeren` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clientID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Age` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Gegevens worden uitgevoerd voor tabel `Childeren`
--

INSERT INTO `Childeren` (`id`, `clientID`, `Name`, `Age`) VALUES
(1, 1, 'kindnaam', 12),
(2, 2, '9999', 127),
(3, 3, '9999', 127),
(4, 1, 'En nog een naam', 14),
(5, 4, '9999', 127),
(6, 5, '9999', 127),
(7, 6, '9999', 127),
(8, 7, '9999', 127),
(9, 8, '9999', 127),
(10, 9, '9999', 127),
(11, 10, '9999', 127),
(12, 11, '9999', 127),
(13, 12, '9999', 127),
(14, 13, '9999', 127),
(15, 14, '9999', 127);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Clients`
--

CREATE TABLE IF NOT EXISTS `Clients` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Initals` varchar(20) NOT NULL,
  `CallName` varchar(30) NOT NULL,
  `Sex` tinyint(1) NOT NULL COMMENT 'True = man',
  `Street_And_Number` varchar(255) NOT NULL,
  `ZIP_Code` varchar(6) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Birthday` date DEFAULT NULL,
  `Phone` int(10) DEFAULT NULL,
  `Mobile` int(10) DEFAULT NULL,
  `Email` varchar(255) NOT NULL,
  `BSN_Option` tinyint(1) NOT NULL COMMENT '0=driver License, 1=passport, 2=idCard',
  `BSN` int(11) NOT NULL,
  `Martial` tinyint(1) NOT NULL COMMENT '0=Alone, 1=Married, 2=Living Together, 3=Relation',
  `IP` varchar(45) NOT NULL,
  `GPName` varchar(255) DEFAULT NULL COMMENT 'GP = general practitioner',
  `GPStreet_And_Number` varchar(255) DEFAULT NULL,
  `GPZIP_Code` varchar(6) DEFAULT NULL,
  `GPCity` varchar(255) DEFAULT NULL,
  `GPPhone` int(10) DEFAULT NULL,
  `REFName` varchar(255) DEFAULT NULL COMMENT 'REF = person that refferred',
  `REFStreet_And_Number` varchar(255) DEFAULT NULL,
  `REFZIP_Code` varchar(6) DEFAULT NULL,
  `REFCity` varchar(255) DEFAULT NULL,
  `REFPhone` int(10) DEFAULT NULL,
  `IName` varchar(255) DEFAULT NULL COMMENT 'I = Insurance',
  `ICity` varchar(255) DEFAULT NULL,
  `IDate` date DEFAULT NULL,
  `IPolisnmr` int(11) DEFAULT NULL,
  `IPolis` tinyint(1) DEFAULT NULL,
  `Children` tinyint(2) DEFAULT NULL,
  `SBasis` int(11) DEFAULT NULL,
  `SLagerBijzonderVormend` tinyint(1) DEFAULT NULL COMMENT 'S = Schooling',
  `SLagerBeroeps` tinyint(1) DEFAULT NULL,
  `SMiddelbaarVoortgezet` tinyint(1) DEFAULT NULL,
  `SMiddelbaarBeroeps` tinyint(1) DEFAULT NULL,
  `SHogerVoortgezet` tinyint(1) DEFAULT NULL,
  `SHogerBeroeps` tinyint(1) DEFAULT NULL,
  `SVoorbereidendWetenschappelijk` tinyint(1) DEFAULT NULL,
  `SWetenschappelijk` tinyint(1) DEFAULT NULL,
  `CurrentStudy` text,
  `CurrentJob` text,
  `Sickness` tinyint(1) DEFAULT NULL,
  `SicknessExpl` text,
  `Divorced` tinyint(1) DEFAULT NULL,
  `DivorcedAge` tinyint(2) DEFAULT NULL,
  `SocialContacts` tinyint(1) DEFAULT NULL COMMENT '0=geen, 1=1-2, 2=3-4, 3=5-6, 4=6+',
  `FreeTimeExpl` varchar(1024) DEFAULT NULL,
  `BelieveExpl` varchar(255) DEFAULT NULL,
  `Medics` tinyint(1) DEFAULT NULL,
  `SUAlcohol` tinyint(1) DEFAULT NULL COMMENT 'SU = Substance Usage',
  `SUAlcoholExpl` text,
  `SUDrugs` tinyint(1) DEFAULT NULL COMMENT '(soft/harddrugs)',
  `SUDrugsExpl` text,
  `SUTabacco` tinyint(1) DEFAULT NULL,
  `SUTabaccoExpl` text,
  `SUGamble` tinyint(1) DEFAULT NULL,
  `SUGambleExpl` text,
  `SUCoffee` tinyint(1) DEFAULT NULL,
  `SUCoffeeExpl` text,
  `SUInternetComputer` tinyint(1) DEFAULT NULL,
  `SUInternetComputerExpl` text,
  `SUOther` varchar(1024) DEFAULT NULL,
  `SUOtherExpl` text,
  `SUProblematic` tinyint(1) DEFAULT NULL,
  `EarlierHelp` tinyint(1) DEFAULT NULL,
  `RERelation` tinyint(1) DEFAULT NULL COMMENT 'RE = Reasons to come here',
  `REFamily` tinyint(1) DEFAULT NULL,
  `REContOthers` tinyint(1) DEFAULT NULL,
  `REChildren` tinyint(1) DEFAULT NULL,
  `REWorkStudy` tinyint(1) DEFAULT NULL,
  `RESadness` tinyint(1) DEFAULT NULL,
  `REAgression` tinyint(1) DEFAULT NULL,
  `REPsychStressed` tinyint(1) DEFAULT NULL,
  `REPhysStressed` tinyint(1) DEFAULT NULL,
  `REUncertain` tinyint(1) DEFAULT NULL,
  `REForced` tinyint(1) DEFAULT NULL,
  `REScared` tinyint(1) DEFAULT NULL,
  `REMourning` tinyint(1) DEFAULT NULL,
  `RESex` tinyint(1) DEFAULT NULL,
  `RESleep` tinyint(1) DEFAULT NULL,
  `REIllusions` tinyint(1) DEFAULT NULL,
  `REThinkSuicide` tinyint(1) DEFAULT NULL,
  `REActionSuicide` tinyint(1) DEFAULT NULL,
  `REEating` tinyint(1) DEFAULT NULL,
  `RELawbreaking` tinyint(1) DEFAULT NULL,
  `REOther` varchar(1024) DEFAULT NULL,
  `PhysicalComplaints` tinyint(1) DEFAULT NULL,
  `PhysicalComplaintsExpl` varchar(1024) DEFAULT NULL,
  `Complaints` text,
  `WhatToChange` text,
  `WhatIsGood` text,
  `DeclarationGP` tinyint(1) DEFAULT NULL,
  `news` tinyint(1) NOT NULL DEFAULT '1',
  `checked` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Gegevens worden uitgevoerd voor tabel `Clients`
--

INSERT INTO `Clients` (`ID`, `Name`, `Initals`, `CallName`, `Sex`, `Street_And_Number`, `ZIP_Code`, `City`, `Birthday`, `Phone`, `Mobile`, `Email`, `BSN_Option`, `BSN`, `Martial`, `IP`, `GPName`, `GPStreet_And_Number`, `GPZIP_Code`, `GPCity`, `GPPhone`, `REFName`, `REFStreet_And_Number`, `REFZIP_Code`, `REFCity`, `REFPhone`, `IName`, `ICity`, `IDate`, `IPolisnmr`, `IPolis`, `Children`, `SBasis`, `SLagerBijzonderVormend`, `SLagerBeroeps`, `SMiddelbaarVoortgezet`, `SMiddelbaarBeroeps`, `SHogerVoortgezet`, `SHogerBeroeps`, `SVoorbereidendWetenschappelijk`, `SWetenschappelijk`, `CurrentStudy`, `CurrentJob`, `Sickness`, `SicknessExpl`, `Divorced`, `DivorcedAge`, `SocialContacts`, `FreeTimeExpl`, `BelieveExpl`, `Medics`, `SUAlcohol`, `SUAlcoholExpl`, `SUDrugs`, `SUDrugsExpl`, `SUTabacco`, `SUTabaccoExpl`, `SUGamble`, `SUGambleExpl`, `SUCoffee`, `SUCoffeeExpl`, `SUInternetComputer`, `SUInternetComputerExpl`, `SUOther`, `SUOtherExpl`, `SUProblematic`, `EarlierHelp`, `RERelation`, `REFamily`, `REContOthers`, `REChildren`, `REWorkStudy`, `RESadness`, `REAgression`, `REPsychStressed`, `REPhysStressed`, `REUncertain`, `REForced`, `REScared`, `REMourning`, `RESex`, `RESleep`, `REIllusions`, `REThinkSuicide`, `REActionSuicide`, `REEating`, `RELawbreaking`, `REOther`, `PhysicalComplaints`, `PhysicalComplaintsExpl`, `Complaints`, `WhatToChange`, `WhatIsGood`, `DeclarationGP`, `news`, `checked`) VALUES
(1, 'Winsemius', 'm', 'Max', 1, 'Comatistraat 93', '1234AB', 'Dordrecht', '1234-12-12', 998765435, 1234567890, 'obscured', 0, 2147483647, 0, 'Silencio', 'huisartsnaam', 'huisartsstraat12', '1234as', 'huisartsstad', 2147483647, 'VerwijzingNaam', 'Verwijzingstraat12', '1231sa', 'Verwijzingstad', 2133213172, 'ziektekostenNaam', 'ziektekostenStad', '8221-08-09', 2147483647, 1, 1, 1, 1, 0, 1, 0, 1, 1, 1, 0, 'huidigestudie', 'huidigberoep', 1, 'ziektewetTijd', 1, 12, 2, 'Hobbies', 'geloofsoveruiging', 1, 1, 'alcEexpl', 1, 'Drugsexpl', 1, 'tabexpl', 1, 'gokexpl', 1, 'coffexpl', 1, 'compexpl', '1', 'andexpl', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 0, 0, '1', 1, 'lichaam', 'klacht', 'verbeteren', 'goedgaan', 1, 1, 1),
(2, 'Hamba', 'k', 'Kille', 1, 'Bilan 29', '2568ks', 'Nieuw-zwijndrecht', '2938-02-09', 0, 0, 'kilambo@mia.ke', 2, 2147483647, 0, 'Silencio', '', '', '', '', 0, '', '', '', '', 0, 'iaw', '', '0000-00-00', 2147483647, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', 0, '', 0, 0, 0, '', '', 0, 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '0', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, '', '', '', '', 0, 1, 1),
(5, 'Wilkes', 'J', 'jklhg', 1, 'Wiskeslaan 34', '5234KA', 'Misko', '1996-01-01', 2147483647, 2147483647, 'Wilkes@gmail.com', 2, 2147483647, 2, 'Silencio', '', '', '', '', 0, '', '', '', '', 0, 'VGZ', '', '0000-00-00', 2147483647, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', 0, '', 0, 0, 0, '', '', 0, 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '0', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, '', '', '', '', 0, 1, 1),
(6, 'Achternaam', 'R', 'Roepnaam', 1, 'Straatnaam', '7021CO', 'Woonplaats', '2015-01-01', 987654323, 987654345, 'email@adre.ss', 2, 2147483647, 3, 'Silencio', '', '', '', '', 0, '', '', '', '', 0, 'VGZ', '', '0000-00-00', 2147483647, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', 0, '', 0, 0, 0, '', '', 0, 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '0', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, '', '', '', '', 0, 1, 1),
(7, 'Winsemius', 'M', 'Max', 1, 'Comatistraat 93', '1234AB', 'Dordrecht', '2015-12-31', 0, 0, 'obscured', 1, 2147483647, 0, 'Silencio', '', '', '', '', 0, '', '', '', '', 0, 'VGZ', '', '0000-00-00', 2147483647, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', 0, '', 0, 0, 0, '', '', 0, 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '0', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, '', '', '', '', 0, 1, 1),
(8, 'van Loon', 'B', 'Boris', 1, 'Javastraat 38', '3312KM', 'Amsterdam', '2015-12-31', 0, 0, 'bvl@gmail.com', 1, 2147483647, 0, 'Silencio', '', '', '', '', 0, '', '', '', '', 0, 'Opel', '', '0000-00-00', 2147483647, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', 0, '', 0, 0, 0, '', '', 0, 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '0', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, '', '', '', '', 0, 1, 1),
(9, 'Tulp', '', 'Tara', 0, 'MissMo 54', '1432sj', 'Kroon', '2015-12-31', 0, 0, 'tTulp@gmail.com', 2, 2147483647, 0, 'Silencio', '', '', '', '', 0, '', '', '', '', 0, 'Trias', '', '0000-00-00', 2147483647, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', 0, '', 0, 0, 0, '', '', 0, 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '0', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, '', '', '', '', 0, 1, 0),
(10, 'Winsemius', 'M', 'Max', 1, 'Comatistraat 93', '1234AB', 'Dordrecht', '2015-12-31', 0, 0, 'maxwinsemius@gmail.com', 2, 2147483647, 0, 'Silencio', '', '', '', '', 0, '', '', '', '', 0, 'UWIhgeyj', '', '0000-00-00', 2147483647, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', 0, '', 0, 0, 0, '', '', 0, 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '0', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, '', '', '', '', 0, 1, 0),
(14, 'Van Bergen', 'J', 'Jessica', 0, 'Heulselaan 93', '9203KD', 'Ergens', '2015-12-31', 1234567890, 987654321, 'jbergen@gmail.com', 2, 1234567890, 0, 'Silencio', 'Wim', 'Wimseweg 12', '1234AD', 'Eugen', 987654321, 'Wam', 'Wamseweg 23', '4312DA', 'Egen', 1234567890, 'Weg', 'Willekens', '2015-12-31', 2147483647, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', 0, '', 0, 0, 0, '', '', 0, 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '0', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, '', '', '', '', 0, 1, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `ClientToTag`
--

CREATE TABLE IF NOT EXISTS `ClientToTag` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ClientID` int(11) NOT NULL,
  `TagID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Gegevens worden uitgevoerd voor tabel `ClientToTag`
--

INSERT INTO `ClientToTag` (`ID`, `ClientID`, `TagID`) VALUES
(1, 1, 2),
(2, 2, 3),
(4, 3, 3),
(5, 2, 3),
(6, 5, 2),
(8, 6, 4),
(10, 6, 4),
(11, 7, 2),
(12, 7, 3),
(13, 7, 5),
(15, 8, 2),
(16, 8, 3),
(17, 9, 3),
(18, 9, 4),
(19, 9, 6),
(20, 10, 2),
(21, 10, 4),
(22, 10, 6),
(23, 11, 2),
(24, 11, 4),
(25, 12, 2),
(26, 12, 5),
(27, 13, 2),
(28, 13, 3),
(29, 13, 4),
(30, 13, 6),
(31, 14, 3),
(32, 14, 5),
(33, 14, 6);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Family`
--

CREATE TABLE IF NOT EXISTS `Family` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ClientID` int(11) NOT NULL,
  `Person` tinyint(1) NOT NULL COMMENT '0=Mother,1=Father,2=Brother,3=Sister',
  `Name` varchar(255) NOT NULL,
  `Age` smallint(3) NOT NULL,
  `JobStudy` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Gegevens worden uitgevoerd voor tabel `Family`
--

INSERT INTO `Family` (`ID`, `ClientID`, `Person`, `Name`, `Age`, `JobStudy`) VALUES
(1, 1, 1, 'vaderNaam', 12, 'vaderBer'),
(2, 1, 0, 'moedernaam', 12, 'moederber'),
(3, 1, 2, 'broerNaam', 12, 'broerBer'),
(4, 1, 3, 'zusnaam', 12, 'zusBer'),
(5, 2, 1, '999', 999, '999'),
(6, 2, 0, '999', 999, '999'),
(7, 3, 1, '999', 999, '999'),
(8, 3, 0, '999', 999, '999'),
(9, 4, 1, '999', 999, '999'),
(10, 4, 0, '999', 999, '999'),
(11, 5, 1, '999', 999, '999'),
(12, 5, 0, '999', 999, '999'),
(13, 6, 1, '999', 999, '999'),
(14, 6, 0, '999', 999, '999'),
(15, 7, 1, '999', 999, '999'),
(16, 7, 0, '999', 999, '999'),
(17, 8, 1, '999', 999, '999'),
(18, 8, 0, '999', 999, '999'),
(19, 9, 1, '999', 999, '999'),
(20, 9, 0, '999', 999, '999'),
(21, 10, 1, '999', 999, '999'),
(22, 10, 0, '999', 999, '999'),
(23, 11, 1, '999', 999, '999'),
(24, 11, 0, '999', 999, '999'),
(25, 12, 1, '999', 999, '999'),
(26, 12, 0, '999', 999, '999'),
(27, 13, 1, '999', 999, '999'),
(28, 13, 0, '999', 999, '999'),
(29, 14, 1, '999', 999, '999'),
(30, 14, 0, '999', 999, '999');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Medics`
--

CREATE TABLE IF NOT EXISTS `Medics` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ClientID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Amount` varchar(255) NOT NULL,
  `Frequency` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Gegevens worden uitgevoerd voor tabel `Medics`
--

INSERT INTO `Medics` (`ID`, `ClientID`, `Name`, `Amount`, `Frequency`) VALUES
(1, 1, 'medNaam', 'medAmount', 'medFreq'),
(2, 2, '9999', '999', '999'),
(3, 3, '9999', '999', '999'),
(4, 4, '9999', '999', '999'),
(5, 5, '9999', '999', '999'),
(6, 6, '9999', '999', '999'),
(7, 7, '9999', '999', '999'),
(8, 8, '9999', '999', '999'),
(9, 9, '9999', '999', '999'),
(10, 10, '9999', '999', '999'),
(11, 11, '9999', '999', '999'),
(12, 12, '9999', '999', '999'),
(13, 13, '9999', '999', '999'),
(14, 14, '9999', '999', '999');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `PrevHelp`
--

CREATE TABLE IF NOT EXISTS `PrevHelp` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ClientID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Year` smallint(4) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Gegevens worden uitgevoerd voor tabel `PrevHelp`
--

INSERT INTO `PrevHelp` (`ID`, `ClientID`, `Name`, `City`, `Year`) VALUES
(1, 1, 'Hulpnaam', 'hulpstad', 1231),
(2, 2, '9999', '999', 999),
(3, 3, '9999', '999', 999),
(4, 4, '9999', '999', 999),
(5, 5, '9999', '999', 999),
(6, 6, '9999', '999', 999),
(7, 7, '9999', '999', 999),
(8, 8, '9999', '999', 999),
(9, 9, '9999', '999', 999),
(10, 10, '9999', '999', 999),
(11, 11, '9999', '999', 999),
(12, 12, '9999', '999', 999),
(13, 13, '9999', '999', 999),
(14, 14, '9999', '999', 999);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Tags`
--

CREATE TABLE IF NOT EXISTS `Tags` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(48) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Gegevens worden uitgevoerd voor tabel `Tags`
--

INSERT INTO `Tags` (`ID`, `Name`) VALUES
(2, 'Jongeren'),
(3, 'EMDR'),
(4, 'Individuele therapie'),
(5, 'Gezinstherapie'),
(6, 'EFT');
