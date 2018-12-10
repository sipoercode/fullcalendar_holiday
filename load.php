<?php 

$koneksi = new PDO('mysql:host=localhost;dbname=fullcalendar', 'root', 'furwadijaya97');

$data = array();

$query = "SELECT * FROM events ORDER BY id";
$eks = $koneksi->prepare($query);
$eks->execute();
$result = $eks->fetchAll();

foreach ($result as  $row) {
	$data[] = array(

		'id'   => $row["id"],
	  'start'   => $row["start_event"],
	  'end'   => $row["end_event"],
	);
}

echo json_encode($data);

 ?>