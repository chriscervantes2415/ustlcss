<?php
  $subject_code = $_GET['subject_code'];
  include('../dist/includes/dbcon.php');
  $query = "SELECT units FROM subject WHERE subject_code='$subject_code'";
  $result = mysqli_query($con, $query);
  $row = mysqli_fetch_array($result);
  echo $row['units'];
?>