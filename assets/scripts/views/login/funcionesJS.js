function f_ajax(archivo, objetivo, cadena, modo) { 
if(peticion) {
    var obj = document.getElementById(objetivo); 
    if (modo == "POST"){
    	peticion.open("POST", archivo); 
    }else{
	peticion.open("GET", archivo); 
    };
     
    peticion.onreadystatechange = function()  { 
        switch (peticion.readyState){
			case 4:
				obj.innerHTML = "Estado 4:Completo";
                                obj.innerHTML = peticion.responseText;
				break;
			case 3:
				obj.innerHTML = "<img src=images/loader.gif width=50px>Estado 3:Interactivo";
				break;
			case 2:
				obj.innerHTML = "<img src=images/loader.gif widt=50px>Estado 2:Cargado";
				break;
			case 1:
				obj.innerHTML = "<img src=images/loader.gif widt=50px>Estado 1:Cargando";
				break;
			default:
				alert("No Inicializado o desconocido")
				break;
                
        } 
		  
    } 
	if (modo == "POST"){
		peticion.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		peticion.send((cadena)); 
	}else{
		peticion.send(null); 
	};	 

};};




function getElementsByClassName(oElm, strTagName, strClassName){
    var arrElements = (strTagName == "*" && document.all)? document.all : oElm.getElementsByTagName(strTagName);
    var arrReturnElements = new Array();
    strClassName = strClassName.replace(/\-/g, "\\-");
    var oRegExp = new RegExp("(^|\\s)" + strClassName + "(\\s|$)");
    var oElement;
    for(var i=0; i<arrElements.length;i++){
        oElement = arrElements[i];
        if(oRegExp.test(oElement.className)){
            arrReturnElements.push(oElement);
        }   
    }
    return (arrReturnElements)
}

function serialize (form) {
        if (!form || form.nodeName !== "FORM") {
                return 'moco';
        }
        var i, j, q = [];
        for (i = form.elements.length - 1; i >= 0; i = i - 1) {
                if (form.elements[i].name === "") {
                        continue;
                }
                switch (form.elements[i].nodeName) {
                case 'INPUT':
                        switch (form.elements[i].type) {
                        case 'text':
                        case 'hidden':
                        case 'password':
                        case 'button':
                        case 'reset':
                        case 'submit':
                                q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value));
                                break;
                        case 'checkbox':
                        case 'radio':
                                if (form.elements[i].checked) {
                                        q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value));
                                }                                               
                                break;
                        }
                        break;
                        case 'file':
                        break; 
                case 'TEXTAREA':
                        q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value));
                        break;
                case 'SELECT':
                        switch (form.elements[i].type) {
                        case 'select-one':
                                q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value));
                                break;
                        case 'select-multiple':
                                for (j = form.elements[i].options.length - 1; j >= 0; j = j - 1) {
                                        if (form.elements[i].options[j].selected) {
                                                q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].options[j].value));
                                        }
                                }
                                break;
                        }
                        break;
                case 'BUTTON':
                        switch (form.elements[i].type) {
                        case 'reset':
                        case 'submit':
                        case 'button':
                                q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value));
                                break;
                        }
                        break;
                }
        }
        return q.join("&");
}
