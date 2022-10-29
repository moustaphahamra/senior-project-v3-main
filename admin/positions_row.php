<?php
include 'includes/session.php';

if (isset($_POST['id'])) {
	$id = $_POST['id'];
	$sql = "SELECT * FROM positions WHERE id = '$id'";
	$query = $conn->query($sql);
	$row = $query->fetch_assoc();

	echo json_encode($row);
}


if (isset($_POST['selectSmall'])) {
	$id = $_POST['selectSmall'];
	$sql = "SELECT small_district.small_district_id, small_district.small_district_name, main_district.main_district_id , main_district.main_district_name
	FROM main_district INNER JOIN small_district
	ON main_district.main_district_id = small_district.main_district_id  
	WHERE small_district.small_district_name ='$id'";

	$query = $conn->query($sql);
	$row = $query->fetch_assoc();


	echo json_encode($row);
}
if (isset($_POST['idMainDis'])) {
	$list_name = $_POST['list_name'];
	$list_candidate = $_POST['list_candidate'];
	$conceptName = $_POST['conceptName'];
	$smallDistrictID = $_POST['smallDistrictID'];
	$idMainDis = $_POST['idMainDis'];
	$list_number_of_votes = $_POST['list_number_of_votes'];
	$simulationCandidate = $_POST['simulationCandidate'];

	$sql = "INSERT INTO `lists`( `list_name`, `list_candidate`, `list_main_district`, `list_small_district`, `list_number_of_votes`)
		 VALUES ('$list_name','$simulationCandidate','$idMainDis','$smallDistrictID','$list_number_of_votes')";
	$query = $conn->query($sql);
}

if (isset($_POST['listName'])) {

	$listName = $_POST["listName"];
	$sql = "SELECT * FROM `lists` WHERE list_small_district = 'zhlh'";
	$query = $conn->query($sql);
	$row = $query->fetch_assoc();

	echo json_encode($row);
}
