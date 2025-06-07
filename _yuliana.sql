/*
 Navicat Premium Dump SQL

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 50739 (5.7.39)
 Source Host           : localhost:3306
 Source Schema         : _yuliana

 Target Server Type    : MySQL
 Target Server Version : 50739 (5.7.39)
 File Encoding         : 65001

 Date: 07/06/2025 20:03:48
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for bahan
-- ----------------------------
DROP TABLE IF EXISTS `bahan`;
CREATE TABLE `bahan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `merk` varchar(255) DEFAULT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bahan
-- ----------------------------
BEGIN;
INSERT INTO `bahan` (`id`, `nama`, `merk`, `satuan`, `keterangan`, `created_at`, `updated_at`, `harga`) VALUES (1, 'bahan A', 'merk', 'buah', '--', '2025-06-07 09:02:54', '2025-06-07 09:02:54', 60000);
COMMIT;

-- ----------------------------
-- Table structure for biaya
-- ----------------------------
DROP TABLE IF EXISTS `biaya`;
CREATE TABLE `biaya` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `bahan_id` int(11) DEFAULT NULL,
  `jenis_id` int(11) DEFAULT NULL,
  `tenaga_kerja_id` int(11) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  `harga_produksi` int(11) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of biaya
-- ----------------------------
BEGIN;
INSERT INTO `biaya` (`id`, `kode`, `nama`, `bahan_id`, `jenis_id`, `tenaga_kerja_id`, `biaya`, `harga_produksi`, `harga_jual`, `created_at`, `updated_at`) VALUES (1, 'BY01', 'produksi 1', 1, 1, 1, 2134, 23423, 2354325, '2025-06-07 11:14:31', '2025-06-07 11:14:31');
COMMIT;

-- ----------------------------
-- Table structure for jenis
-- ----------------------------
DROP TABLE IF EXISTS `jenis`;
CREATE TABLE `jenis` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `kualitas` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jenis
-- ----------------------------
BEGIN;
INSERT INTO `jenis` (`id`, `nama`, `kualitas`, `keterangan`, `created_at`, `updated_at`, `harga`) VALUES (1, 'jenis A', 'okk', 'okk', '2025-06-07 09:00:32', '2025-06-07 09:00:54', 90000);
COMMIT;

-- ----------------------------
-- Table structure for jurnal
-- ----------------------------
DROP TABLE IF EXISTS `jurnal`;
CREATE TABLE `jurnal` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `nominal` varchar(255) DEFAULT NULL,
  `kelompok` varchar(255) DEFAULT NULL,
  `debit` varchar(255) DEFAULT NULL,
  `kredit` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `biaya_id` int(11) DEFAULT NULL,
  `overhead_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jurnal
-- ----------------------------
BEGIN;
INSERT INTO `jurnal` (`id`, `kode`, `nama`, `tanggal`, `nominal`, `kelompok`, `debit`, `kredit`, `keterangan`, `biaya_id`, `overhead_id`, `created_at`, `updated_at`) VALUES (1, 'JU01', 'jurnal 1', '2025-06-07', '100000', 'kelompok', '5000', '6000', 'keterangan', 1, 2, '2025-06-07 11:48:31', '2025-06-07 11:51:54');
COMMIT;

-- ----------------------------
-- Table structure for overhead
-- ----------------------------
DROP TABLE IF EXISTS `overhead`;
CREATE TABLE `overhead` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jumlah` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of overhead
-- ----------------------------
BEGIN;
INSERT INTO `overhead` (`id`, `nama`, `jenis`, `keterangan`, `created_at`, `updated_at`, `jumlah`) VALUES (2, 'overhead 1', 'jenis overhead', '--', '2025-06-07 11:27:45', '2025-06-07 11:27:49', 100);
COMMIT;

-- ----------------------------
-- Table structure for tenaga_kerja
-- ----------------------------
DROP TABLE IF EXISTS `tenaga_kerja`;
CREATE TABLE `tenaga_kerja` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` varchar(255) DEFAULT NULL,
  `pendidikan` varchar(255) DEFAULT NULL,
  `keahlian` varchar(255) DEFAULT NULL,
  `telp` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `upah_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tenaga_kerja
-- ----------------------------
BEGIN;
INSERT INTO `tenaga_kerja` (`id`, `nama`, `tempat_lahir`, `tanggal_lahir`, `agama`, `pendidikan`, `keahlian`, `telp`, `alamat`, `upah_id`, `created_at`, `updated_at`) VALUES (1, 'udin', 'sdf', '2025-06-05', 'ISLAM', 'sfdf', 'dfg', 'kjhkj', 'hkjh', 3, '2025-06-05 13:30:50', '2025-06-07 09:03:31');
COMMIT;

-- ----------------------------
-- Table structure for upah
-- ----------------------------
DROP TABLE IF EXISTS `upah`;
CREATE TABLE `upah` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kode` varchar(255) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of upah
-- ----------------------------
BEGIN;
INSERT INTO `upah` (`id`, `nama`, `created_at`, `updated_at`, `kode`, `jumlah`, `keterangan`) VALUES (1, 'Jenis B', '2025-05-13 16:31:42', '2025-06-05 13:17:41', '2001', 90000, '-');
INSERT INTO `upah` (`id`, `nama`, `created_at`, `updated_at`, `kode`, `jumlah`, `keterangan`) VALUES (3, 'jenia A', '2025-06-05 13:16:53', '2025-06-05 13:16:53', NULL, 150000, '-');
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `roles` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` (`id`, `username`, `name`, `password`, `remember_token`, `created_at`, `updated_at`, `roles`) VALUES (1, 'superadmin', 'superadmin', '$2y$12$r0HAFQIZdiAabhk3HwCdVub716cax1jMnmwKnv76nJz8sJx0M3TB6', NULL, NULL, '2024-12-20 02:49:44', 'superadmin');
INSERT INTO `users` (`id`, `username`, `name`, `password`, `remember_token`, `created_at`, `updated_at`, `roles`) VALUES (11, 'adi', 'adi2', '$2y$12$S8y2eXzZhf7OMrScCfdwT.9EZo6yv7EBZUkrk/faHh3DNzW/7zhPu', NULL, '2025-05-12 23:54:44', '2025-05-12 23:56:31', 'superadmin');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
