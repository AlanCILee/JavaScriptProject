<?php
	session_start();

if(isset($_POST['email'])){
	process_login();
}else if(isset($_POST['logout'])){
	session_destroy();
	echo "LogOut";
}else if(isset($_POST['User'])){
	getUser();
}else if(isset($_POST['Depart'])){
	getDepartment();	
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
				$_SESSION['Depart']=$out[0];
				mysqli_close($link);				
				echo "Welcome ".$id." from ".$out[0]." Department";				//return department				
			}else{
				mysqli_close($link);
				echo "loginFail";				
		}	
			
	}else{
		echo "connectFail";
	}	
}

/*###########################################################################
#
#	Return current log in user's Id
#
###########################################################################*/
function getUser(){
	if(!isset($_SESSION['User'])){
		echo "null";
	}else{
		echo $_SESSION['User'];
	}
}

/*###########################################################################
#
#	Return current log in user's Department
#
###########################################################################*/
function getDepartment(){
	if(!isset($_SESSION['Depart'])){
		echo "null";
	}else{
		echo $_SESSION['Depart'];
	}
}
?>
