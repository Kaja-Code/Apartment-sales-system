<?php
	require 'configuration.php';
	
	if (isset($_POST['btn'])) {
		// Retrieve form data
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		
		// Prepare SQL statement
		$sql = "INSERT INTO feedback(name, email, message) VALUES('$name', '$email', '$message')";
		
		// Execute SQL statement
		if ($conn->query($sql)) 
		{
			echo "Thank you for your feedback, $name!";
			header("Location: index.php");
			exit();
		}
	
		else 
		{
				echo "Error: ".$conn->error;
		}
	}
		// Close connection
		$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Feedback Page</title>
	<link rel="stylesheet" href="CSS/feedback.css">
</head>
<body style="background-color:#68D2E8;">
	<div>
		<h1>Give Feedback Here...</h1>
	  
		<form id="feedbackForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
			<label for="name">Your Name : </label>
			<input type="text" id="name" name="name" required><br><br>
		
			<label for="email">Your Email : </label>
			<input type="email" id="email" name="email" required><br><br>
		
			<label for="message">Your Feedback : </label>
			<textarea id="message" name="message" rows="4" required></textarea><br><br>
		
			<button type="submit" name="btn">Submit Feedback</button>
		</form>
	</div>
</body>
</html>
