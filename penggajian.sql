-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 09 Sep 2023 pada 23.28
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penggajian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int NOT NULL,
  `nip_pegawai` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `kode_jab` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jk_absensi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `hadir` int NOT NULL,
  `sakit` int NOT NULL,
  `mangkir` int NOT NULL,
  `bulan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `nip_pegawai`, `kode_jab`, `jk_absensi`, `hadir`, `sakit`, `mangkir`, `bulan`) VALUES
(1263, '6765382097', 'JA14', 'Laki-laki', 30, 0, 0, '092023'),
(1264, '1139905465', 'JA14', 'Laki-laki', 30, 0, 0, '092023'),
(1265, '0824097041', 'JA14', 'Perempuan', 30, 0, 0, '092023'),
(1266, '7078549120', 'JA14', 'Perempuan', 30, 0, 0, '092023'),
(1267, '8637018734', 'JA14', 'Perempuan', 30, 0, 0, '092023'),
(1268, '6200447047', 'JA14', 'Laki-laki', 30, 0, 0, '092023'),
(1269, '1562289853', 'JA14', 'Perempuan', 30, 0, 0, '092023'),
(1270, '6657310374', 'JA14', 'Laki-laki', 30, 0, 0, '092023'),
(1271, '0712887466', 'JA14', 'Laki-laki', 30, 0, 0, '092023'),
(1272, '5757152761', 'JA14', 'Laki-laki', 30, 0, 0, '092023'),
(1273, '9671729525', 'JA14', 'Perempuan', 30, 0, 0, '092023'),
(1274, '0949524794', 'JA14', 'Laki-laki', 30, 0, 0, '092023'),
(1275, '1605597023', 'JA14', 'Perempuan', 30, 0, 0, '092023'),
(1276, '1542149088', 'JA14', 'Laki-laki', 30, 0, 0, '092023'),
(1277, '4950130749', 'JA14', 'Perempuan', 30, 0, 0, '092023'),
(1278, '8047431218', 'JA14', 'Perempuan', 30, 0, 0, '092023'),
(1279, '9353722616', 'JA14', 'Laki-laki', 30, 0, 0, '092023'),
(1280, '2860779132', 'JA14', 'Perempuan', 30, 0, 0, '092023'),
(1281, '8752269329', 'JA14', 'Laki-laki', 30, 0, 0, '092023'),
(1282, '6239024988', 'JA14', 'Laki-laki', 30, 0, 0, '092023'),
(1283, '9773141128', 'JA14', 'Laki-laki', 30, 0, 0, '092023'),
(1284, '6424214100', 'JA14', 'Perempuan', 30, 0, 0, '092023'),
(1285, '1203253206', 'JA14', 'Laki-laki', 30, 0, 0, '092023'),
(1286, '4321228239', 'JA14', 'Perempuan', 30, 0, 0, '092023'),
(1287, '8692002631', 'JA14', 'Laki-laki', 30, 0, 0, '092023'),
(1288, '7690651178', 'JA14', 'Laki-laki', 30, 0, 0, '092023'),
(1289, '1731480962', 'JA14', 'Laki-laki', 30, 0, 0, '092023'),
(1290, '0879569581', 'JA14', 'Perempuan', 30, 0, 0, '092023'),
(1291, '9893410126', 'JA14', 'Laki-laki', 30, 0, 0, '092023'),
(1292, '6311097729', 'JA14', 'Perempuan', 30, 0, 0, '092023'),
(1293, '5304859243', 'JA14', 'Laki-laki', 30, 0, 0, '092023'),
(1294, '2407176596', 'JA14', 'Laki-laki', 30, 0, 0, '092023'),
(1295, '3623375594', 'JA14', 'Perempuan', 30, 0, 0, '092023'),
(1296, '7498381389', 'JA14', 'Laki-laki', 30, 0, 0, '092023'),
(1297, '2290488690', 'JA14', 'Perempuan', 30, 0, 0, '092023'),
(1298, '2117205356', 'JA14', 'Perempuan', 30, 0, 0, '092023'),
(1299, '8383887507', 'JA14', 'Laki-laki', 30, 0, 0, '092023'),
(1300, '8952505638', 'JA14', 'Perempuan', 30, 0, 0, '092023'),
(1301, '5326857170', 'JA14', 'Perempuan', 30, 0, 0, '092023'),
(1302, '6446572778', 'JA14', 'Perempuan', 30, 0, 0, '092023'),
(1303, '9823026386', 'JA14', 'Laki-laki', 30, 0, 0, '092023'),
(1304, '9318446772', 'JA14', 'Laki-laki', 30, 0, 0, '092023'),
(1305, '7241821122', 'JA14', 'Perempuan', 30, 0, 0, '092023'),
(1306, '8106387615', 'JA14', 'Laki-laki', 30, 0, 0, '092023'),
(1307, '6498677287', 'JA14', 'Perempuan', 30, 0, 0, '092023'),
(1308, '8864851801', 'JA14', 'Laki-laki', 30, 0, 0, '092023'),
(1309, '8340807765', 'JA14', 'Perempuan', 30, 0, 0, '092023'),
(1310, '2764542216', 'JA14', 'Perempuan', 30, 0, 0, '092023'),
(1311, '2287477330', 'JA14', 'Laki-laki', 30, 0, 0, '092023'),
(1312, '7400418351', 'JA14', 'Perempuan', 30, 0, 0, '092023'),
(1313, '6252060615', 'JA14', 'Laki-laki', 30, 0, 0, '092023'),
(1314, '3508182894', 'JA14', 'Laki-laki', 30, 0, 0, '092023'),
(1315, '4208840218', 'JA14', 'Laki-laki', 30, 0, 0, '092023'),
(1316, '5083752018', 'JA14', 'Perempuan', 30, 0, 0, '092023'),
(1317, '9948872606', 'JA14', 'Perempuan', 30, 0, 0, '092023'),
(1318, '6912461670', 'JA14', 'Laki-laki', 30, 0, 0, '092023'),
(1319, '9545685727', 'JA14', 'Perempuan', 30, 0, 0, '092023'),
(1320, '9275811865', 'JA14', 'Laki-laki', 30, 0, 0, '092023'),
(1321, '3825653382', 'JA14', 'Perempuan', 30, 0, 0, '092023'),
(1322, '3410096485', 'JA14', 'Perempuan', 30, 0, 0, '092023'),
(1323, '7258630082', 'JA14', 'Laki-laki', 30, 0, 0, '092023'),
(1324, '6954965898', 'JA14', 'Perempuan', 30, 0, 0, '092023'),
(1325, '7554374141', 'JA14', 'Perempuan', 30, 0, 0, '092023'),
(1326, '5192983622', 'JA14', 'Perempuan', 30, 0, 0, '092023'),
(1327, '3085584951', 'JA14', 'Laki-laki', 30, 0, 0, '092023'),
(1328, '7493282439', 'JA14', 'Laki-laki', 30, 0, 0, '092023'),
(1329, '4973588067', 'JA14', 'Laki-laki', 30, 0, 0, '092023'),
(1330, '3885999455', 'JA14', 'Laki-laki', 30, 0, 0, '092023'),
(1331, '3038692255', 'JA14', 'Laki-laki', 30, 0, 0, '092023'),
(1332, '1806643146', 'JA14', 'Laki-laki', 30, 0, 0, '092023'),
(1333, '6670520824', 'JA14', 'Perempuan', 30, 0, 0, '092023'),
(1334, '9212732089', 'JA14', 'Laki-laki', 30, 0, 0, '092023'),
(1335, '7702276134', 'JA14', 'Perempuan', 30, 0, 0, '092023'),
(1336, '4721501226', 'JA14', 'Perempuan', 30, 0, 0, '092023'),
(1337, '2767324597', 'JA14', 'Perempuan', 30, 0, 0, '092023'),
(1338, '8554951387', 'JA14', 'Laki-laki', 30, 0, 0, '092023'),
(1339, '7725735089', 'JA14', 'Perempuan', 30, 0, 0, '092023'),
(1340, '7322571983', 'JA14', 'Perempuan', 30, 0, 0, '092023'),
(1341, '0792624300', 'JA14', 'Perempuan', 30, 0, 0, '092023'),
(1342, '1978775059', 'JA14', 'Laki-laki', 30, 0, 0, '092023'),
(1343, '1562018809', 'JA14', 'Laki-laki', 30, 0, 0, '092023'),
(1344, '4164282339', 'JA14', 'Laki-laki', 30, 0, 0, '092023'),
(1345, '7704622560', 'JA14', 'Perempuan', 30, 0, 0, '092023'),
(1346, '0678295921', 'JA14', 'Laki-laki', 30, 0, 0, '092023'),
(1347, '2472134428', 'JA14', 'Perempuan', 30, 0, 0, '092023'),
(1348, '0454897197', 'JA14', 'Perempuan', 30, 0, 0, '092023'),
(1349, '1026554683', 'JA14', 'Laki-laki', 30, 0, 0, '092023'),
(1350, '8002362926', 'JA14', 'Laki-laki', 30, 0, 0, '092023'),
(1351, '2118393741', 'JA14', 'Perempuan', 30, 0, 0, '092023'),
(1352, '4557177255', 'JA14', 'Perempuan', 30, 0, 0, '092023'),
(1353, '0702739529', 'JA14', 'Perempuan', 30, 0, 0, '092023'),
(1354, '3059851379', 'JA14', 'Laki-laki', 30, 0, 0, '092023'),
(1355, '3401211617', 'JA14', 'Perempuan', 30, 0, 0, '092023'),
(1356, '209349103943', 'JA04', 'Laki-laki', 30, 0, 0, '092023'),
(1357, '209349103987', 'JA07', 'Laki-laki', 30, 0, 0, '092023'),
(1358, '209349103332', 'JA03', 'Laki-laki', 30, 0, 0, '092023'),
(1359, '201210054', 'JA01', 'Laki-laki', 30, 0, 0, '092023'),
(1360, '209349103903', 'JA02', 'Laki-laki', 30, 0, 0, '092023'),
(1361, '209349103911', 'JA09', 'Laki-laki', 30, 0, 0, '092023'),
(1362, '209349103965', 'JA11', 'Laki-laki', 30, 0, 0, '092023'),
(1363, '209349103999', 'JA05', 'Laki-laki', 30, 0, 0, '092023'),
(1364, '209349103355', 'JA09', 'Laki-laki', 30, 0, 0, '092023'),
(1365, '209349103341', 'JA08', 'Laki-laki', 30, 0, 0, '092023'),
(1366, '209349103375', 'JA13', 'Laki-laki', 30, 0, 0, '092023'),
(1367, '209349103964', 'JA10', 'Laki-laki', 30, 0, 0, '092023'),
(1368, '209349103986', 'JA12', 'Laki-laki', 30, 0, 0, '092023');

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int NOT NULL,
  `nama_divisi` varchar(128) NOT NULL,
  `deskripsi` varchar(128) NOT NULL,
  `ketua_divisi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `nama_divisi`, `deskripsi`, `ketua_divisi`) VALUES
