<?php include "db.php"; ?>

<?php 

if(isset($_POST['username'])){

$username = $_POST['username'];
$password = $_POST['password'];


$username = mysqli_real_escape_string ($connection, $username);
$password = mysqli_real_escape_string ($connection, $password);


$query = "SELECT * FROM users WHERE user_username = '{$username}' ";

$select_user_query = mysqli_query($connection, $query);

if(!$select_user_query){


die ("QUERY FAILED". mysqli_error($connection));
}

while ($row = mysqli_fetch_array($select_user_query)) {
	
	echo $db_user_id = $row ['user_id'];
	$db_user_password = $row ['user_password'];
	$db_user_username = $row ['user_username'];
	$db_firstname = $row ['user_firstname'];
	$db_lastname = $row ['user_lastname'];
	$db_user_role = $row ['user_role'];

// if($username !== $db_user_username && $password !== $db_user_password){


// header("Location: ../index.php");

// }




}

}

?>