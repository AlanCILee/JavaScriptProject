<?php
	session_start();

if(isset($_POST['email'])){
	process_login();
}else if(isset($_POST['logout'])){
	session_destroy();
	echo "LogOut";
//	header("Location: index.html");	
}

/*###########################################################################
#
#	Handle Log In
#
###########################################################################*/
function process_login(){
    $servername = "ec2-52-201-212-193.compute-1.amazonaws.com";    
    $username = "s2016a_user14";
    $password = "s2016a_user14";
    $dbname = "s2016a_user14";   

	$id = $_POST['email'];
	$pswd = $_POST['password'];
	
    $link = mysqli_connect($servername, $username, $password, $dbname);

	if($link){

		$query = "select department from Users where email = '$id' and pswd = '$pswd'";
			$result = mysqli_query($link,$query);
			if ($result && mysqli_num_rows($result) > 0){
				$out = mysqli_fetch_row($result);
				$_SESSION['User']=$id;
				mysqli_close($link);				
//				header("Location: adminControl.php");
				echo $out[0];				//return department				
			}else{
				mysqli_close($link);
				echo "loginFail";				
		}	
			
	}else{
		echo "connectFail";
	}	
}

?>
