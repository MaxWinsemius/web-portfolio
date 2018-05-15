-- phpMyAdmin SQL Dump
-- version 4.0.9deb1
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 19 apr 2015 om 09:44
-- Serverversie: 5.5.42-1
-- PHP-versie: 5.4.4-14+deb7u14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Databank: `0893527`
--

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

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Tags`
--

CREATE TABLE IF NOT EXISTS `Tags` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(48) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;
