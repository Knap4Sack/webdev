<?php
	session_start();
	if(isset($_SESSION["access_granted"]) && $_SESSION["access_granted"]){
		//echo '<META HTTP-EQUIV="Refresh" Content="0; URL=account.php">';
	}

	$email = "";
	if (isset($_SESSION["email"])){
		$email = $_SESSION["email"];
	}
?>

<div class = banner>
	<img src = "banner-riats.png" alt = "Start the Riats"/>
	<?php
    if (isset($_SESSION["status"])) {
      echo "<div id='status'>" .  $_SESSION["status"] . "</div>";
      unset($_SESSION["status"]);
    }
    ?>
    <?php
    	if($_SERVER["PHP_SELF"] != "/signup.php"){
			echo "<ul id = 'login'>
					<li class = login-statement>Login to your account:</li>

					<form name = 'loginForm' action = 'login-handler.php' method = 'POST'>
						<li class = 'login-user'>
							Username: <input type = 'text' size = '25' name = 'user' value = $email>
						</li>
						<li class = 'login-pass'>
							Password: <input type = 'password' size = '25' name = 'pass'>
						</li>
						<li>
							<input type = 'submit' name = 'submitButtonLogin' value = 'Submit'>
						</li>
					</form>";


				if(isset($_SESSION["access_granted"]) && $_SESSION["access_granted"]){
					//echo '<META HTTP-EQUIV="Refresh" Content="0; URL=account.php">';
					echo "Welcome! <a href = /account.php>My Account</a> | <a href = /logoff.php>Logoff</a>";
				}
				else{
				echo "<li class ='sign-up-link'>
						Don't have an accout? <a href = /signup.php>Sign up!</a>
					</li>";
				}
			echo "</ul>";
		}
	?>
</div>

<div class = "nav-bar">
	<ul>
		<?php 
			if($_SERVER["PHP_SELF"] == "/index.php"){
				echo "<li id = 'current-page'>
				<a href = /index.php>Home</a></li>";
			}
			else{
				echo "<li><a href = /index.php>Home</a></li>";
			}

			if($_SERVER["PHP_SELF"] == "/products.php"){
				echo "<li id = 'current-page'>
				<a href = /products.php>Products</a></li>";
			}
			else{
				echo "<li><a href = /products.php>Products</a></li>";
			}

			if($_SERVER["PHP_SELF"] == "/about.php"){
				echo "<li id = 'current-page'>
				<a href = /about.php>About</a></li>";
			}
			else{
				echo "<li><a href = /about.php>About</a></li>";
			}

			if($_SERVER["PHP_SELF"] == "/contact-us.php"){
				echo "<li id = 'current-page'>
				<a href = /contact-us.php>Contact Us</a></li>";
			}
			else{
				echo "<li><a href = /contact-us.php>Contact Us</a></li>";
			}
		?>
	</ul>
</div>