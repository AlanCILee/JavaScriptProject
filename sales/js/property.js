
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
    	$.post("SearchAndDelete.php",
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
    	$.post("SearchAndDelete.php",
        	{
            	del: $("#de").val(),
            	address2: addressVal
            }
            , display
        );
      }     
    }


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
	srch();
	}

             
	
          
//=================     Display results and CLEAR ALL     ==================================================== 
            
    function display(dataFromtheServer) {
    	$("#result tbody > tr").remove();
        $("#result tbody").empty().append(dataFromtheServer); //.empty - empty the previous daa before appending new results
 //       alert("It works.");
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

	}
	