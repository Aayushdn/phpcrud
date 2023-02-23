-- create database

CREATE DATABASE IF NOT EXISTS `users` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `users`;

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

DROP TABLE IF EXISTS `auth`;
CREATE TABLE `auth` (
  `id` int(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
COMMIT;
