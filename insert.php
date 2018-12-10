<?php

//insert.php

$connect = new PDO('mysql:host=localhost;dbname=fullcalendar', 'root', 'furwadijaya97');

 $query = "
 INSERT INTO events 
 (start_event, end_event) 
 VALUES (:start_event, :end_event)
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end'],
  )
 );


?>