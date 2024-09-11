DROP DATABASE IF EXISTS deepdive;
CREATE DATABASE IF NOT EXISTS deepdive;
USE deepdive;

CREATE TABLE IF NOT EXISTS `customers` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `firstname` VARCHAR(255),
  `lastname` VARCHAR(255),
  `email` VARCHAR(255) UNIQUE,
  `password` VARCHAR(255),
  `country` VARCHAR(255),
  `isAdmin` BOOLEAN DEFAULT false,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS `products` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(255),
  `description` TEXT,
  `price` DECIMAL(10, 2),
  `stock` INT,
  `imageURL` varchar(255),
  `category` varchar(255)
);

CREATE TABLE IF NOT EXISTS `articles` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `title` VARCHAR(255),
  `author` TEXT,
  `authorURL` varchar(255),
  `content` TEXT,
  `tag` varchar(255),
  `date` timestamp DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE IF NOT EXISTS `payments` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `ownerId` INT,
  `paymentId` VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS `addresses` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `postal` VARCHAR(255),
  `street` VARCHAR(255),
  `country` VARCHAR(255),
  `houseNumber` INT
);

CREATE TABLE IF NOT EXISTS `orders` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `orderOwner` INT,
  `status` ENUM('complete', 'pending', 'cancelled'),
  `orderDate` DATE,
  `totalPrice` DECIMAL(10, 2),
  `addressInformation` INT,
  `paymentInformation` INT
);

CREATE TABLE IF NOT EXISTS `newsletterEmail` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `email` VARCHAR(255)
);

-- Seeder script voor de `orders` tabel
INSERT INTO `orders` (`orderOwner`, `status`, `orderDate`, `totalPrice`, `addressInformation`, `paymentInformation`) VALUES
(1, 'complete', '2023-01-15', 150.75, 1, 1),
(2, 'pending', '2023-02-20', 200.50, 2, 2),
(3, 'cancelled', '2023-03-10', 75.00, 3, 3),
(4, 'complete', '2023-04-05', 300.00, 4, 4),
(5, 'pending', '2023-05-25', 120.25, 5, 5);