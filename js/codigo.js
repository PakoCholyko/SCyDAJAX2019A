//alert('Hola mudno');

 $(function(){
     
     var config = {
       
       func : function(resp){
          
          if (resp != 1) {
               $.liga('mensaje','Error');
          }else{
               $.liga('mensaje','Inserccion correcta');
               $('#divTabla').load('enrutador/cargarTabla');
          }
          
       }
     };
     
     $('form').liga('AJAX', config);
     
 });