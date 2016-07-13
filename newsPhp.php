<?php
	//For connecting/saving to Database...such as Title,article,etc
	//since we are connecting to db it will be hardcoded 
	$servername = "ec2-52-201-212-193.compute-1.amazonaws.com";
	$username = "s2016a_user14";
	$password = "s2016a_user14";
	$dbname = "s2016a_user14";
	
	// Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

	//if no connection please die/exit - terminates program - like break
	if (!$conn)
	{
	    die("Connection failed: " . mysqli_connect_error());
	}
	echo "It worked";
	
	//put you query statements
	//passing connection + query -its like mysqldata adapter
	 $sql = "SELECT title, description From NEWS " ;
 
    
	 $result = mysqli_query($conn, $sql) or die("Query: ($sql) [problem]");
	 $fields = mysqli_num_fields($result); //the fields//for each coloumn
	
	 if (mysqli_num_rows($result) > 0) //display all results from query for each row
	 {
	 	$out = mysqli_fetch_row($result);//get these columns
	 	
	 	while($row = mysqli_fetch_row($result)) 
	 	{
            echo " $row["title"]. $row["description"]  ";
        }

	 	
	 }
	 
	 mysqli_close($conn);

?>
