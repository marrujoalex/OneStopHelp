<!DOCTYPE HTML>
<html>
<head>
  <meta charset="UTF-8">
  <title>Contact Us!</title>
  <link rel="stylesheet" type="text/css" href="../css/samplestyle.css">
  <style>
  .error {color: #FF0000;}
  .forms {
    margin-left: 15px;
  }
  input, textarea {
    margin-left: 20px;
    width: 350px;
    height: 20px;
    display: block;
    font-family: Arial;
    border: 1px solid #999999;
    -webkit-box-shadow: 0px 0px 8px rgba(0.5, 0, 0, 0.3);
    -moz-box-shadow: 0px 0px 8px rgba(0.5, 0, 0, 0.3);
    box-shadow: 0px 0px 8px rgba(0.5, 0, 0, 0.3);
  }
  </style>
</head>
<body>
<ul>
  <li><a href="index.html">Home</a></li>
  <li><a href="data.html">Donations</a></li>
  <li><a href="events.html">Events</a></li>
  <li><a class="active" href="contact.php">Contact</a></li>
</ul>

<?php 
  // Setting variables for verification towards the contact information
  $name = $email = $comment = $website = "";
  $name_error = $email_error = $comment_error = $website_error = "";

  // Check the data against a testing function to prevent tampering
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
 	if (empty($_POST["name"])) { 
 		$name_error = "Name is required.";
 	} else { $name = varTest($_POST["name"]); }
 	// Checks for letters and white space
 	if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
 		$name_error = "Only letters and white space.";
 	}
 	if (empty($_POST["email"])) {
 		$email_error = "E-mail is required for response.";
 	} else { $email = varTest($_POST["email"]); }
 	// Checks if it's actually an email
 	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 		$email_error = "Invalid email format";
 	}
 	if (empty($_POST["comment"])) {
 		$comment_error = "What was your inquiry about?";
 	} else { $comment = varTest($_POST["comment"]); }
 	if (empty($_POST["website"])) {
 		$website = "";
 	} else { $website = varTest($_POST["website"]); }
 	// Checks for a webpage format address
 	if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) { 
    $website_error = "Invalid URL"; }
 } 

  // Testing function
  function varTest($somedata) {
 	  $somedata = trim($somedata);
 	  $somedata = stripslashes($somedata);
 	  $somedata = htmlspecialchars($somedata);
 	  return $somedata;
  }
?>

<h1>One-Stop Help</h1>

<div class="container"></div>

<p class="one"> Through here you can contact us and let us know either if you want to 
	participate in our cause, or if you may have any inquiries. Please input the information 
	below and we'll get back to you when we can!</p>

<form method="post" action="<?php print(htmlspecialchars($_SERVER["PHP_SELF"]));?>"><br>
  <p id="forms">Name: <span class="error">* <?php echo $name_error;?></span>
    <input type="text" name="name">
  </p>
  <p id="forms">E-mail: <span class="error">* <?php echo $email_error;?></span>
    <input type="text" name="email">
  </p>
  <p id="forms">Website: <span class="error"><?php echo $website_error;?></span>
    <input type="text" name="website">
  </p>
  <p id="forms">Comment: <span class="error">* <?php echo $comment_error;?></span>
    <textarea name="comment" rows="5" cols="40"></textarea>
  </p>
  <input type="submit" name="submit" value="Submit"><br>
</form>
<p><span class="error">* Required field.</span></p>

<p class="one"><a href="index.html">Back</a></p>
<footer>
<div id="footer"><script type="text/javascript">var d = new Date(); document.getElementById("footer").innerHTML = "&copy; MarrujoX Pages " + "Copyright 2006-" + d.getFullYear();</script>
</footer>
</body>
</html>