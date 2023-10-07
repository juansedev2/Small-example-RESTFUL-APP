-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-10-2023 a las 19:10:24
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_anime_series`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `series`
--

CREATE TABLE `series` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `seasons_number` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `series`
--

INSERT INTO `series` (`id`, `title`, `description`, `gender`, `seasons_number`, `created_at`, `updated_at`) VALUES
(1, 'Blend-S', 'An comedy serie about facts of the life about waitresses in a coffee shop, in special about Maika, that is a women that has an singular characteristic, she has an threatening look that and for it, she cannot get job, but the coffee shop gives to her a chance. Will Maika do her job well?', 'Comedy, stories of life', 1, '2023-10-05 20:44:01', '2023-10-05 20:44:01'),
(2, 'Hige wo Soru. Soshite Joshi Kōsei wo Hirou.', 'An comedy, drama and romantic serie aboyt Yoshida, an adult that jobs how a great programmer in a great company and Sayu that is a high school girl who ran away from home and need help to recover his life. In the history, Sayu talk about his problems, the reason that she is not in her house and how Yoshida can help her.', 'Comedy, stories of life', 1, '2023-10-05 20:44:01', '2023-10-05 20:44:01'),
(3, 'Neon Genesis Evangelion', 'When violent monsters descend on Earth to destroy humanity, 14-year-old Shinji joins a small squadron of pilots under the command of his father, using giant machines that appear to have minds of their own.', 'Drama, mental horror, rel', 2, '2023-10-05 20:44:01', '2023-10-05 20:44:01'),
(4, 'Ijiranaide, Nagatoro-san', 'High school student Hayase Nagatoro loves to spend her free time doing one thing, and that\'s annoying her Senpai! After Nagatoro and her friends come across the aspiring artist\'s drawings, they enjoy teasing the shy Senpai mercilessly. Nagatoro decides to continue his cruel game and visits him daily so she can force Senpai to do whatever interests her at the moment, especially if it makes him uncomfortable.', 'Romantic Comedy', 2, '2023-10-05 20:44:01', '2023-10-05 20:44:01'),
(5, 'Kommi can\'t communicate', 'Shoko Komi, receives overwhelming popularity for her beauty and elegance that her classmates perceive her to possess. Only Hitohito Tadano, an average student sitting next to hers, has the chance to discover that Komi suffers from Social Anxiety Disorder and communication problems, no matter how much she tries in multiple unsuccessful attempts to talk to anyone. Tadano sets out to help Komi in her quest to overcome her problems and get 100 friends.', 'Commedy, stories of life', 2, '2023-10-05 22:57:14', '2023-10-05 22:57:14'),
(6, 'Naruto', 'A shonen about the adventures of Naruto and his friends since his childhood to adolescence', 'Shonen', 9, '2023-10-05 23:19:39', '2023-10-05 23:55:32');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `series`
--
ALTER TABLE `series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
