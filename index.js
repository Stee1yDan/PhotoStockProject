let menuElem = document.querySelector('.navigator');
let titleElem = menuElem.querySelector('.nav-icon');
let closeElem = menuElem.querySelector('.nav-icon-close');

titleElem.onclick = function() {
  menuElem.classList.toggle('open');
};

closeElem.onclick = function() {
  menuElem.classList.toggle('open');
};

var menuitems = document.getElementById('menuitems');

menuitems.style.maxHeight = "0px";

function menutoggle() {
  if (menuitems.style.maxHeight == "0px") {
      menuitems.style.maxHeight = "200px";
    }
    else {
      menuitems.style.maxHeight = "0px";
    }
};
  


  