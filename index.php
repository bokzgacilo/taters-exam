<?php
	session_start();

	if(isset($_SESSION['id']) && isset($_SESSION['username'])){
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
	<script
    src="jquery.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>
	<title>Welcome @<?php echo $_SESSION['username']; ?></title>
</head>
<body>
	<div class="container">
		<div class='dashboard'>
			<div class="greeting">
				<h3>Hello @<?php echo $_SESSION['username']; ?>, welcome to my Test Page</h3>
				<a href="signout.php">Sign Out</a>
			</div>
			<div class="action-menu">
				<input type="text" name='SearchBar' placeholder='Enter Filter'>
				<button id='search-button'>Search</button>
			</div>
			<table>
				<thead>
					<th>Username</th>
					<th>Lastname</th>
					<th>Firstname</th>
					<th>Gender</th>
					<th>Age</th>
					<th>Contact</th>
					<th>Email</th>
					<th>Street</th>
					<th>Barangay</th>
					<th>Municipality</th>
				</thead>

				<tbody class='table-body'>
					<?php
						include 'dbconfig.php';

						$sql = "SELECT * FROM user";
						$query = $db->query($sql);

						while($row = $query->fetchArray()){
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
							"; }
					?>
				</tbody>
			</table>
		</div>
	</div>
	<script>
		$(document).ready(function(){

			$("#search-button").click(function(){
				var keyword =  $('input[name="SearchBar"]').val();

				if(keyword === ""){
					alert("no value");
				}else{
					search(keyword);
				}
				
			})
		})

		function search(searchText){
				$.ajax({
					url: 'search.php',
					type: 'POST',
					data: {
						keyword:  searchText
					},
					success: function(data){
						$('.table-body').html(data);
					}
				});
			}
	</script>
</body>
</html>

<?php
}else{
  header("Location: signin-page.php");
  exit();
}
?>
