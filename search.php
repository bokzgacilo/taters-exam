<?php
  require_once 'dbconfig.php';

  $keyword = $_POST['keyword'];

  $query = $db->query("SELECT * FROM user
  WHERE lastname LIKE '$keyword'
  OR municipality LIKE '$keyword'
  OR barangay LIKE '$keyword'
  OR email LIKE '$keyword'
  OR age LIKE '$keyword'
  OR gender LIKE '$keyword'
  OR username LIKE '$keyword'
  OR firstname LIKE '$keyword'
  OR contact LIKE '$keyword'" ) or die("Failed to row row!");

  while($row = $query->fetchArray()){
    // echo $row['municipality'];

    echo "
      <tr>
        <td name='username'>@".$row['username']."</td>
        <td>".$row['lastname']."</td>
        <td>".$row['firstname']."</td>
        <td>".$row['gender']."</td>
        <td>".$row['age']."</td>
        <td>".$row['contact']."</td>
        <td>".$row['email']."</td>
        <td>".$row['street']."</td>
        <td>".$row['barangay']."</td>
        <td>".$row['municipality']."</td>
      </tr>
    "; };

?>