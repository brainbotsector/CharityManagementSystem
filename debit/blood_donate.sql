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
