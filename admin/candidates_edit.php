<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$position = $_POST['position'];
		$platform = $_POST['platform'];
		$can_ethnicity = $_POST['can_ethnicity'];
		$can_age = $_POST['can_age'];
		$can_small_district = $_POST['can_small_district'];
		$can_main_district = $_POST['can_main_district'];
		$cand_list = $_POST['cand_list'];

		$sql = "UPDATE candidates SET firstname = '$firstname', lastname = '$lastname', position_id = '$position', platform = '$platform', can_ethnicity = '$can_ethnicity', can_age = '$can_age',can_small_district = '$can_small_district',can_main_district = '$can_main_district', cand_list = '$cand_list' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Candidate updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location: candidates.php');

?>