<?php

?>

<!DOCTYPE html>
<html lang = "en">
<head>
	<link rel="stylesheet" href="css/styles.css">
	<title>Aaron's Portfolio</title>
	<meta charset = "utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

	<header>
	</header>
	
	<nav>
		<ul>
			<li><a href="index.html">Home</a></li>
			<li><a href="education.html">Education</a></li>
			<li><a href="work.html">Previous Work</a></li>
			<li><a href="contact.html">Contact Me</a></li>
                        <li><a href="adminlogin.php">Admin</a></li>
		</ul>
	</nav>
	
	<main>
            <form action="admin.php" method="post">
            <fieldset class="contactInfo">
                <div class="formControl">
                    <label>Username:</label>
                    <input type="text" id="loginUser" name="username" required>
                </div>
                <div class="formControl">
                    <label for="firstName">Password:</label>
                    <input type="password" id="loginPass" name="password" required>
                </div>
                <div class="loginbutton">
                    <input type="submit" value="login">
                </div>
            </fieldset>
            </form>
	</main>
	
	<footer>
	<div class="contact">
	<p>&copy; Copyright 2018. All Rights Reserved.<br>
	Phone: <a href="tel:12085627078">(208) 562-7078</a><br>
	Email: <a href="mailto:brandis621@gmail.com">Brandis621@gmail.com</a></p>
	</div>
	
	<div class="social">
	<p>Connect with me on Social Media:</p>
	<a href="https://www.linkedin.com" target="_blank"><img src="images/linkedin.svg" alt="Linkedin Logo"></a>
	<a href="https://www.github.com" target="_blank"><img src="images/github.svg" alt="GitHub Logo"></a>
	<a href="https://www.youtube.com/channel/UCEpjS2Q7VdE34_qs7R9Rpgw" target="_blank"><img src="images/youtube.svg" alt="Youtube Logo"></a>
	</div>
	
	</footer>
	
</body>
</html>