function validateForm() {
  var x = document.forms["userform"]["email"].value;

  if (x == "") {
    alert("Empty Email not accepted");
    return false;
  }
  
  var y = document.forms["userform"]["pass"].value;
  if (Y == "") {
    alert("Empty Password not accepted");
    return false;
  }
}