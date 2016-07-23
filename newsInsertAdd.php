<?php

   	
   	$test = "is it working";

    $servername = "ec2-52-201-212-193.compute-1.amazonaws.com";
    $username = "s2016a_user14";
    $password = "s2016a_user14";
    $dbname = "s2016a_user14";
    //$sql = $_POST['query'];
    $conn = mysqli_connect($servername, $username, $password, $dbname);


    // Check connection
    if (!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    //can add isset to test if not null or do it in application side
    $title = $_POST["title"];
    $author= $_POST["author"];
    $date = $_POST["date"];
    $desc = $_POST["desc"];
    $img= $_POST["image"];
    $id= intval($_POST["id"]);
    
    //Remeber you have to change these values when you change columns amount
	$sql = "INSERT INTO NEWSTEST (title, author, date, description) " ;
 	$sql .="VALUES (?, ?, ?, ?) " ;
    
    	//$sql .="VALUES (?, ?, ?, ?, ?) " ;

	//make var named statement, assigns it to a Connection object being accessed by prepare to use the query
  	if($statement = $conn->prepare($sql))
    { 
    /* NOTE 
            //The argument may be one of four types:
        //i - integer
        //d - double
        //s - string
        //b - BLOB
         */
         //In the bind param first attribute this means first one is a string string string string string
         
         //I really should have auto incremented in DB
         //Apparently you cant use this to add image string?
         $statement->bind_param("ssss", $title, $author, $date, $desc);
    	//$statement->bind_param("ssssi", $title, $author, $date, $img, $id);
    	
    	if ($statement->execute())
    	{
			$test = "Success";
		}
		else
		{
			$test = "Failure";
		}
    }
    
	echo $test;



    mysqli_close($conn);


?>
