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