<%@ Page Language="C#" %>
<%@ Import Namespace="System.Data.SqlClient" %>

<!DOCTYPE html>
<script runat="server">
    protected void submitButton_Click(object sender, EventArgs e)
    {
        if (Page.IsValid)
        {
            // Code that uses the data entered by the user
            // Define data objects
            SqlConnection conn;
            SqlCommand comm;
            // Read the connection string from Web.config
            string connectionString =
                ConfigurationManager.ConnectionStrings[
                "evajones"].ConnectionString;
            // Initialize connection
            conn = new SqlConnection(connectionString);
            // Create command 
            comm = new SqlCommand("EXEC sp_insertVisitor @fnameTextBox,@lnameTextBox,@emailTextBox,@companyTextBox, @msgTextBox", conn);
            comm.Parameters.Add("@fnameTextBox", System.Data.SqlDbType.NChar, 50);
            comm.Parameters["@fnameTextBox"].Value = fname.Text;

            comm.Parameters.Add("@lnameTextBox", System.Data.SqlDbType.NChar, 50);
            comm.Parameters["@lnameTextBox"].Value = lname.Text;

            comm.Parameters.Add("@emailTextBox", System.Data.SqlDbType.NChar, 50);
            comm.Parameters["@emailTextBox"].Value = email.Text;

            comm.Parameters.Add("@companyTextBox", System.Data.SqlDbType.NChar, 50);
            comm.Parameters["@companyTextBox"].Value = company.Text;

            comm.Parameters.Add("@msgTextBox", System.Data.SqlDbType.NChar, 200);
            comm.Parameters["@msgTextBox"].Value = message.Text;


            // Enclose database code in Try-Catch-Finally
            try
            {
                // Open the connection
                conn.Open();
                // Execute the command
                comm.ExecuteNonQuery();
                // Reload page if the query executed successfully
                Response.Redirect("messagesent.html");
            }
            catch (SqlException ex)
            {
                // Display error message
                dbErrorMessage.Text =
                   "Error submitting the data!" + ex.Message.ToString();

            }
            finally
            {
                // Close the connection
                conn.Close();
            }
        }
    }

</script>

<html xmlns="http://www.w3.org/1999/xhtml">

<head runat="server">
	<link rel="stylesheet" href="css/styles.css"/>
	<title>Aaron's Portfolio</title>
	<meta charset = "utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
</head>
<body>

	<header>
	<h1 class="work">Contact Me</h1>
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
		<h3>Complete the form below and I will get back to you soon!</h3>
		
		<form name="contactForm" runat="server"><!--Start Form-->
			<fieldset class="contactInfo">
				<div class="formControl">
					<label>First Name:</label>
                    <asp:TextBox ID="fname" runat="server" required="required" />
				</div>

				<div class="formControl">
					<label>Last Name:</label>
                    <asp:TextBox ID="lname" runat="server" required="required" />
				</div>

				<div class="formControl">
					<label>Email:</label>
                    <asp:TextBox ID="email" runat="server" required="required" />
				</div>

				<div class="formControl">
					<label>Company:</label>
                    <asp:TextBox ID="company" runat="server"/>
				</div>

				<div class="formControl">
					<label>Comments:</label>
                    <asp:TextBox ID="message" runat="server" required="required" /><br/>
				</div>

				<div class="formControl">
					<asp:Button ID="submitButton" runat="server"
                    Text="Submit" onclick="submitButton_Click"/><br/>
                    <asp:Label ID="dbErrorMessage" runat="server"></asp:Label>
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