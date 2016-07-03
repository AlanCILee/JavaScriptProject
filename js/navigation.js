$(document).ready(function() {
	 $.post("adminProcess.php",
            {                        
                User: "null"                 
            }
            , function display(dataFromtheServer) {
	 			if(dataFromtheServer != "null"){
	
					$("#loginText").html(dataFromtheServer + "<button id='logoutBtn' > [LOGOUT]</button>");
					
					$("#logoutBtn").click(function(){						 			
						$.post("adminProcess.php",
		                {                        
		                	logout: "null"                 
		                }
		                 , function display(dataFromtheServer) {
					 			if(dataFromtheServer != "null"){
		    						$("#loginText").html("<a href='signin.html' class='aa-login'>Login</a>"); 	
								}	
								checkDepartment();
						}		 
	    				);        
	 				});   
				}
				checkDepartment();	
 			}		 
     );        	        
});
    
function checkDepartment(){	    
     $.post("adminProcess.php",
            {                        
                Depart: "null"                 
            }
            , function display(dataFromtheServer) {
            		$("#propertiesDropdown").css("display","none");		//Default All Signle Menu
					$("#propertiesSingle").css("display","inline");
					$("#realtorsDropdown").css("display","none");
					$("#realtorsSingle").css("display","inline");
					$("#newsDropdown").css("display","none");
					$("#newsSingle").css("display","inline");            			
	 			if(dataFromtheServer == "IT"){
					$("#propertiesDropdown").css("display","inline");
					$("#propertiesSingle").css("display","none");
					$("#realtorsDropdown").css("display","inline");
					$("#realtorsSingle").css("display","none");
					$("#newsDropdown").css("display","inline");
					$("#newsSingle").css("display","none");
				}else if(dataFromtheServer == "Sales"){
					$("#propertiesDropdown").css("display","inline");
					$("#propertiesSingle").css("display","none");								
				}else if(dataFromtheServer == "HR"){	
					$("#realtorsDropdown").css("display","inline");
					$("#realtorsSingle").css("display","none");	
				}else if(dataFromtheServer == "News"){	
					$("#newsDropdown").css("display","inline");
					$("#newsSingle").css("display","none");
				}
				
 			}		 
        );           	
}