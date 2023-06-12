<?php 

$db_server = "localhost";
$db_user = "dbarnes11";
$db_password = "Nyota!1987";
$database = "dbarnes11_dmit2503";

$conn = new mysqli($db_server, $db_user, $db_password, $database);

if ($conn->connect_error) 
{
	die("Connection failed: " . $conn->connect_error);
}
else
{
	// echo "connection good";
}

//This stops SQL Injection in POST vars
foreach ($_POST as $key => $value) {
    $_POST[$key] = mysqli_real_escape_string($conn,$value);
}
//This stops SQL Injection in GET vars
foreach ($_GET as $key => $value) {
    $_GET[$key] = mysqli_real_escape_string($conn,$value);
}


if (!defined("BASE_URL")) 
{
	define("BASE_URL", "https://dbarnes11.dmitstudent.ca/dmit2503/readit/");
}


if (!defined("THIS_PAGE")) {
	define("THIS_PAGE", $_SERVER['PHP_SELF']);
}

?>