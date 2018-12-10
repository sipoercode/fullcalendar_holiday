<?php

//update.php

$connect = new PDO('mysql:host=localhost;dbname=fullcalendar', 'root', 'furwadijaya97');

if(isset($_POST["id"]))
{
 $query = "
 UPDATE events 
 SET start_event=:start_event, end_event=:end_event 
 WHERE id=:id
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end'],
   ':id'   => $_POST['id']
  )
 );
}

?>