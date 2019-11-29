-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2019 at 08:57 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ezlib`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(70) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  `alamat_admin` varchar(80) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_admin`, `alamat_admin`, `email`) VALUES
(1, 'ardan', '3fc0a7acf087f549ac2b266baf94b8b1', 'Ardan Anjung Kusuma', 'Jl. Sersan Kusman No.27 Bojonegoro', 'ardananjungkusuma@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `nama_buku` varchar(100) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `keterangan_buku` longtext NOT NULL,
  `status_buku` varchar(25) NOT NULL,
  `nama_file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `nama_buku`, `penerbit`, `keterangan_buku`, `status_buku`, `nama_file`) VALUES
(1, 'The Girl With The Dragon Tattoo', 'Stieg Larsson', 'Harriet Vanger, a scion of one of Swedenâ€™s wealthiest families disappeared over forty years ago. All these years later, her aged uncle continues to seek the truth. He hires Mikael Blomkvist, a crusading journalist recently trapped by a libel conviction, to investigate. He is aided by the pierced and tattooed punk prodigy Lisbeth Salander. Together they tap into a vein of unfathomable iniquity and astonishing corruption.', 'Tidak Tersedia', 'img/booksCatalogue/2429135.jpg'),
(2, 'To Kill A Mockingbird', 'Harper Lee', 'The unforgettable novel of a childhood in a sleepy Southern town and the crisis of conscience that rocked it, To Kill A Mockingbird became both an instant bestseller and a critical success when it was first published in 1960. It went on to win the Pulitzer Prize in 1961 and was later made into an Academy Award-winning film, also a classic. required', 'Tersedia', 'img/booksCatalogue/2657.jpg'),
(3, 'Harry Potter and The Prisoner of Azkaban', 'J.K. Rowling', 'Harry Potter\'s third year at Hogwarts is full of new dangers. A convicted murderer, Sirius Black, has broken out of Azkaban prison, and it seems he\'s after Harry. Now Hogwarts is being patrolled by the dementors, the Azkaban guards who are hunting Sirius. But Harry can\'t imagine that Sirius or, for that matter, the evil Lord Voldemort could be more frightening than the dementors themselves, who have the terrible power to fill anyone they come across with aching loneliness and despair. Meanwhile, life continues as usual at Hogwarts. A top-of-the-line broom takes Harry\'s success at Quidditch, the sport of the Wizarding world, to new heights. A cute fourth-year student catches his eye. And he becomes close with the new Defense of the Dark Arts teacher, who was a childhood friend of his father. Yet despite the relative safety of life at Hogwarts and the best efforts of the dementors, the threat of Sirius Black grows ever closer. But if Harry has learned anything from his education in wizardry, it is that things are often not what they seem. Tragic revelations, heartwarming surprises, and high-stakes magical adventures await the boy wizard in this funny and poignant third installment of the beloved series.', 'Tersedia', 'img/booksCatalogue/5.jpg'),
(4, 'The Adventurous Eaters Club: Mastering the Art of Family Mealtime', 'Misha Collins, Vicki Collins', 'TV star Misha Collins and his wife, journalist and historian Vicki Collins, show families how to be mealtime adventurers so that kids might have a lifelong relationship with real food\r\n\r\nChicken nuggets. Hot dogs. Macaroni and cheese. These are just some of the greatest hits we offer kids at mealtime.\r\n\r\nMisha and Vicki Collins totally get it. When their son West was a toddler, he began refusing anything that wasnâ€™t bland and beige. At first, they succumbed, anything to end the mealtime battles. But with sinking hearts they realized fruit snacks and buttered noodles werenâ€™t just void of nutrition, they were setting him up for a lifetime with a limited palate and a reliance on convenience foods. ', 'Tersedia', 'img/booksCatalogue/43884186.jpg'),
(5, 'Animals in Translation: Using the Mysteries of Autism to Decode Animal Behavior', 'Temple Grandin, Catherine Johnson', 'Why would a cow lick a tractor? Why are collies getting dumber? Why do dolphins sometimes kill for fun? How can a parrot learn to spell? How did wolves teach man to evolve?\r\n\r\nTemple Grandin draws upon a long, distinguished career as an animal scientist and her own experiences with autism to deliver an extraordinary message about how animals act, think, and feel. She has a perspective like that of no other expert in the field, which allows her to offer unparalleled observations and groundbreaking ideas.', 'Tidak Tersedia', 'img/booksCatalogue/7366.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `usename` varchar(10) NOT NULL,
  `password` varchar(70) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `alamat_user` varchar(80) NOT NULL,
  `email` varchar(40) NOT NULL,
  `no_hp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `usename`, `password`, `nama_user`, `alamat_user`, `email`, `no_hp`) VALUES
(1, 'Dina', '6ad14ba9986e3615423dfca256d04e3f', 'dina5', 'bojonegoro', 'dina@gmail.com', '085216324525');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
