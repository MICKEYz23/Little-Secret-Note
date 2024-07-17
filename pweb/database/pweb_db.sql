# Host: localhost  (Version 5.5.5-10.4.22-MariaDB)
# Date: 2023-12-10 12:29:55
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "data_curhatan"
#

DROP TABLE IF EXISTS `data_curhatan`;
CREATE TABLE `data_curhatan` (
  `id_curhatan` int(11) NOT NULL AUTO_INCREMENT,
  `id_pasien` char(6) NOT NULL,
  `id_dokter` char(6) NOT NULL,
  `jam` time NOT NULL,
  `tanggal` date NOT NULL,
  `isi_curhatan` text NOT NULL,
  PRIMARY KEY (`id_curhatan`),
  KEY `id_pasien` (`id_pasien`),
  KEY `id_pasien_2` (`id_pasien`),
  KEY `id_dokter` (`id_dokter`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

#
# Data for table "data_curhatan"
#

INSERT INTO `data_curhatan` VALUES (1,'PAS01','DOK01','09:54:55','0000-00-00','asasasasas'),(2,'PAS01','DOK01','09:55:40','2023-12-10','adaaadaadadada');

#
# Structure for table "dokter"
#

DROP TABLE IF EXISTS `dokter`;
CREATE TABLE `dokter` (
  `id_dokter` char(6) NOT NULL DEFAULT '',
  `nama_dokter` varchar(50) NOT NULL DEFAULT '',
  `username` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(16) NOT NULL DEFAULT '',
  `gender` char(2) DEFAULT '',
  PRIMARY KEY (`id_dokter`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "dokter"
#

INSERT INTO `dokter` VALUES ('DOK01','Michael Antoni S','michael','123',''),('DOK02','Michael aja','mike','4321','');

#
# Structure for table "operator"
#

DROP TABLE IF EXISTS `operator`;
CREATE TABLE `operator` (
  `id_operator` char(6) NOT NULL DEFAULT '',
  `nama_operator` varchar(50) NOT NULL DEFAULT '',
  `username` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(16) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_operator`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "operator"
#

INSERT INTO `operator` VALUES ('OPR01','budi','budibudi','123456');

#
# Structure for table "pasien"
#

DROP TABLE IF EXISTS `pasien`;
CREATE TABLE `pasien` (
  `id_pasien` char(6) NOT NULL DEFAULT '',
  `nama_pasien` varchar(50) NOT NULL DEFAULT '',
  `username` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(16) NOT NULL DEFAULT '',
  `gender` char(2) DEFAULT NULL,
  `no_telp` char(13) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_pasien`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "pasien"
#

INSERT INTO `pasien` VALUES ('PAS01','nana','nana01','54321',NULL,'08123456789');

#
# Structure for table "review"
#

DROP TABLE IF EXISTS `review`;
CREATE TABLE `review` (
  `id_review` int(11) NOT NULL AUTO_INCREMENT,
  `id_pasien` char(6) NOT NULL,
  `isi_review` text NOT NULL,
  PRIMARY KEY (`id_review`),
  KEY `id_pasien` (`id_pasien`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

#
# Data for table "review"
#

INSERT INTO `review` VALUES (1,'PAS01','erererererererere');

#
# Structure for table "tanggapan"
#

DROP TABLE IF EXISTS `tanggapan`;
CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT,
  `id_dokter` char(6) NOT NULL,
  `id_pasien` char(6) NOT NULL,
  `id_curhatan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `tanggapan` text NOT NULL,
  PRIMARY KEY (`id_tanggapan`),
  KEY `id_dokter` (`id_dokter`),
  KEY `id_pasien` (`id_pasien`),
  KEY `id_curhatan` (`id_curhatan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

#
# Data for table "tanggapan"
#

INSERT INTO `tanggapan` VALUES (1,'DOK01','PAS01',2,'0000-00-00','asasasaaa'),(2,'DOK01','PAS01',1,'2023-12-10','sasasassasa');
