<?php
/*http://ec2-52-201-212-193.compute-1.amazonaws.com/phpmyadmin/*/
    $servername = "ec2-52-201-212-193.compute-1.amazonaws.com";
    $username = "s2016a_user18";
    $password = "s2016a_user18";
    $dbname = "s2016a_user18";
  
 // ==================       img input        =======================     
	if(isset($_FILES['myfile'])){
	      $errors= array();
	      $file_name = $_FILES['myfile']['name'];
	      $file_size =$_FILES['myfile']['size'];
	      $file_tmp =$_FILES['myfile']['tmp_name'];
	      $file_type=$_FILES['myfile']['type'];
	     

	      if(empty($errors)==true){
	         move_uploaded_file($_FILES["myfile"]["tmp_name"],
	                                "../" . $_FILES["myfile"]["name"]);
	                                

	     echo "<script>document.getElementById('img').innerHTML = 'Upload successful!'</script>";
	      
	          $img = $_FILES['myfile']['name']; //store image path for sql upload
	          
	      }else{
	         print_r($errors);
	      }
	   }
 
// ==============================     create sql connection     ================================

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

//============================     upload NEW POST     ===============================

 if(isset($_POST['newPost'])) 
  { 
    $address = $_POST["address"];
    $city = $_POST["city"];
    $postal = $_POST["postal"];
    $room = $_POST["rooms"];
    $bath = $_POST["baths"];
    $category = $_POST["category"]; 
    $descp = $_POST["description"];
    $sqft = $_POST["squareF"];
    $price = $_POST["Price"];

    $sql = "INSERT INTO formTest (address, city, postalCode, roomCnt, bathCnt, category, description, sqFt,price, imgPath) " ;
    $sql .="VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ? ) " ;
    
    
    if($statement = $conn->prepare($sql))
    	{

        $statement->bind_param("sssiissiis", $address, $city, $postal, $room, $bath, $category, $descp, $sqft, $price, $img);
        $statement->execute();
        
        $conn->close();
       }

//=================     Display new results after INSERT     ======================= 
 
  		echo "<script>
			alert('New post uploaded successfully');
			window.history.go(-1);
		</script>";		     
  } 

//==================     UPDATE action     =============================
  
if(isset($_POST['update'])) 
  {  

	$fieldsForUpdate = [];

    if(!empty($_POST["address"])) {
    	$address = $_POST["address"];
    	$fieldsForUpdate[] = "address = '$address'";
	}
	
	if(!empty($_POST["city"])) {
    	$city = $_POST["city"];
    	$fieldsForUpdate[] = "city = '$city'";
	}

	if(!empty($_POST["postal"])) {
    	$postal = $_POST["postal"];
    	$fieldsForUpdate[] = "postalCode = '$postal'";
	}

	if(!empty($_POST["rooms"])){
    	$room = $_POST["rooms"];
    	$fieldsForUpdate[] = "roomCnt = $room";
	}
	
	if(!empty($_POST["baths"])){
	    $bath = $_POST["baths"];
	    $fieldsForUpdate[] = "bathCnt = $bath";
	}
	
	if(!empty($_POST["category"])){
  		$category = $_POST["category"];
     	$fieldsForUpdate[] = "category = '$category'";
	}
	if(!empty($_POST["description"])){
    	$descp = $_POST["description"];
     	$fieldsForUpdate[] = "description = '$descp'";
	}
	if(!empty($_POST["squareF"])){
	    $sqft = $_POST["squareF"];
     	$fieldsForUpdate[] = "sqFt = $sqft";
	}
	if(!empty($_POST["Price"])){
	    $price = $_POST["Price"];
     	$fieldsForUpdate[] = "price = $price";
	}
	if(!empty($_FILES['myfile']['name'])){
	    $fieldsForUpdate[] = "imgPath = '$img'";
	}

		$commaSeparatedFieldsForUpdate = implode(",", $fieldsForUpdate);

		$sql = "UPDATE formTest set " . $commaSeparatedFieldsForUpdate . " WHERE address='$address' ";

    
		if (mysqli_query($conn, $sql)) {
	     echo "<script>document.getElementById('img').innerHTML = 'Update successful!'</script>";	
	} 
	else {
	    echo "Error updating record: " . mysqli_error($conn);
	}
//================     Displays new results     =====================

		     $conn->close();

  		echo "<script>
			alert('Update successful');
			window.history.go(-1);
		</script>";		     
  }	
		     
		
    // ===================     transfer display() results back to HTML  =======================
   	 function display($tag , $value) {
        echo $tag . $value ;
    }		     



 ?>