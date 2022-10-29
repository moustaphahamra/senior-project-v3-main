<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$sim_can_name = $_POST['sim_can_name'];
		$sim_can_ethnicity = $_POST['sim_can_ethnicity'];
		$sim_can_age = $_POST['sim_can_age'];
		$sim_can_small_district = $_POST['sim_can_small_district112'];
		$sim_can_main_district = $_POST['sim_can_main_district'];
		$number_of_votes = $_POST['number_of_votes'];
		$sql = "INSERT INTO simulation_candidate
		 (sim_can_name,sim_can_ethnicity,sim_can_age,sim_can_small_district,sim_can_main_district,number_of_votes)
		  VALUES ( '$sim_can_name','$sim_can_ethnicity','$sim_can_age','$sim_can_small_district','$sim_can_main_district','$number_of_votes')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Simulation Candidate added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}
	header('location: tool_simulation.php');
?>