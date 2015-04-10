<HTML>
<Head>
	<Title>Sign Up! - Can't stop the Riats</Title>
	<link rel = "stylesheet" type = "text/css" href = "layout.css"/>
	<link rel="icon" type="image/png" href="favicon.png">
</Head>
<Body>
	<?php include "header.php"; ?>

	<div id = "signup-page">
		<ul id = "signup-form">
			<div class = signup-statement>Welcome to Riats!</div>
				<form name = "signupForm" action = "signup-handler.php" method = "POST">
					<li>
						*Username: <input type = "text" name = "username">
						<?php
							if($_SESSION["userAuthenticated"] === false && isset($_SESSION["userAuthenticated"])){
								echo "<span class = 'signup-error'>Not a valid e-mail</span>";
							}
							if($_SESSION["userExists"] === true){
								echo "<span class = 'signup-error'>This user already exists</span>";
							}
						?>
					</li>
					<li>
						*Password: <input type = "password" name = "password">
						<?php
							if($_SESSION["passAuthenticated"] === false && isset($_SESSION["passAuthenticated"])){
								echo "<span class = 'signup-error'>Not a valid password</span>";
							}
						?>
						<div class = "pass-requirements">
						Password must be over 8 characters long and must contain 1 or more capital letter(s), 
						lowercase letters, and 1 or more number(s).
						</div>
					</li>
					<li>
						*Mailing Address: <input type = "text" name = "mAddress">
						<?php
							if($_SESSION["mAddress"] === false){
								echo "<span class = 'signup-error'>Required field</span>";
							}
						?>
					</li>
					<li>
						Address 2: <input type = "text" name = "m2Adress">
					</li>
					<li>
						*Zip Code: <input type = "text" name = "zCodeMA">
						<?php
							if($_SESSION["zipAuthenticated"] === false && isset($_SESSION["zipAuthenticated"])){
								echo "<span class = 'signup-error'>Not a valid zip code</span>";
							}
							if($_SESSION["zCodeMA"] === false){
								echo "<span class = 'signup-error'>Required field</span>";
							}
						?>
					</li>
					<li>
						<input type = "submit" name = "submitButtonSignup" value = "Submit">
					</li>
				</form>
		</ul>
	</div>

	<?php include "footer.php"; ?>
	<!-- <?php session_destroy() ?> -->
</Body>
</HTML>