<?php
	$servername = "ec2-52-201-212-193.compute-1.amazonaws.com";
	$username = "s2016a_user14";
    $password = "s2016a_user14";
    $dbname = "s2016a_user14";
    $errors = array();


	if(isset($_FILES['myfile']))
	{

        $file_name = $_FILES['myfile']['name'];
        $file_size = $_FILES['myfile']['size'];
        $file_tmp = $_FILES['myfile']['tmp_name'];
        $file_type = $_FILES['myfile']['type'];


        //
        if(empty($errors) == true)
        {
        	move_uploaded_file($_FILES["myfile"]["tmp_name"], "img/news/" . $_FILES["myfile"]["name"]);

            $img = "img/news/" . $_FILES['myfile']['name']; //store image path for sql upload

        }
        else
        {

        }
	}

	//get id
	if (isset($_POST["id"]))
    {
		$id = intval($_POST["id"]);
	}

	// Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "UPDATE NEWS SET Image='".$img."' WHERE newsID={$id}";

    //Do thr query
	if (mysqli_query($conn, $sql))
	{

	}
    echo "<script>
    alert('Upload Worked');
    window.history.go(-1);
    </script>";


    mysqli_close($conn);

?>
