<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$can_ethnicity = $_POST['can_ethnicity'];
		$can_age = $_POST['can_age'];
		$can_small_district = $_POST['can_small_district'];
		$can_main_district = $_POST['can_main_district'];
		$cand_list = $_POST['cand_list'];
		$position = $_POST['position'];
		$platform = $_POST['platform'];
		$filename = $_FILES['photo']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}

		$sql = "INSERT INTO candidates (position_id, firstname, lastname, photo, platform,can_ethnicity,can_age,can_small_district,can_main_district,cand_list) VALUES ('$position', '$firstname', '$lastname', '$filename', '$platform','$can_ethnicity','$can_age','$can_small_district','$can_main_district','$cand_list')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Candidate added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: candidates.php');
?>