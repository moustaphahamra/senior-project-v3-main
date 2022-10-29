<?php
include 'includes/session.php';
$query = $conn->query($sql);
$small_district_id_array = array();
$small_district_total_seats_array = array();
$number_vote = array();



$sql = "SELECT * FROM `small_district`";
$query = $conn->query($sql);
if ($query->num_rows > 0) {
    // output data of each row
    while ($row = $query->fetch_assoc()) {
        array_push($small_district_id_array, $row['small_district_id']);

        array_push($small_district_total_seats_array, $row["small_district_total_seats"]);
    }
} else {
    echo "0 results";
}
$sql = "SELECT * FROM `lists` inner JOIN small_district on list_small_district = small_district_id";
$query = $conn->query($sql);
if ($query->num_rows > 0) {
    // output data of each row
    while ($row = $query->fetch_assoc()) {
        array_push($number_vote, $list_number_of_votes);
        if ($row['list_number_of_votes'] != 0) {
            // $factorial = $row['list_number_of_votes'] / $row['small_district_total_seats'];
            // echo "factorial=>". $factorial ."<br/>";
            // echo $row['small_district_id'] . "=>" .  $row['list_number_of_votes'] / $factorial . "<br>";
        }
    }
} else {
    echo "0 results";
}




$sql = "SELECT list_small_district,small_district_total_seats,sum(list_number_of_votes) as total FROM `lists` inner join small_district on list_small_district = small_district_id GROUP BY list_small_district";
$query = $conn->query($sql);
if ($query->num_rows > 0) {
    // output data of each row
    while ($row = $query->fetch_assoc()) {
        //    echo $row['list_small_district']. $row['total']  ."<br/>";
        $factorial = $row['total'] / $row['small_district_total_seats'];
        // echo "factorial=>". $factorial ."<br/>";
        if ($row['list_number_of_votes'] != 0) {
            // echo $row['small_district_id'] . "=>" .  $row['total'] / $factorial . "<br>";
        }
    }
    $small_district_id_array_total = count($small_district_id_array);
    $small_district_id_array_index = 0;
    // remove elements
    for ($small_district_id_array_index; $small_district_id_array_index < $small_district_id_array_total; $small_district_id_array_index++) {

        if ($small_district_id_array[$small_district_id_array_index] == "btrn") {
            unset($small_district_id_array[$small_district_id_array_index]);
        }

        echo $small_district_id_array[$small_district_id_array_index] . "<br>";
    }
} else {
    echo "0 results";
}
