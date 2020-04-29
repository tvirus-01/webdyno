<?php

include 'dbcon.php';

$sql = "CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB";
$conn->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS `tbl_user_meta` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `meta_key` varchar(20) NOT NULL,
  `meta_value` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB";
$conn->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS `tbl_reviews` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `service_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `review` varchar(500) NOT NULL,
  `date` DATE NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB";
$conn->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS `tbl_products` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `product_title` varchar(100) NOT NULL,
  `product_details` LONGTEXT NOT NULL,
  `product_short_details` varchar(100) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_type` varchar(100) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `product_rating` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB";
$conn->query($sql);