(1002, 'Danru Security', '', 'Mirza Buana'),
(1003, 'Admin Timbangan', '', 'Alfriandri Tanjung'),
(1004, 'IT', '', 'Alfriandri Tanjung'),
(1005, 'Kasir', '', 'Alfriandri Tanjung'),
(1006, 'Adm. Gudang', '', 'Asnadi Sumandri'),
(1007, 'Store Kooper', '', 'Asnadi Sumandri'),
(1008, 'Pengawas Compound', '', 'Ika Syahputra'),
(1009, 'Mandor Compound', '', 'Ika Syahputra'),
(1010, 'Compound', '', 'Ika Syahputra'),
(1011, 'Admin HRD', '', 'Ika Syahputra'),
(1012, 'Admin Payroll', '', 'Ika Syahputra'),
(1013, 'Office Girl', '', 'Ika Syahputra'),
(1014, 'Mandor Proses B', '', 'Farij Jumadi'),
(1015, 'Operator Boiler B', '', 'Farij Jumadi'),
(1016, 'Attandant Operator B', '', 'Farij Jumadi'),
(1017, 'Attandant Operator B', '', 'Farij Jumadi'),
(1018, 'Operator Clarification', '', 'Farij Jumadi'),
(1019, 'Attandant Operator C', '', 'Farij Jumadi'),
(1020, 'Attandant Operator K', '', 'Farij Jumadi'),
(1021, 'Operator Kernel B', '', 'Farij Jumadi'),
(1022, 'Operator Steriliaer B', '', 'Farij Jumadi'),
(1023, 'Attandant Operator S', '', 'Farij Jumadi'),
(1024, 'Operator Loading Rar', '', 'Farij Jumadi'),
(1025, 'Operator Power Hous', '', 'Farij Jumadi'),
(1026, 'Operator Srew Press', '', 'Farij Jumadi'),
(1027, 'Operator Wheel Loader', '', 'Farij Jumadi'),
(1028, 'Operator WTP B', '', 'Farij Jumadi'),
(1029, 'USB Man', '', 'Farij Jumadi'),
(1030, 'Shift Fitter', '', 'Farij Jumadi'),
(1031, 'Mandor Proses A', '', 'M. Bayu Adam'),
(1032, 'Attandant Operator B', '', 'M. Bayu Adam'),
(1033, 'Attandant Operator B', '', 'M. Bayu Adam'),
(1034, 'Operator Clarification', '', 'M. Bayu Adam'),
(1035, 'Attandant Operator C', '', 'M. Bayu Adam'),
(1036, 'Attandant Operator K', '', 'M. Bayu Adam'),
(1037, 'Operator Kernel B', '', 'M. Bayu Adam'),
(1038, 'Operator Steriliaer B', '', 'M. Bayu Adam'),
(1039, 'Attandant Operator S', '', 'M. Bayu Adam'),
(1040, 'Operator Loading Rar', '', 'M. Bayu Adam'),
(1041, 'Operator Power Hous', '', 'M. Bayu Adam'),
(1042, 'Operator Srew Press', '', 'M. Bayu Adam'),
(1043, 'Operator Wheel Loader', '', 'M. Bayu Adam'),
(1044, 'Operator WTP B', '', 'M. Bayu Adam'),
(1045, 'USB Man', '', 'M. Bayu Adam'),
(1046, 'Shift Fitter', '', 'M. Bayu Adam'),
(1047, 'Admin Proses', '', 'M. Bayu Adam'),
(1048, 'Mandor Sortasi', '', 'SUANDI'),
(1049, 'Operator WheelLoader', '', 'Suandi'),
(1050, 'Sortasi', '', 'Suandi'),
(1051, 'KA. Labor', '', 'Hamdan'),
(1052, 'Admin Labor', '', 'Hamdan'),
(1053, 'Analist Cairan', '', 'Hamdan'),
(1054, 'Analist Padatan', '', 'Hamdan'),
(1055, 'Despatch CPO', '', 'Hamdan'),
(1056, 'Despatch Kernel', '', 'Hamdan'),
(1057, 'Helper', '', 'Hamdan'),
(1058, 'Sample Boy', '', 'Hamdan'),
(1059, 'Sample Girl', '', 'Hamdan'),
(1060, 'Mandor Material Balance', '', 'Hamdan'),
(1061, 'Sample Material Balance', '', 'Hamdan'),
(1062, 'Operator Limbah', '', 'Hamdan'),
(1063, 'Attp Op. Limbah', '', 'Hamdan'),
(1064, 'Mandor Maintenance', '', 'Suroto'),
(1065, 'Mandor Maintenance B', '', 'Suroto'),
(1066, 'Admin Maintenance', '', 'Suroto'),
(1067, 'Driver DT Fuso', '', 'Suroto'),
(1068, 'Driver Dump Truck', '', 'Suroto'),
(1069, 'Driver Umum', '', 'Suroto'),
(1070, 'Electrical', '', 'Suroto'),
(1071, 'Oil Man', '', 'Suroto'),
(1072, 'Operator Mesin Bubut', '', 'Suroto'),
(1073, 'Zona 1', '', 'Suroto'),
(1074, 'Zona 2', '', 'Suroto'),
(1075, 'Zona 3', '', 'Suroto'),
(1076, 'Zona 4', '', 'Suroto'),
(1077, 'Zona 5', '', 'Suroto'),
(1078, 'Pimpinan', '', 'Denny Suwanto'),
(1079, 'Contoh divisi', '', 'Contoh Ketua divisi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int NOT NULL,
  `kode_jab` varchar(50) NOT NULL,
  `nama_jabatan` varchar(128) NOT NULL,
  `gaji_pokok` varchar(128) NOT NULL,
  `tunjangan` varchar(128) NOT NULL,
  `lembur` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `kode_jab`, `nama_jabatan`, `gaji_pokok`, `tunjangan`, `lembur`) VALUES
