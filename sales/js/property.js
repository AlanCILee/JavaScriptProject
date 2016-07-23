
	$(document).ready(function(){
		$("#aa-menu-area").load("index.html #topNavigation");
		$("#aa-header").load("index.html #headerContainer");
		$("#aa-footer").load("index.html #footerContents");		
		var $div = $('<div>');
		$div.load('index.html #myModal', function(){
			$(this).appendTo("footer");
		});
		$.getScript("js/navigation.js");
				

 //============================     hide NEW POST submit button     =====================================
	clearAll();
   if(document.getElementById("address").value){
   	srch();
   }
   
    document.getElementById("newPost").style.visibility='hidden'; //hide new post button
	 
    var options = { 
    beforeSend: function() 
    {
        $("#progress").show();
        $("#bar").width('0%');
        $("#message").html("");
        $("#percent").html("0%");
    },
    uploadProgress: function(event, position, total, percentComplete) 
    {
        $("#bar").width(percentComplete+'%');
        $("#percent").html(percentComplete+'%');
 
    },
    success: function() 
    {
        $("#bar").width('100%');
        $("#percent").html('100%');
 
    },
    complete: function(response) 
    {
        $("#message").html("<font color='green'>"+response.responseText+"</font>");
    },

    error: function()
    {
        $("#message").html("<font color='red'> ERROR: unable to upload files</font>");
 
    }
 
}; 
 
     $("#myForm").ajaxForm(options);


	});

//=========================     allow the user to view image before upload     ========================

	function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
				document.getElementById("img").innerHTML = "<img id=image src=# alt=your image />";
                reader.onload = function (e) {
                    $('#image')
                        .attr('src', e.target.result)
                        .width(370)
                        .height(220);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        



// =========================== SEARCH address and displays results  ========================
    var addressVal;
	function srch() {
		addressVal = $("#address").val();
	
		var x = document.forms["myForm"]["address"].value;
    		if (x == null || x == "") {
        	alert("Please input Address");
        	return false;
    	}else{
    	$.post("sales/php/SearchAndDelete.php",
        	{
            	address: $("#address").val()
            }
            , display
         );
    	}
             
    }
            

// ============================      DELETE record and displays record    ===============================

	function del() {
		var x = document.forms["myForm"]["de"].value;
	/*	var x = document.getElementById("de").value;*/
    		if (x == null || x == "") {
        	alert("Please input ID to delete post");
        	return false;
    	}
	else{
    	$.post("sales/php/SearchAndDelete.php",
        	{
            	del: $("#de").val(),
            	address2: addressVal
            }
            , display
        );
      }     
    }

/*function update(){
	window.history.go(-1);
	$(document).ready(function(){
		srch();
		});
}
*/

// ===========================     VALIDATION FOR NEW POST     ===================================
    var addressVal;
	function validateNewPost() {
		
		addressVal = $("#address").val();
	
	var isValid =true;
	
		var a = document.forms["myForm"]["address"].value;
    		if (a == null || a == "") {
        	alert("Please input Address");
        	isValid = false;
    	}
		var b = document.forms["myForm"]["city"].value;
    		if (b == null || b == "") {
        	alert("Please input City");
        	isValid =  false;
    	}
		var c = document.forms["myForm"]["pos"].value;
    		if (c == null || c == "") {
        	alert("Please input Postal Code");
        	isValid =  false;
    	}
		var d = document.forms["myForm"]["rm"].value;
    		if (d == null || d == "") {
        	alert("Please input Number of Rooms");
        	isValid =  false;
    	}
		var e = document.forms["myForm"]["bh"].value;
    		if (e == null || e == "") {
        	alert("Please input Number of Baths");
        	isValid =  false;
    	}
		var f = document.forms["myForm"]["cat"].value;
    		if (f == null || f == "") {
        	alert("Please input Property Category");
        	isValid =  false;
    	}    	    	    	    	
		var g = document.forms["myForm"]["sf"].value;
    		if (g == null || g == "") {
        	alert("Please input Square Feet");
        	isValid =  false;
    	}    	    	    	    	
		var h = document.forms["myForm"]["price"].value;
    		if (h == null || h == "") {
        	alert("Please input Price");
        	isValid =  false;
    	}    	    	    	    	    	    
		var i = document.forms["myForm"]["descp"].value;
    		if (i == null || i == "") {
        	alert("Please enter Description");
        	isValid =  false;
    	}    	    	    	    	    	    		
    		var j = document.forms["myForm"]["file"].value;
    		if (j == null || j == "") {
        	alert("Please select an Image");
        	isValid =  false;
    	}
    	if(isValid)
    	{
		alert("All inputs verified, please click on NEW POST to proceed");
		document.getElementById("newPost").style.visibility = "visible";
    	}
    }	
//==============================     CLEAR VALUES on NEW POST clicked     ===========================

	function clearBtn(){
	
	document.getElementById("newPost").style.visibility = "hidden";
	}


//=================     Display results and CLEAR ALL     ==================================================== 
            
    function display(dataFromtheServer) {
    	$("#result tbody > tr").remove();
        $("#result tbody").empty().append(dataFromtheServer);
        clearAll();
		 }  

		 
// =====================     CLEAR ALL excluding address label button activate      ==============================================

	function clearAll() {

	document.getElementById('de').value ='';
	document.getElementById('city').value ='';
	document.getElementById('pos').value ='';
	document.getElementById('rm').value ='';
	document.getElementById('bh').value ='';
	document.getElementById('cat').value ='';
	document.getElementById('descp').value ='';
	document.getElementById('sf').value ='';
	document.getElementById('price').value ='';
	document.getElementById('file').value = '';
	document.getElementById('img').innerHTML = '';
	}
	