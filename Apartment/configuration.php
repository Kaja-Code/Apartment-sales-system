<?php
	// The Connection Object
	$conn = new mysqli("localhost","root","","SalesSystem");
	
	// Check Connection
	if( $conn->connect_error )
	{
		die("Connection Failed : ".$conn->connect_error);
	}
?>