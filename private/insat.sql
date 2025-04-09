CREATE TABLE `etudiant` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `birthday` datetime NOT NULL,
  `image` varchar(550) NOT NULL,
  `section_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_etudiant_section` (`section_id`),
  CONSTRAINT `fk_etudiant_section` FOREIGN KEY (`section_id`) REFERENCES `section` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
)AUTO_INCREMENT=1 ;


CREATE TABLE `section` (
  `id` int NOT NULL AUTO_INCREMENT,
  `designation` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
)AUTO_INCREMENT=1;



CREATE TABLE `utilisateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `_role` varchar(5) DEFAULT NULL,
  `pwd` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) AUTO_INCREMENT=1;


CREATE VIEW `etudiant_info` AS
SELECT e.id AS id, e.name AS name,e.image AS image, e.birthday AS birthday, s.designation AS section
FROM etudiant e
JOIN section s ON e.section_id = s.id;