(1, 'JA01', 'Direktur Utama', '5500000', '200000', '250000'),
(2, 'JA02', 'Mill Manager', '4500000', '100000', '150000'),
(3, 'JA03', 'Asisten Kepala', '4500000', '100000', '250000'),
(4, 'JA04', 'KTU', '5500000', '200000', '150000'),
(5, 'JA05', 'KA. HRD', '4500000', '100000', '250000'),
(13, 'JA07', 'KA. Gudang', '4500000', '100000', '150000'),
(14, 'JA08', 'KA. Satgas', '3500000', '100000', '150000'),
(15, 'JA09', 'ASST. Proses', '4500000', '100000', '150000'),
(16, 'JA10', 'SST. Maintenance', '4500000', '200000', '150000'),
(17, 'JA11', 'ASST. Lab', '3500000', '100000', '150000'),
(18, 'JA12', 'Komersial', '4500000', '100000', '250000'),
(19, 'JA13', 'ASST. Sortasi', '3500000', '100000', '150000'),
(20, 'JA14', 'Pegawai', '3000000', '100000', '50000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lembur`
--

CREATE TABLE `lembur` (
  `id_lembur` int NOT NULL,
  `nip_pegawai` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tgl_lembur` datetime NOT NULL,
  `lama_lembur` int NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `lembur`
--

INSERT INTO `lembur` (`id_lembur`, `nip_pegawai`, `tgl_lembur`, `lama_lembur`, `keterangan`) VALUES
(10, '0454897197', '2023-09-06 13:50:00', 2, 'Perbaikan kernel');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` char(20) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `jk_pegawai` enum('Laki-laki','Perempuan') NOT NULL,
  `status` varchar(50) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `kode_jab` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_divisi` char(50) NOT NULL,
  `id_user` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tgl_masuk` date NOT NULL,
  `status_kawin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nama`, `jk_pegawai`, `status`, `agama`, `alamat`, `kode_jab`, `id_divisi`, `id_user`, `tgl_masuk`, `status_kawin`) VALUES
('0454897197', 'Tully Bearward', 'Perempuan', 'Pegawai Tetap', 'Budha', '69566 Mariners Cove Lane', 'JA14', '1013', '0', '2023-03-04', 'Belum Kawin'),
('0678295921', 'Torrin Rosier', 'Laki-laki', 'Kontrak', 'Konghucu', '7295 Northland Lane', 'JA14', '1048', '0', '2023-07-01', 'Sudah Kawin'),
('0702739529', 'Wren Donnersberg', 'Perempuan', 'Pegawai Tetap', 'Hindu', '2914 Rutledge Center', 'JA14', '1074', '0', '2022-10-25', 'Belum Kawin'),
('0712887466', 'Barney Rentcome', 'Laki-laki', 'Kontrak', 'Konghucu', '95677 Buena Vista Trail', 'JA14', '1043', '0', '2023-04-14', 'Sudah Kawin'),
('0792624300', 'Suzi Sabattier', 'Perempuan', 'Pegawai Tetap', 'Hindu', '626 Oriole Road', 'JA14', '1036', '0', '2023-04-23', 'Sudah Kawin'),
('0824097041', 'Alvinia Trask', 'Perempuan', 'Kontrak', 'Kristen Protestan', '565 Bonner Court', 'JA14', '1068', '0', '2022-09-12', 'Sudah Kawin'),
('0879569581', 'Glenn Thirlaway', 'Perempuan', 'Kontrak', 'Kristen Protestan', '48 Eggendart Hill', 'JA14', '1034', '0', '2023-03-28', 'Belum Kawin'),
('0949524794', 'Byron Glassopp', 'Laki-laki', 'Kontrak', 'Kristen Protestan', '28879 Fremont Alley', 'JA14', '1060', '0', '2022-10-25', 'Belum Kawin'),
('1026554683', 'Vally Albarez', 'Laki-laki', 'Kontrak', 'Budha', '86325 Ronald Regan Court', 'JA14', '1084', '0', '2023-05-28', 'Belum Kawin'),
('11092931293', 'Irpan Nawawi', 'Laki-laki', 'Kontrak', 'Islam', 'Prabumulih', 'JA14', '1002', '0', '2023-09-01', 'Sudah Kawin'),
('1139905465', 'Ainslee Landrean', 'Laki-laki', 'Pegawai Tetap', 'Kristen Protestan', '72978 Sunnyside Drive', 'JA14', '1073', '0', '2023-01-30', 'Sudah Kawin'),
('1203253206', 'Fancie Mully', 'Laki-laki', 'Kontrak', 'Hindu', '13346 Fremont Street', 'JA14', '1033', '0', '2022-11-02', 'Belum Kawin'),
('1542149088', 'Carolee Wemyss', 'Laki-laki', 'Pegawai Tetap', 'Hindu', '1 Hovde Court', 'JA14', '1088', '0', '2022-12-11', 'Belum Kawin'),
('1562018809', 'Tessy Atcock', 'Laki-laki', 'Pegawai Tetap', 'Islam', '3550 Mccormick Point', 'JA14', '1071', '0', '2023-02-16', 'Sudah Kawin'),
('1562289853', 'Babs Affleck', 'Perempuan', 'Pegawai Tetap', 'Hindu', '2623 Talisman Junction', 'JA14', '1035', '0', '2023-01-15', 'Belum Kawin'),
('1605597023', 'Camel Hyett', 'Perempuan', 'Pegawai Tetap', 'Islam', '0840 Kim Avenue', 'JA14', '1052', '0', '2022-10-17', 'Belum Kawin'),
('1731480962', 'Gizela Purdie', 'Laki-laki', 'Kontrak', 'Budha', '703 Sundown Trail', 'JA14', '1062', '0', '2022-11-14', 'Belum Kawin'),
('1806643146', 'Raimondo Yankishin', 'Laki-laki', 'Kontrak', 'Kristen Protestan', '7434 Crest Line Terrace', 'JA14', '1007', '0', '2023-08-10', 'Sudah Kawin'),
('1978775059', 'Teresita Polini', 'Laki-laki', 'Pegawai Tetap', 'Hindu', '60160 Sundown Circle', 'JA14', '1045', '0', '2022-11-25', 'Sudah Kawin'),
('201210054', 'Denny Suwanto', 'Laki-laki', 'Pegawai Tetap', 'Islam', 'Gelumbang', 'JA01', '1078', '0', '2022-01-29', 'Sudah Kawin'),
('209349103332', 'Danny Widjaya', 'Laki-laki', 'Pegawai Tetap', 'Islam', 'Gelumbang', 'JA03', '1078', '0', '2023-08-29', 'Sudah Kawin'),
('209349103341', 'Mirza Buana', 'Laki-laki', 'Pegawai Tetap', 'Islam', 'Gelumbang', 'JA08', '1078', '0', '2023-08-29', 'Sudah Kawin'),
('209349103355', 'M. Bayu Adam', 'Laki-laki', 'Pegawai Tetap', 'Islam', 'Gelumbang', 'JA09', '1078', '0', '2023-08-29', 'Sudah Kawin'),
('209349103375', 'Suandi', 'Laki-laki', 'Pegawai Tetap', 'Islam', 'Gelumbang', 'JA13', '1078', '0', '2023-08-18', 'Sudah Kawin'),
('209349103903', 'Doni Irawan', 'Laki-laki', 'Pegawai Tetap', 'Islam', 'Gelumbang', 'JA02', '1078', '0', '2023-08-29', 'Sudah Kawin'),
('209349103911', 'Farij Jumadi', 'Laki-laki', 'Pegawai Tetap', 'Islam', 'Gelumbang', 'JA09', '1078', '0', '2023-08-29', 'Sudah Kawin'),
('209349103943', 'Alfiandri Tanjung', 'Laki-laki', 'Pegawai Tetap', 'Islam', 'Gelumbang', 'JA04', '1078', '9', '2023-08-29', 'Sudah Kawin'),
('209349103964', 'Suroto', 'Laki-laki', 'Pegawai Tetap', 'Islam', 'Gelumbang', 'JA10', '1078', '0', '2023-08-29', 'Sudah Kawin'),
('209349103965', 'Hamdan', 'Laki-laki', 'Pegawai Tetap', 'Islam', 'Gelumbang', 'JA11', '1078', '0', '2023-08-29', 'Sudah Kawin'),
('209349103986', 'Tjie Fut Yung', 'Laki-laki', 'Pegawai Tetap', 'Islam', 'Gelumbang', 'JA12', '1078', '0', '2023-08-29', 'Sudah Kawin'),
('209349103987', 'Asnadi Sumandri', 'Laki-laki', 'Pegawai Tetap', 'Islam', 'Gelumbang', 'JA07', '1078', '0', '2023-08-29', 'Sudah Kawin'),
('209349103999', 'Ika Syahputra', 'Laki-laki', 'Pegawai Tetap', 'Islam', 'Gelumbang', 'JA05', '1078', '2', '2023-08-29', 'Sudah Kawin'),
('2117205356', 'Hobie Deverose', 'Perempuan', 'Pegawai Tetap', 'Hindu', '19297 Schlimgen Hill', 'JA14', '1029', '0', '2023-06-08', 'Belum Kawin'),
('2118393741', 'Wald Clousley', 'Perempuan', 'Kontrak', 'Konghucu', '8 Holmberg Street', 'JA14', '1005', '0', '2022-10-26', 'Sudah Kawin'),
('2287477330', 'Kassi Dodimead', 'Laki-laki', 'Kontrak', 'Hindu', '79892 Oxford Pass', 'JA14', '1083', '0', '2022-11-30', 'Belum Kawin'),
('2290488690', 'Helen Tropman', 'Perempuan', 'Kontrak', 'Konghucu', '47283 Del Mar Alley', 'JA14', '1067', '0', '2022-11-27', 'Belum Kawin'),
('2407176596', 'Gwenore Dehm', 'Laki-laki', 'Kontrak', 'Konghucu', '86305 Meadow Valley Avenue', 'JA14', '1009', '0', '2023-04-23', 'Sudah Kawin'),
('2472134428', 'Tracie Gordge', 'Perempuan', 'Kontrak', 'Kristen Protestan', '265 Mccormick Plaza', 'JA14', '1066', '0', '2023-04-04', 'Sudah Kawin'),
('2764542216', 'Kariotta Sangwine', 'Perempuan', 'Pegawai Tetap', 'Konghucu', '3 Arkansas Hill', 'JA14', '1042', '0', '2023-08-06', 'Belum Kawin'),
('2767324597', 'Salomone Chalfont', 'Perempuan', 'Kontrak', 'Hindu', '6 Kings Hill', 'JA14', '1025', '0', '2023-01-25', 'Sudah Kawin'),
('2860779132', 'Cris Kalberer', 'Perempuan', 'Kontrak', 'Kristen Protestan', '79740 Anthes Lane', 'JA14', '1030', '0', '2023-03-25', 'Sudah Kawin'),
('3038692255', 'Phyllida Stigell', 'Laki-laki', 'Kontrak', 'Budha', '8778 Hermina Circle', 'JA14', '1089', '0', '2023-04-16', 'Belum Kawin'),
('3059851379', 'Zebadiah Bertomier', 'Laki-laki', 'Kontrak', 'Kristen Protestan', '58763 Elgar Park', 'JA14', '1031', '0', '2022-12-14', 'Belum Kawin'),
('3085584951', 'Sandi Maulidika', 'Laki-laki', 'Pegawai Tetap', 'Islam', '73 Del Sol Parkway', 'JA14', '1012', '1', '2023-08-05', 'Belum Kawin'),
('3401211617', 'Zebulen Baitman', 'Perempuan', 'Pegawai Tetap', 'Hindu', '660 Reinke Junction', 'JA14', '1040', '0', '2023-06-17', 'Sudah Kawin'),
('3410096485', 'Marion Rampton', 'Perempuan', 'Pegawai Tetap', 'Budha', '635 Badeau Terrace', 'JA14', '1008', '0', '2023-07-05', 'Belum Kawin'),
('3508182894', 'Ketti Arundale', 'Laki-laki', 'Pegawai Tetap', 'Islam', '8 Chive Terrace', 'JA14', '1072', '0', '2023-06-02', 'Belum Kawin'),
('3623375594', 'Haydon Bartocci', 'Perempuan', 'Kontrak', 'Hindu', '28 Oak Pass', 'JA14', '1076', '0', '2023-07-23', 'Belum Kawin'),
('3825653382', 'Marin Buse', 'Perempuan', 'Pegawai Tetap', 'Konghucu', '7 Melby Park', 'JA14', '1038', '0', '2023-05-12', 'Sudah Kawin'),
('3885999455', 'Patience Wort', 'Laki-laki', 'Kontrak', 'Kristen Protestan', '253 Hauk Junction', 'JA14', '1018', '0', '2023-03-30', 'Belum Kawin'),
('4164282339', 'Thorn Verrier', 'Laki-laki', 'Pegawai Tetap', 'Budha', '19363 Acker Parkway', 'JA14', '1041', '0', '2023-03-31', 'Belum Kawin'),
('4208840218', 'Lamond Dubarry', 'Laki-laki', 'Pegawai Tetap', 'Hindu', '8 Sachs Terrace', 'JA14', '1061', '0', '2023-02-19', 'Sudah Kawin'),
('4321228239', 'Fields Wyleman', 'Perempuan', 'Pegawai Tetap', 'Konghucu', '9418 Tennyson Circle', 'JA14', '1056', '0', '2023-04-08', 'Sudah Kawin'),
('4557177255', 'Warde Strike', 'Perempuan', 'Pegawai Tetap', 'Budha', '5 New Castle Way', 'JA14', '1087', '0', '2023-01-12', 'Sudah Kawin'),
('4721501226', 'Rubin Halsall', 'Perempuan', 'Kontrak', 'Konghucu', '68 Shasta Parkway', 'JA14', '1028', '0', '2023-07-16', 'Sudah Kawin'),
('4950130749', 'Caroljean Wickie', 'Perempuan', 'Kontrak', 'Islam', '04 Ohio Way', 'JA14', '1051', '0', '2023-05-31', 'Belum Kawin'),
('4973588067', 'Pammy Knowling', 'Laki-laki', 'Kontrak', 'Kristen Protestan', '04003 Jay Drive', 'JA14', '1024', '0', '2023-04-22', 'Belum Kawin'),
('5083752018', 'Lindon Neles', 'Perempuan', 'Kontrak', 'Konghucu', '46763 Sachtjen Park', 'JA14', '1050', '0', '2022-12-05', 'Sudah Kawin'),
('5192983622', 'Nial Josh', 'Perempuan', 'Kontrak', 'Konghucu', '9 Dahle Alley', 'JA14', '1065', '0', '2023-01-08', 'Belum Kawin'),
('5304859243', 'Gwen Episcopi', 'Laki-laki', 'Kontrak', 'Kristen Protestan', '7 Bashford Lane', 'JA14', '1023', '0', '2023-01-06', 'Sudah Kawin'),
('5326857170', 'Jarrod Chamberlen', 'Perempuan', 'Pegawai Tetap', 'Islam', '78355 Everett Place', 'JA14', '1081', '0', '2023-02-25', 'Belum Kawin'),
('5757152761', 'Binny Mengo', 'Laki-laki', 'Kontrak', 'Konghucu', '762 Fuller Street', 'JA14', '1090', '0', '2022-12-06', 'Sudah Kawin'),
('6200447047', 'Aurore Lissett', 'Laki-laki', 'Pegawai Tetap', 'Islam', '1 Graedel Road', 'JA14', '1044', '0', '2023-05-06', 'Sudah Kawin'),
('6239024988', 'Denver Beebis', 'Laki-laki', 'Pegawai Tetap', 'Islam', '767 Graceland Lane', 'JA14', '1053', '0', '2022-12-16', 'Belum Kawin'),
('6252060615', 'Keeley Wild', 'Laki-laki', 'Kontrak', 'Budha', '7 Mccormick Avenue', 'JA14', '1055', '0', '2023-03-25', 'Sudah Kawin'),
('6311097729', 'Guenna Valenti', 'Perempuan', 'Kontrak', 'Hindu', '0126 Clarendon Plaza', 'JA14', '1027', '0', '2022-11-05', 'Sudah Kawin'),
('6424214100', 'Erl Bernuzzi', 'Perempuan', 'Pegawai Tetap', 'Budha', '279 Mayfield Road', 'JA14', '1082', '0', '2023-01-31', 'Belum Kawin'),
('6446572778', 'Jeffry Hayle', 'Perempuan', 'Pegawai Tetap', 'Budha', '6099 Milwaukee Pass', 'JA14', '1063', '0', '2022-11-18', 'Belum Kawin'),
('6498677287', 'Jojo Rudderham', 'Perempuan', 'Pegawai Tetap', 'Budha', '01006 Hallows Road', 'JA14', '1075', '0', '2023-08-03', 'Sudah Kawin'),
('6657310374', 'Barby Lamden', 'Laki-laki', 'Kontrak', 'Budha', '9768 Forster Place', 'JA14', '1049', '0', '2023-02-05', 'Belum Kawin'),
('6670520824', 'Revkah Castaner', 'Perempuan', 'Pegawai Tetap', 'Budha', '33 Hagan Street', 'JA14', '1086', '0', '2023-08-21', 'Sudah Kawin'),
('6765382097', 'Agretha Stellin', 'Laki-laki', 'Pegawai Tetap', 'Hindu', '9 Northport Court', 'JA14', '1092', '0', '2023-02-16', 'Sudah Kawin'),
('6912461670', 'Magda Aslen', 'Laki-laki', 'Kontrak', 'Kristen Protestan', '95 Columbus Trail', 'JA14', '1006', '0', '2023-03-19', 'Belum Kawin'),
('6954965898', 'Merilyn Blundan', 'Perempuan', 'Pegawai Tetap', 'Konghucu', '3129 Tony Court', 'JA14', '1010', '0', '2022-10-11', 'Belum Kawin'),
('7078549120', 'Aretha Brunger', 'Perempuan', 'Kontrak', 'Kristen Protestan', '30 Green Terrace', 'JA14', '1046', '0', '2023-01-12', 'Belum Kawin'),
('7241821122', 'Jocelyne Riccardelli', 'Perempuan', 'Kontrak', 'Islam', '10 Dixon Trail', 'JA14', '1078', '0', '2023-04-12', 'Belum Kawin'),
('7258630082', 'Martyn McNamee', 'Laki-laki', 'Pegawai Tetap', 'Budha', '970 Lakewood Point', 'JA14', '1003', '0', '2022-12-24', 'Sudah Kawin'),
('7322571983', 'Sofie Circuit', 'Perempuan', 'Pegawai Tetap', 'Islam', '5449 Haas Hill', 'JA14', '1058', '0', '2023-08-12', 'Belum Kawin'),
('7400418351', 'Kaycee Haggard', 'Perempuan', 'Kontrak', 'Budha', '92783 Pearson Way', 'JA14', '1032', '0', '2023-07-02', 'Belum Kawin'),
('7493282439', 'Pamelina Gherardelli', 'Laki-laki', 'Pegawai Tetap', 'Budha', '3 Bartillon Crossing', 'JA14', '1077', '0', '2023-07-09', 'Sudah Kawin'),
('7498381389', 'Helaine Ring', 'Laki-laki', 'Kontrak', 'Budha', '72374 Forest Run Circle', 'JA14', '1064', '0', '2022-09-25', 'Sudah Kawin'),
('7554374141', 'Morgan Vandenhoff', 'Perempuan', 'Kontrak', 'Konghucu', '2 Mandrake Place', 'JA14', '1020', '0', '2023-07-25', 'Sudah Kawin'),
('7690651178', 'Georgy Fermer', 'Laki-laki', 'Kontrak', 'Islam', '37 Menomonie Terrace', 'JA14', '1069', '0', '2023-01-25', 'Sudah Kawin'),
('7702276134', 'Ricki Francesco', 'Perempuan', 'Pegawai Tetap', 'Budha', '6228 Texas Street', 'JA14', '1039', '0', '2022-10-17', 'Sudah Kawin'),
('7704622560', 'Titus Serjent', 'Perempuan', 'Kontrak', 'Konghucu', '24 Merry Lane', 'JA14', '1017', '0', '2023-03-02', 'Belum Kawin'),
('7725735089', 'Sheffield Roskruge', 'Perempuan', 'Pegawai Tetap', 'Islam', '6 Morrow Avenue', 'JA14', '1091', '0', '2022-09-26', 'Sudah Kawin'),
('8002362926', 'Vinita Rosenfelt', 'Laki-laki', 'Pegawai Tetap', 'Hindu', '94755 Dayton Street', 'JA14', '1059', '0', '2022-10-24', 'Sudah Kawin'),
('8047431218', 'Christoph Utteridge', 'Perempuan', 'Pegawai Tetap', 'Hindu', '080 Summer Ridge Center', 'JA14', '1054', '0', '2023-03-24', 'Belum Kawin'),
('8106387615', 'Johnette Cragoe', 'Laki-laki', 'Pegawai Tetap', 'Kristen Protestan', '934 Lindbergh Point', 'JA14', '1004', '0', '2023-07-24', 'Belum Kawin'),
('8340807765', 'Kally Gosforth', 'Perempuan', 'Kontrak', 'Kristen Protestan', '8 Scott Avenue', 'JA14', '1079', '0', '2023-05-08', 'Belum Kawin'),
('8383887507', 'Inger Squibbes', 'Laki-laki', 'Kontrak', 'Hindu', '2 Welch Place', 'JA14', '1015', '0', '2023-08-29', 'Sudah Kawin'),
('8554951387', 'Sayre Brownsett', 'Laki-laki', 'Pegawai Tetap', 'Islam', '3064 Hoard Way', 'JA14', '1019', '0', '2023-01-17', 'Belum Kawin'),
('8637018734', 'Ashleigh Inchboard', 'Perempuan', 'Pegawai Tetap', 'Hindu', '3935 Calypso Alley', 'JA14', '1094', '0', '2023-02-01', 'Sudah Kawin'),
('8692002631', 'Galina Lars', 'Laki-laki', 'Kontrak', 'Hindu', '201 Russell Circle', 'JA14', '1026', '0', '2023-08-20', 'Sudah Kawin'),
('8752269329', 'Delaney Otto', 'Laki-laki', 'Pegawai Tetap', 'Budha', '038 Maywood Place', 'JA14', '1070', '0', '2023-07-26', 'Belum Kawin'),
('8864851801', 'Joyann Pesic', 'Laki-laki', 'Kontrak', 'Hindu', '6763 Alpine Avenue', 'JA14', '1002', '0', '2022-12-20', 'Belum Kawin'),
('8952505638', 'Jacinta Friedman', 'Perempuan', 'Pegawai Tetap', 'Islam', '33 Emmet Way', 'JA14', '1080', '0', '2023-07-28', 'Belum Kawin'),
('9212732089', 'Rhianon Longhirst', 'Laki-laki', 'Kontrak', 'Kristen Protestan', '0 Hanover Point', 'JA14', '1037', '0', '2023-03-20', 'Sudah Kawin'),
('9275811865', 'Margaretta Burleigh', 'Laki-laki', 'Kontrak', 'Islam', '1413 Kim Alley', 'JA14', '1093', '0', '2023-02-19', 'Belum Kawin'),
('9318446772', 'Jillene Grain', 'Laki-laki', 'Pegawai Tetap', 'Islam', '4 Corben Park', 'JA14', '1014', '0', '2023-01-14', 'Sudah Kawin'),
('9353722616', 'Concordia Tipler', 'Laki-laki', 'Kontrak', 'Hindu', '8047 Northview Center', 'JA14', '1047', '0', '2022-09-14', 'Belum Kawin'),
('9545685727', 'Margalo Folkerd', 'Perempuan', 'Pegawai Tetap', 'Hindu', '18 Meadow Ridge Park', 'JA14', '1085', '0', '2022-09-07', 'Belum Kawin'),
('9671729525', 'Brunhilde Misk', 'Perempuan', 'Kontrak', 'Konghucu', '63 Toban Center', 'JA14', '1021', '0', '2022-10-16', 'Sudah Kawin'),
('9773141128', 'Dimitri Stockbridge', 'Laki-laki', 'Kontrak', 'Konghucu', '5 Eggendart Center', 'JA14', '1057', '0', '2022-12-01', 'Belum Kawin'),
('9823026386', 'Jessa Ziemsen', 'Laki-laki', 'Kontrak', 'Budha', '97365 Magdeline Street', 'JA14', '1016', '0', '2022-10-17', 'Belum Kawin'),
('9893410126', 'Goraud Gierck', 'Laki-laki', 'Kontrak', 'Konghucu', '9181 Luster Center', 'JA14', '1011', '0', '2022-10-31', 'Belum Kawin'),
('9948872606', 'Lydon Samworth', 'Perempuan', 'Pegawai Tetap', 'Budha', '8006 Pankratz Hill', 'JA14', '1022', '0', '2023-01-03', 'Belum Kawin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjaman`
--

CREATE TABLE `pinjaman` (
  `id_pinjaman` int NOT NULL,
  `nip_pegawai` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `besar_pinjaman` int NOT NULL,
  `sisa_pinjaman` int NOT NULL,
  `tenor` int NOT NULL,
  `cicilan` int NOT NULL,
  `tanggal` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `potongan`
--

CREATE TABLE `potongan` (
  `id_potongan` int NOT NULL,
  `hadir` char(11) NOT NULL,
  `sakit` char(11) NOT NULL,
  `mangkir` char(11) NOT NULL,
  `pph21` char(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `bpjskes` char(11) NOT NULL,
  `bpjsnaker` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `potongan`
--

INSERT INTO `potongan` (`id_potongan`, `hadir`, `sakit`, `mangkir`, `pph21`, `bpjskes`, `bpjsnaker`) VALUES
(1, '0', '0', '150000', '0', '35386', '102125');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `nama_lengkap` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `level` enum('admin','pimpinan') NOT NULL,
  `foto_user` varchar(50) NOT NULL,
  `tanggal_klik_gaji` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `username`, `password`, `level`, `foto_user`, `tanggal_klik_gaji`) VALUES
(1, 'Sandi Maulidika', 'admin', '$2y$10$7JsgKdhP.uqImQX84CSMs.TMge/mjSvYxnrxpggs/MnrlL.aoF3pC', 'admin', 'default.svg', '2023-08-27'),
(10, 'Ika Syahputra', 'pimpinan', '$2y$10$mIEZjJJHpZwTEypJ5wrr1ON/P7BP6CheRfkFpqQvH.ozxydEaO0Xa', 'pimpinan', 'default.svg', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indeks untuk tabel `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `lembur`
--
ALTER TABLE `lembur`
  ADD PRIMARY KEY (`id_lembur`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `id_jabatan` (`kode_jab`),
  ADD KEY `id_divisi` (`id_divisi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`id_pinjaman`);

--
-- Indeks untuk tabel `potongan`
--
ALTER TABLE `potongan`
  ADD PRIMARY KEY (`id_potongan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1369;

--
-- AUTO_INCREMENT untuk tabel `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1080;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `lembur`
--
ALTER TABLE `lembur`
  MODIFY `id_lembur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pinjaman`
--
ALTER TABLE `pinjaman`
  MODIFY `id_pinjaman` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `potongan`
--
ALTER TABLE `potongan`
  MODIFY `id_potongan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
