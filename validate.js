function validateForm() {
	var fname = document.forms["user_details"] ["First_name"].value;
	var lname = document.forms["user_details"] ["Last_name"].value;
	var city = document.forms["user_details"] ["city_namme"].value;

	if(fname==null || lname==""||city==""){
		alert("all details required were not supplied");

		return false;
	}
	return true;
}
