$(document).ready(function() {
    
    $('#search-btn').on('click',function(){
        $(".content").unhighlight();
        var buscar = $('input[name=q]').val();
        if (buscar !== ""){
            $(".content").highlight(buscar);
            $(".highlight").css({ backgroundColor: "#FFFF88" }).css("font-weight", "bold");

        }else{
            $(".content").unhighlight();
        }
         
        
    });
    $('input[name=q]').on( "keydown", function(event) {
      if(event.which == 13) 
         $('#search-btn').click();
    });
  
    
    
    $(document).on("keypress", "form[name='frm_busqueda']", function(event) { 
    return event.keyCode != 13;
});
    //do jQuery stuff when DOM is ready
});

