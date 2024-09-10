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