var LogInForm = document.getElementById("LogInForm"); 
var SignUpForm = document.getElementById("SignUpForm");
var Indicator = document.getElementById("Indicator");

  Indicator.style.transform = "translateX(100px)";  

  function signup() {
    SignUpForm.style.transform = "translateX(0px)";
    LogInForm.style.transform = "translateX(0px)";
    Indicator.style.transform = "translateX(100px)";  
  }

  function login() {
    SignUpForm.style.transform = "translateX(300px)";
    LogInForm.style.transform = "translateX(300px)";
    Indicator.style.transform = "translateX(0px)";   
  }

  var menuitems = document.getElementById('menuitems');

  menuitems.style.maxHeight = "0px";

  function menutoggle() {
    if (menuitems.style.maxHeight == "0px") {
        menuitems.style.maxHeight = "200px";
      }
      else {
        menuitems.style.maxHeight = "0px";
      }
    }