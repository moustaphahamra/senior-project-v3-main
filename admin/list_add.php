<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$list_name = $_POST['list_name'];
		$list_candidate = $_POST['list_candidate'];
		$list_small_district = $_POST['list_small_district'];
		$list_main_district = $_POST['list_main_district'];
		$list_number_of_votes = $_POST['list_number_of_votes'];
	

		$sql = "INSERT INTO lists (list_name,list_candidate,list_small_district,list_main_district,list_number_of_votes) VALUES ( '$list_name','$list_candidate','$list_small_district','$list_main_district','$list_number_of_votes')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'list added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: list.php');
?>