<?php
    /*http://ec2-52-201-212-193.compute-1.amazonaws.com/phpmyadmin/*/
    $servername = "ec2-52-201-212-193.compute-1.amazonaws.com";
    $username = "s2016a_user18";
    $password = "s2016a_user18";
    $dbname = "s2016a_user18";
    
    $address = $_POST["address"];
    $city = $_POST["city"];
    $postal = $_POST["postal"];
    $room = $_POST["rooms"];
    $bath = $_POST["baths"];
    $descp = $_POST["description"];
    $sqft = $_POST["squareF"];
    $price = $_POST["Price"];
    
    
/* ===========================   to clear form   ==============================   */
      echo "<script> 
	document.getElementById('ad').value ='';  
	document.getElementById('city').value ='';
	document.getElementById('pos').value ='';
	document.getElementById('rm').value ='';
	document.getElementById('bh').value ='';
	document.getElementById('descp').value ='';
	document.getElementById('sf').value ='';
	document.getElementById('price').value ='';
	document.getElementById('file').value = '';
	</script>";
    
  

// ===========================================       img input        ===========================================
		
//echo "<script language='javascript'>alert('thanks!');</script>"; 
	/*if(isset($_FILES['myfile'])){
      $errors= array();
      $file_name = $_FILES['myfile']['name'];
      $file_size =$_FILES['immyfileage']['size'];
      $file_tmp =$_FILES['myfile']['tmp_name'];
      $file_type=$_FILES['myfile']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['myfile']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($_FILES["myfile"]["tmp_name"],
                                "../www/" . $_FILES["myfile"]["name"]);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
*/
if(isset($_FILES['myfile'])){
      $errors= array();
      $file_name = $_FILES['myfile']['name'];
      $file_size =$_FILES['myfile']['size'];
      $file_tmp =$_FILES['myfile']['tmp_name'];
      $file_type=$_FILES['myfile']['type'];
     
      
      if($file_size > 2097152){
         $errors[]='File size must not exceed 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($_FILES["myfile"]["tmp_name"],
                                "img/agents/" . $_FILES["myfile"]["name"]);
                                
         // echo "Uploaded File :".$_FILES["myfile"]["name"] . "<br>";
/*================      clear inputs and preview image once upload button is clicked      ==================================================================================*/
      echo "<script>document.getElementById('myimg').innerHTML = 'Upload successful!'</script>";
      
          $img = $_FILES['myfile']['name']; //store image path for sql upload
          
      }else{
         print_r($errors);
      }
   }
/*
   $output_dir = "../www/";
 
if(isset($_FILES["myfile"]))
{
    //Filter the file types , if you want.
    if ($_FILES["myfile"]["error"] > 0)
    {
      echo "Error: " . $_FILES["file"]["error"] . "<br>";
    }
    else
    {
        //move the uploaded file to uploads folder;
        move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir. $_FILES["myfile"]["name"]);
 
     echo "Uploaded File :".$_FILES["myfile"]["name"] . "<br>";
    }
 
}
   */
   
//===================================      upload inputs into sql      ================================================================

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
  
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }  

 $sql = "INSERT INTO formTest (address, city, postalCode, roomCnt, bathCnt, description, sqFt,price, imgPath) " ;
    $sql .="VALUES (?, ?, ?, ?, ?, ?, ?, ?, ? ) " ;
    
    
    if($statement = $conn->prepare($sql))
    	{
        //$statement->bind_param("ss", $_POST["add"], $_POST["city"], .......); 
        //OR
       
        $statement->bind_param("sssiisiis", $address, $city, $postal, $room, $bath, $descp, $sqft, $price, $img);
        $statement->execute();

 // display inputs for testing/ but can be use for displaying propert info. =========================================
        
        $sql = "SELECT * From formTest order by propertyid desc limit 1" ;
        
       $result = $conn->query($sql) or die("Query: ($sql) [problem]");
 
        if ($result->num_rows > 0) {
            // output data of each row
            $fields = mysqli_num_fields($result);

            $row = $result->fetch_row();
               
            display(
               	"Address: " . $row[1]. "<br/>". 
      			"City: " . $row[2]. "<br/>".
      			"Postal Code: " . $row[3]. "<br/>".
      			"Number of Rooms: " . $row[4]. "<br/>".
      			"Number of Baths: " . $row[5]. "<br/>".
      			"Description: " . $row[6]. "<br/>".
      			"Square FT: " . $row[7]. "<br/>".
      			"Price: $" . $row[8]. "<br/>".
      			"Image path: " . $row[9]. "<br/>" 
                    );
  
 /*=======================================================================================*/
        } 
        
        else 
        {
            echo "0 results";
        }

       $statement->close();       
       
    } else 
        echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
    
 
   
   $conn->close();
// clear form inputs ===========================================================
    
/*echo "<script> 
	form.getElementsByName("address").value ="";  
	form.getElementsByName("city").value ="";
	form.getElementsByName("postal").value ="";
	form.getElementsByName("rooms").value ="";
	form.getElementsByName("baths").value ="";
	form.getElementsByName("description").value ="";
	form.getElementsByName("squareF").value ="";
	form.getElementsByName("Price").value ="";
	document.getElementById("file").value = "";
	</script>";*/
	
	
    // ==========================================
    function display($value) {
        echo $value ;
    }
    
    
    
		   
    
?>