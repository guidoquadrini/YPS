var peticion = false; 
if (window.XMLHttpRequest) {
      peticion = new XMLHttpRequest();
}else if (window.ActiveXObject) {
            peticion = new ActiveXObject("Microsoft.XMLHTTP");
};
