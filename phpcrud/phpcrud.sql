SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `toko_laptop` (
  `id` int(5) NOT NULL,
  `merk` varchar(10) NOT NULL,
  `nomor_seri` varchar(15) NOT NULL,
  `tahun_produksi` varchar(10) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `toko_laptop` (`id`, `merk`, `nomor_seri`, `tahun_produksi`) VALUES
(22015, 'Lenovo', 'NXGCRSN0056422', '2010'),
(18922, 'Toshiba', 'F1N0WU00364', '2015'),
(57123, 'ASUS', 'SCFF35925C2B', '2017'),
(87125, 'ACER', 'CNC9502W41', '2019'),
(76522, 'HP', 'MYL78572123', '2018'),;

ALTER TABLE `toko_laptop`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `toko_laptop`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;