<?php 

  include 'dbconfig.php';

  $insertingData = "INSERT INTO user (
    username, password, lastname, firstname, street, barangay,
    municipality, contact, age, gender, email
  ) VALUES (
  	'".$_POST['Username']."',
    '".$_POST['Password']."',
    '".$_POST['Lastname']."',
    '".$_POST['Firstname']."',
    '".$_POST['Street']."',
    '".$_POST['Barangay']."',
    '".$_POST['Municipality']."',
    '".$_POST['Contact']."',
    '".$_POST['Age']."',
    '".$_POST['Gender']."',
    '".$_POST['Email']."'
  );";

  if($db->exec($insertingData) ){
     echo "Data inserted successfully.";
  }else{
    echo "Sorry, Data is not inserted.";
  }
  
?>