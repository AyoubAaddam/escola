-- Adminer 4.8.1 MySQL 10.11.3-MariaDB-1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `enrolment`;
CREATE TABLE `enrolment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `enrolment_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`),
  KEY `subject_id` (`subject_id`),
  KEY `teacher_id` (`teacher_id`),
  CONSTRAINT `enrolment_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  CONSTRAINT `enrolment_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`),
  CONSTRAINT `enrolment_ibfk_3` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `qualifications`;
CREATE TABLE `qualifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `qualif` decimal(5,2) DEFAULT NULL,
  `qualif_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`),
  KEY `subject_id` (`subject_id`),
  CONSTRAINT `qualifications_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  CONSTRAINT `qualifications_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `roles` (`id`, `rol`) VALUES
(1,	'students'),
(2,	'teachers')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `rol` = VALUES(`rol`);

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fondo` varchar(255) DEFAULT NULL,
  `idioma` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `settings_ibfk_1` (`user_id`),
  CONSTRAINT `settings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `settings` (`id`, `fondo`, `idioma`, `user_id`) VALUES
(3,	'oscuro',	'en',	7),
(4,	'oscuro',	'en',	7),
(5,	'oscuro',	'en',	15),
(9,	NULL,	'es',	19),
(10,	'oscuro',	'en',	19),
(11,	NULL,	'es',	19),
(12,	'oscuro',	'en',	20),
(13,	'oscuro',	'en',	20)
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `fondo` = VALUES(`fondo`), `idioma` = VALUES(`idioma`), `user_id` = VALUES(`user_id`);

DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `parent_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `students_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `subjects`;
CREATE TABLE `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `teachers`;
CREATE TABLE `teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `department` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `teachers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `rol_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rol_id` (`rol_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`id`, `email`, `passwd`, `rol_id`) VALUES
(1,	'Ayoub@gmail.com',	'ayoub',	1),
(2,	'ayoub@gmail.com',	'ayoub123',	1),
(3,	'toni@gmail.com',	'toni123',	2),
(4,	'ruben@gmail.com',	'$2y$10$0fTDMfYtnLsCtXLUczdN9Ooe4SdxcGTQvVC87ZS8LRn3rAL2tjoJy',	1),
(5,	'jose@gmail.com',	'$2y$10$Zw9JbGyADXH0JO4M.krqzudfpW8I0kbTJIFKGge5fC2h5.8vBWHRa',	2),
(6,	'meseguer@gmail.com',	'$2y$10$z5tvDgCZ4sa5e..KC2b8s..GUJUa8TUkMmOa2bSDdz5LPg.c2.LkK',	2),
(7,	'klk@gmail.com',	'$2y$10$H8WR1p.JL.6rrC14deiWYua4auypm5X1ZXgHk8G0qwYXYxWLEMZxy',	1),
(9,	'ayoub_daw@gmail.com',	'$2y$10$RxbSidvrSoJ6345BT4u9deJ.kqaBfsvyDxvsfbCvvwLrB8/jW0nDW',	1),
(10,	'ayoub_aaddam@gmail.com',	'$2y$10$/CpA6MPgmqsOPZf7al7Fpezw9Xb6OXz7vqiitpQIsoRgS09wcjzsu',	1),
(11,	'ayoub_ejem@gmail.com',	'$2y$10$bE1Wu7kh54UxGoMmNzeS7.iybju.Q9rsMFvOKZPfNPzUtHMZqf9AC',	1),
(15,	'ayoub_ejemplo@gmail.com',	'$2y$10$q3Q5FmDb7PFsuw0WJbIAKeE3efarKdy7cCNSMgYDv4hRp9KoiPHJK',	1),
(19,	'ayoub_2daw2023@gmail.com',	'$2y$10$erdl6K9G7EvLr0s./Da6zecHHKqCc9CWAAiADr6x8a3VVC2IbC5G6',	1),
(20,	'ayoub_adam@gmail.com',	'$2y$10$A/8wWRtyCfyr613G1GP7QOvPf5rSdSQkM5RE.R6Xp32vqmSGl6xxq',	1)
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `email` = VALUES(`email`), `passwd` = VALUES(`passwd`), `rol_id` = VALUES(`rol_id`);

-- 2023-10-30 00:09:12
