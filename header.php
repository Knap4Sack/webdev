	
<div class = banner>
	<img src = "banner-riats.png" alt = "Start the Riats"/>
	<ul class = "login">
		<li>Login to your account.</li>
		<li>
			<form>
				Username: <input type = "text" name = "Username">
			</form>
		</li>
		<li>
			<form>
				Passowrd: <input type = "text" name = "Password">
			    <input type = "button" value = "Submit">
			</form>
		</li>
	</ul>
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