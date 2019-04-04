<?php
try {
    require_once "database.php";
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
    $db = Database::getDB();
    // Get employee ID
    $employee_id = filter_input(INPUT_GET, 'employee_id', FILTER_VALIDATE_INT);
        if ($employee_id == NULL || $employee_id == FALSE) {
            $employee_id = 1;
        }
    
    // Get name for selected employee
    $queryemployee = 'SELECT * FROM employees
                          WHERE EmployeeID = :employee_id';
    $statement1 = $db->prepare($queryemployee);
    $statement1->bindValue(':employee_id', $employee_id);
    $statement1->execute();
    $employee = $statement1->fetch();
    $employee_name = $employee['EmployeeName'];
    $statement1->closeCursor();
    
    // Get all Employees
    $queryAllEmployees = 'SELECT * FROM employees
                               ORDER BY EmployeeID';
    $statement2 = $db->prepare($queryAllEmployees);
    $statement2->execute();
    $employees = $statement2->fetchAll();
    $statement2->closeCursor();
    
    // Get replies for selected employee
    $queryReplies = 'SELECT * FROM replies
                  WHERE EmployeeID = :employee_id
                  ORDER BY ReplyID';
    $statement3 = $db->prepare($queryReplies);
    $statement3->bindValue(':employee_id', $employee_id);
    $statement3->execute();
    $replies = $statement3->fetchAll();
    $statement3->closeCursor();

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
            <h1 class="work">Admin</h1>
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
            <div id="container">
                <div id="flex-container">
                    <aside>
                        <!-- display a list of categories -->
                        <h2>Employees</h2>
                        <ul>
                            <?php foreach ($employees as $employee) : ?>
                            <li>
                                <a href="?employee_id=<?php echo $employee['EmployeeID']; ?>">
                                    <?php echo $employee['EmployeeName']; ?>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>          
                    </aside>
                    <section>
                        <!-- display a table of replies from employees -->
                        <h2><?php echo $employee_name; ?></h2>
                        <table align="center" class="adminTable">
                            <tr>
                                <th>Employee ID</th>
                                <th>Reply ID</th>
                                <th>Email</th>
                                <th>Reply</th>
                                <th>Delete</th>
                            </tr>

                            <?php foreach ($replies as $reply) : ?>
                            <tr>
                                <td><?php echo $reply['EmployeeID']; ?></td>
                                <td><?php echo $reply['ReplyID']; ?></td>
                                <td><?php echo $reply['ReplyEmail']; ?></td>
                                <td><?php echo $reply['ReplyText']; ?></td>
                                <td><form class="button" action="delete.php" method="post">
                                        <input type="hidden" name="reply_id"
                                                value="<?php echo $reply['ReplyID']; ?>">
                                         <input type="submit" value="Delete">
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>            
                        </table>
                    </section>
                </div>
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