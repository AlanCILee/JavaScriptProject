<?php
	$servername = "ec2-52-201-212-193.compute-1.amazonaws.com";
	$username = "s2016a_user14";
    $password = "s2016a_user14";
    $dbname = "s2016a_user14";

	$returnMsg = "Upload Failed!";
	if(isset($_FILES['myfile']))
	{
		$errors = array();
        $file_name = $_FILES['myfile']['name'];
        $file_size = $_FILES['myfile']['size'];
        $file_tmp = $_FILES['myfile']['tmp_name'];
        $file_type = $_FILES['myfile']['type'];


      /*   if($file_size > 2097152){
            $errors[]='File size must not exceed 2 MB';
         }*/
        // if $errors is EMPTY - upload the img file
        if(empty($errors) == true)
        {
        	move_uploaded_file($_FILES["myfile"]["tmp_name"], "img/agents/" . $_FILES["myfile"]["name"]);

            // echo "Uploaded File :".$_FILES["myfile"]["name"] . "<br>";

        	//echo "<script>document.getElementById('img').innerHTML = 'Upload successful!'</script>";

            $img = "img/agents/" . $_FILES['myfile']['name']; //store image path for sql upload

        }
        else
        {
        	print_r($errors);
        }
	}

	//need the ID
	if (isset($_POST["id"]))
    {
		$rID = intval($_POST["id"]);
	}

	// Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "UPDATE NEWSTEST SET imgsource='".$img."' WHERE agent_ID={$rID}";
	//$result = mysqli_query($conn, $sql);

	if (mysqli_query($conn, $sql))
	{
		$returnMsg = "Image Uploaded!";
	}
    mysqli_close($conn);

    echo 	"<script>
    			alert(\"".$returnMsg."\");
    			window.history.go(-2);
    		</script>";



?>
