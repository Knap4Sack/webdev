<?php
require_once "Dao.php";
session_start();
$dao = new Dao("UsrInfo");
echo "phase1";
$status = "Invalid username or password";
if (isset($_POST["submitButtonLogin"]))
{
	echo "phase2";
	$user = $_POST["user"];
	$userAuth = preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/", $_POST["user"]);
	if($userAuth === 0){
		echo "no match";
		$_SESSION["access_granted"] = false;
		$_SESSION["status"] = $status;
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
		die();
	}
	$pass = $_POST["pass"];
	$passAuth = preg_match("/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(^[a-zA-Z0-9@\$=!:.#%]+$)/", $_POST["pass"]);
	if($passAuth === 0){
		$_SESSION["access_granted"] = false;
		$_SESSION["status"] = $status;
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
		die();
	}
}
$loginStatus = $dao->login($user, $pass);
echo "phase3";
if($loginStatus["password"] == $pass && $loginStatus["password"] != ""){
var_dump($loginStatus);
	$_SESSION["access_granted"] = true;
	$_SESSION["email"] = $user;
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=account.php">';
}
else {
	$_SESSION["status"] = $status;
	$_SESSION["email"] = $user;
	$_SESSION["access_granted"] = false;
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
}
?>