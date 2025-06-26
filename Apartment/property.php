<!DOCTYPE HTML>
<html>
	<head> 
	    <title>Property page2 </title>
		<link rel = "icon" href = "Images/icon1.png">
		<link rel = "stylesheet" href = "CSS/property.css">
		<script>
			document.addEventListener("DOMContentLoaded", function() 
			{
				var select_pop = document.getElementById("pop");
				
				select_pop.addEventListener("mousemove", function() {
				alert("If you buy the apartment through the website, you will get 2% discount from the total amount.\n BUY NOW");
				});
			});

		</script>
	</head>
	<body>
		<?php
		require 'configuration.php';
		
		if( isset( $_GET['apartment_Id']))
		{
			$apartment_Id=$_GET['apartment_Id'];
			$sql = "SELECT * FROM Apartments where ID='$apartment_Id'";
			$results = $conn->query($sql);

			if ($results->num_rows > 0) 
			{
				$row = $results->fetch_assoc();				
				$ID = $row["ID"];
				$Name = $row["Name"];
				$Type = $row["Type"];
				$OwnerName = $row["OwnerName"];
				$OwnerNumber = $row["OwnerNumber"];
				$Price = $row["Price"];
				$Address = $row["Address"];
				$Size = $row["Size"];
				$Rooms = $row["Rooms"];
				$Bedrooms = $row["Bedrooms"];
				$Bathrooms = $row["Bathrooms"];
				$Balconys = $row["Balconys"];
				$PropertyAge = $row["PropertyAge"];
				$img1 = $row["Image1"];
				$img2 = $row["Image2"];
				$img3 = $row["Image3"];
				$img4 = $row["Image4"];
						
			   echo '<div id="division">' .
					'<h1 id="name">' . $Name . '</h1>' .
					'<br>' .
					'<div id="imagebox">'.
					'<img src="data:image/jpeg;base64,' . base64_encode($img1) . '" width="600" height="300" class="image">' .
					'<img src="data:image/jpeg;base64,' . base64_encode($img2) . '" width="600" height="300" class="image">' .
					'<img src="data:image/jpeg;base64,' . base64_encode($img3) . '" width="600" height="300" class="image">' .
					'<img src="data:image/jpeg;base64,' . base64_encode($img4) . '" width="600" height="300" class="image">' .
					'</div>'.
					'<div id="sub-division">' .
					'<h4>Property Type : ' . $Type . '</h4>' .
					'<h4>Property Size : ' . $Size . '</h4>' .
					'<h4>Property Age : ' . $PropertyAge . '</h4>' .
					'<h4>Rooms : ' . $Rooms . '</h4>' .
					'<h4>Bedrooms : ' . $Bedrooms . '</h4>' .
					'<h4>Bathrooms : ' . $Bathrooms . '</h4>' .
					'<h4>Balconys : ' . $Balconys . '</h4>' .
					'<h4 id="pop">Price : ' . $Price . '</h4>' .
					'<h4>Address : ' . $Address . '</h4>' .
					'<h4>OwnerName : ' . $OwnerName . '</h4>' .
					'<h4>OwnerNumber : ' . $OwnerNumber . '</h4>' .
					'</div>' .
					'</div>';
			}
		}
		
		else
		{
			echo "No Apartments Here...";
		}

		$conn->close();
		?>
		
		<a href="payment.php"><button id="btn">Buy The Apartment</button></a>

	</body>
</html>