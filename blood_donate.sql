SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood_donate`
--

-- --------------------------------------------------------

--
-- Table structure for table `bdonate`
--

DROP TABLE IF EXISTS `bdonate`;
CREATE TABLE IF NOT EXISTS `bdonate` (
  `fname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `adr` varchar(100) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(100) NOT NULL,
   `zip` varchar(100) NOT NULL

) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

DROP TABLE IF EXISTS `cdonate`;
CREATE TABLE IF NOT EXISTS `cdonate` (
  `cname` varchar(100) NOT NULL,
  `cno` varchar(100) NOT NULL,
  `cexpmonth` varchar(100) NOT NULL,
  `cexpyear` varchar(100) NOT NULL,
  `ccvv` varchar(30) NOT NULL

) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

DROP TABLE IF EXISTS `bakedonate`;
CREATE TABLE IF NOT EXISTS `bakedonate` (
  `hname` varchar(100) NOT NULL,
  `hno` varchar(100) NOT NULL,
  `hexpmonth` varchar(100) NOT NULL,
  `hexpyear` varchar(100) NOT NULL,
  `hcvv` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

DROP TABLE IF EXISTS `mdonate`;
CREATE TABLE IF NOT EXISTS `mdonate` (
  `mname` varchar(100) NOT NULL,
  `mno` varchar(100) NOT NULL,
  `mexpmonth` varchar(100) NOT NULL,
  `mexpyear` varchar(100) NOT NULL,
  `mcvv` varchar(30) NOT NULL

) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

