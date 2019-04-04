<!DOCTYPE html>
<html>
    <!-- the head section -->
    <head>
        <link rel="stylesheet" href="css/styles.css">
        <title>Aaron's Portfolio</title>
    </head>

    <!-- the body section -->
    <body>
    <nav>
	<ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="education.html">Education</a></li>
            <li><a href="work.html">Previous Work</a></li>
            <li><a href="contact.html">Contact Me</a></li>
            <li><a href="admin.php">Admin</a></li>           
	</ul>
    </nav>
    <main>
        <div id="container">
        <h1 class="work">Database Connection Error</h1>
        <p class="work">There was an error connecting to the database.<br>
                        Please contact the site administrator</p>
        <p class="work">Error message: <?php echo $error_message; ?></p>
        </div>
    </main>
        <footer>
	<div class="contact">
	<p>&copy; Copyright 2018. All Rights Reserved.<br>
	Phone: <a href="tel:12085627078">(208) 562-7078</a><br>
	Email: <a href="mailto:brandis621@gmail.com">Brandis621@gmail.com</a></p>
	</div>
	
	<div class="social">
	<p>Connect with me on Social Media:</p>
	<a href="https://www.linkedin.com" target="_blank">
		<img src="images/linkedin.svg" alt="Linkedin Logo"></a>
	<a href="https://www.github.com" target="_blank">
		<img src="images/github.svg" alt="GitHub Logo"></a>
	<a href="https://www.youtube.com/channel/UCEpjS2Q7VdE34_qs7R9Rpgw" target="_blank">
		<img src="images/youtube.svg" alt="Youtube Logo"></a>
	</div>
	
	</footer>
    </body>
    
</html>