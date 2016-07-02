function addRealtor(rName, rLocation, rPhone, rEmail, rBio, rImg)
{
	//This function adds the HTML elements that display a realtor's information.
	//
	//It will be called by the PHP that retrieves each realtor's information, then fills the element with the info,
	//which the function receives as paramenters. 
	
	var realtorElement = "<div class=\"realtor\">";
	
	realtorElement += "<h3 class=\"realtorname\>" + rName + "</h3>";
	realtorElement += "<div class=\"realtorinfocontainer\">";
		//Realtor Location
		realtorElement += "<div class=\"location\"><p class=\"pLocation\">" + rLocation +"</p></div>";
		//Realtor Phone
		realtorElement += "<div class=\"phone\"><p class=\"pPhone\">" + rPhone + "</p></div>";
		//Realtor Email
		realtorElement += "<div class=\"email\"><p class=\"pEmail\">" + rEmail + "</p></div>";
	realtorElement += "</div>"; //closing tag for "realtorinfocontainer" div
	
	realtorElement += "<div class=\"realtormaincontainer\">";
		//Left-side Agent portrait
		realtorElement += "<div class=\"leftside\">
		                    	<figure class=\"aa-blog-img\">
		                          	<img class=\"agentImg\" alt=\"img\" src=" + rImg +">
		                        </figure>
		                   </div>";
		//Right-side Agent bio
		realtorElement += "<div class=\"rightside\"><p class=\"realtorbio\">" + rBio + "</p></div>";
	realtorElement += "</div>"; //closing tag for "realtormaincontainer" div
	
	realtorElement += "</div>"; //closing tag for "realtor" div
	document.getElementById("realtorArea") += realtorElement;
}