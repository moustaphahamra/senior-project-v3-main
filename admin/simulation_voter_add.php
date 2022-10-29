<?php
include 'includes/session.php';

if (isset($_POST['sim_voters_name'])) {
	$sim_voters_name = $_POST['sim_voters_name'];
	$sim_voters_lastname = $_POST['sim_voters_lastname'];
	$sim_voters_age = $_POST['sim_voters_age'];
	$gender = $_POST['gender'];
	$sim_voters_ethnicity = $_POST['sim_voters_ethnicity'];
	$sim_voters_main_district = $_POST['sim_voters_main_district'];
	$sim_voters_small_district = $_POST['sim_voters_small_district'];
	$list_id = $_POST['list_id'];
	$sim_can_id = $_POST['sim_can_id'];

	$sql = "INSERT INTO 
		sim_voters (sim_voters_name, sim_voters_lastname, sim_voters_age, gender, sim_voters_ethnicity, sim_voters_main_district, sim_voters_small_district, list_id, sim_can_id) 
		VALUES
		 ('$sim_voters_name',
		  '$sim_voters_lastname',
		   '$sim_voters_age', 
		   '$gender',
		   '$sim_voters_ethnicity',
		    '$sim_voters_main_district',
			'$sim_voters_small_district',
			'$list_id',
			'$sim_can_id')";
	if ($conn->query($sql)) {
		$_SESSION['success'] = 'voter added successfully';
		$sql = "SELECT * FROM lists WHERE list_id= $list_id";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();
		$newnumber = $row['list_number_of_votes'] + 1;
		$sql = "UPDATE `lists` SET `list_number_of_votes`=$newnumber WHERE list_id=$list_id";
		$conn->query($sql);


		$sql = "SELECT * FROM simulation_candidate where sim_can_id = $sim_can_id";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();
		echo json_encode($row);
		$newnumber2 = $row['number_of_votes'] +1;
		
		 $sql ="UPDATE `simulation_candidate` SET `number_of_votes`=$newnumber2 WHERE sim_can_id=$sim_can_id";
		 $conn->query($sql);

		 
		// $sql = "UPDATE `result` SET `candidate_sum_votes`=$newnumber2 WHERE sim_can_id=$sim_can_id";
		// $conn->query($sql);

	} else {
		$_SESSION['error'] = $conn->error;
	}
} else {
	$_SESSION['error'] = 'Fill up add form first';
}
