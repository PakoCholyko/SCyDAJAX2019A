<?php
 // Cargamos LIGA3
 require_once '../LIGA3/LIGA.php';
 // Configuramos el directorio base
 //RUTA::$base = '//localhost/LIGA3/enrutador/';
 // Creo una ruta básica
 RUTA::nueva('holaMundo', function() {
  echo '<h1>Hola mundo con el enrutador de LIGA.php</h1>';
 });
	
 RUTA::nueva('cargarTabla', function() {
 // Personalizo una conexión a la base de datos (servidor, usuario, contraseña, schema)
 BD('localhost', 'root', '', 'base');
 
 // Configuramos la entidad a usar
 $tabla = 'usuarios';
 $liga  = LIGA($tabla);
		
  $cols = array('*', '-contraseña', 'acción'=>'<a href="?borrar=@[0]">Borrar</a>');
  $join = array('depende'=>$liga);
  $pie  = '<th colspan="@[numCols]">Total de instancias: @[numReg]</th>';
		
		echo '<div id="divTabla">';
  HTML::tabla($liga, 'Instancias de '.$tabla, $cols, true, $join, $pie);
		echo '</div>';
 });
	
  // Imprimo las etiquetas HTML iniciales
  HTML::cabeceras(array('title'      =>'RUTA en LIGA 3',
			'description'=>'Página de pruebas para RUTA de LIGA 3',
			'css'        =>RUTA::$base.'../util/LIGA.css'
			)
		  );

 // Guardo el bufer para colocarlo en el layout
 ob_start();
 // Se ejecuta el enrutador
 RUTA::run();
 $cont = ob_get_clean();
 
  // Estuctura el cuerpo de la página
  HTML::cuerpo(array('cont'=>$cont));
  
  // Cierre de etiquetas HTML
  HTML::pie();
?>