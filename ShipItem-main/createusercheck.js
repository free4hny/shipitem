function validateUser() {
  var x = document.forms["createuser"]["Firstname"].value;

  if (x == "") {
    alert("Please Enter First Name");
    return false;
  }
  
  	var y = document.forms["createuser"]["Lastname"].value;
  	if (x == "") {
    	  alert("Please Enter Last Name");
    	  return false;
  }
}