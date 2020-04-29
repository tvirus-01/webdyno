<?php

if (isset($_POST['all'])) {
	require_once 'dbcon.php';
	$service = $_POST['service'];

	$sql  = "SELECT * FROM `tbl_products` WHERE product_type = '{$service}'";
	$result = $conn->query($sql);

	$result_array = array();

	while ($row = $result->fetch_assoc()) {
		array_push($result_array, $row);
	}

	header('Content-type: application/json');
	echo json_encode($result_array);
	
}

if (isset($_POST['service_id'])) {
	require_once 'dbcon.php';
	$service = $_POST['service_id'];

	$sql  = "SELECT * FROM `tbl_products` WHERE id = '{$service}'";
	$result = $conn->query($sql);

	$result_array = array();

	while ($row = $result->fetch_assoc()) {
		array_push($result_array, $row);
	}

	header('Content-type: application/json');
	echo json_encode($result_array);
	
}

if (isset($_POST['reviews'])) {
	require_once 'dbcon.php';
	$service = $_POST['reviews'];

	$sql  = "SELECT * FROM `tbl_reviews` WHERE service_id = '{$service}'";
	$result = $conn->query($sql);

	$result_array = array();

	while ($row = $result->fetch_assoc()) {
		array_push($result_array, $row);
	}

	header('Content-type: application/json');
	echo json_encode($result_array);
	
}