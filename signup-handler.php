<?php
require_once "Dao.php";
session_start();
$dao = new Dao("UsrInfo");
if (isset($_POST["submitButtonSignup"]))
{

	$userAuth = preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/", $_POST["username"]);

	$passAuth = preg_match("/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(^[a-zA-Z0-9@\$=!:.#%]+$)/", $_POST["password"]);

	$zipAuth = preg_match("/^\d{5}(?:[-\s]\d{4})?$/", $_POST["zCodeMA"]);

	if($userAuth === 0){
		echo "no match";
		$_SESSION["userAuthenticated"] = false;
	}

	var_dump($_POST["submitButtonSignup"]);
	// $user = $_POST["username"];
	// $pass = $_POST["password"];

	if($passAuth === 0){
		$_SESSION["passAuthenticated"] = false;
	}

	// $mAddress = $_POST["mAddress"];
	if(!isset($_POST["mAddress"]) || $_POST["mAddress"] == ""){
		$_SESSION["mAddress"] = false;
	}
	// $m2Address = $_POST["m2Adress"];

	// $zCodeMA = $_POST["zCodeMA"];


	if($zipAuth === 0){
		$_SESSION["zipAuthenticated"] = false;
	}
	if(!isset($_POST["zCodeMA"]) || $_POST["zCodeMA"] == ""){
		$_SESSION["zCodeMA"] = false;
	}


}
$existingUser = $dao->existingUserCheck($user);
if($existingUser["email"] == $_POST["username"]){
	if($_POST["username"] != "")
	$_SESSION["userExists"] = true;
}
else{
$signupStatus = $dao->insertUser($user, $pass, $mAddress, $m2Address, $zCodeMA);
}
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=signup.php">';
?>