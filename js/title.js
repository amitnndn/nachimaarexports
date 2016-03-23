/*
	Base jquery file for all the base level changes for the website

*/
$(document).ready(function(){
	
	var title = "Nachimaar Exports";
	var url = window.location.href;
	
	if(url.indexOf("products/index.html") >= 0){
		title += " - Products";
	}
	else if(url.indexOf("contact") >= 0){
		title += " - Contact Us"
	}
	else if (url.indexOf("enquiry") >= 0){
		title += " - Enquiry";
	}
	else if(url.indexOf("company-profile") >= 0){
		title += " - Company Profile";
	}
	else{
		title += " - Home";
	}
	console.log(title);
	document.title = title;

});