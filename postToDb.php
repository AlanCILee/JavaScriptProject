<?php
/*
	ini_set("memory_limit", "-1");

    $servername = "ec2-52-201-212-193.compute-1.amazonaws.com";
    $username = "s2016a_user14";
    $password = "s2016a_user14";
    $dbname = "s2016a_user14";
   	$sql = $_POST['query'];
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    mysqli_set_charset($conn, 'utf8mb4');
    $result = $conn->query($sql) or die("Query: ($sql) [problem]");

   	$conn->close();   */
   	
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
   // $id= ($_POST[""]);



    $query = "UPDATE NEWSTEST SET title='".$title."', author:='".$author."', date='".$date."', description='".$description."' WHERE newsID={$id}";
     
    if (mysqli_query($conn, $query))
	{
		$test = "working";
	}
	
	echo $test;



    mysqli_close($conn);


?>
