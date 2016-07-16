function addRealtorElement()
{
	//This function adds the HTML elements that display a realtor's information.
	//
	//It will be called by the PHP that retrieves each realtor's information, then fills the element with the info,
	//which the function receives as paramenters. 
	//alert("DEBUG: EXTERNAL JS");
	
	//alert(arguments[0]);
	var test = document.getElementById("logoutBtn");
	
	var row = "<tr class=\"realtorRow\" >";
	
	row += "<td class=\"portraitBox\"><image class=\"portrait\" src=\"" + arguments[5] + "\"></td>";  //portrait
	
	row += "<td class=\"realtorInfo\">";
	row += "<h3 class=\"realtorName\">" + arguments[0] + "</h3>"; //NAME
	row += "<p class=\"realtorLocation\">" + arguments[1] + "</p>"; //LOCATION
	row += "<p class=\"realtorPhone\">" + arguments[2] + "</p>"; //PHONE
	row += "<p class=\"realtorEmail\">" + arguments[3] + "</p>"; //EMAIL
	row += "<p class=\"realtorBio\">" + arguments[4] + "</p>"; //BIO
	
	if (test != null)
	{
		row += "<form action=\"realtors-edit.html\" method=\"GET\"><input id=\"rID\" name=\"realtorID\" type=\"hidden\" value=\"" + arguments[6] + "\"><input type=\"submit\" value=\"EDIT\" clas=\"editbtn\"></form>";
		document.getElementById("addNew").innerHTML = "<form action=\"realtors-edit.html\"><input type=\"submit\" value=\"Add New Realtor\"></form>";
	}
	
	row += "</td>";
	
	row += "</tr>";
	document.getElementById("realtorTable").innerHTML += row;
}