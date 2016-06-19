<?php
	session_start();


if(isset($_GET['email'])){
	process_login();
}else if(isset($_GET['logout'])){
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
	$id = $_GET['email'];
	$password = $_GET['password'];	
/*	$id = $_POST['email'];
	$password = $_POST['password'];	*/
	
	$link = mysqli_connect('localhost','root','','jproject');
	if($link){	
//		echo $id, $password;	
		$query = "select department from user where email = '$id' and pswd = '$password'";
			$result = mysqli_query($link,$query);
			if ($result && mysqli_num_rows($result) > 0){
				$out = mysqli_fetch_row($result);
				$_SESSION['User']=$id;
				mysqli_close($link);				
//				header("Location: adminControl.php");
				echo $out[0];				//return department				
			}else{
				mysqli_close($link);
				echo "<h2 align='center'>Log In Failed <a href='index.html'> [GOTO Login]</a></h2>";				
		}	
			
	}else{
		echo "DBMS connection failed<br/>";
	}	
}

?>
