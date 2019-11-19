<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ejercicio Recuperación</title>
</head>


	<?php 
			

			function stringtoarray ($string_agenda,&$array_agenda) {
				//Convierte la agenda de datos (string) en un array asociativo
				$a=explode (";",$string_agenda);
				for($i=0; $i<count($a); $i++) {
					$array_agenda[$a[$i]]=$a[$i+1];
					$i++;
				}
				return true;
			}
			function arraytostring ($array_agenda) {
				//Convierte el array asociativo en una cadena de caracteres cada elemento separado por ;
				foreach($array_agenda as $key_nombre => $value)
				{
				  $string_agenda.=$key_nombre.";".$value.";";
				}
				//Quitamos el ultimo ';''
				$string_agenda=substr($string_agenda, 0, -1);
				return $string_agenda;
			}
			
			
			?>
		<?php
			
			$array_agenda=array();
			
				if(empty($_POST['codigo'])||empty($_POST['descripcion'])){
					echo "El código y la descripción deben estar rellenados.<br>";
					//echo "<script type='text/javascript'>alert('El código y la descripción deben estar rellenados');</script>"; Si lo hago así, se reinicia el array
				if($_POST['cantidad']<0)
					echo "El valor de la cantidad debe ser positivo. ";

				}	 
				else{
					stringtoarray ($_POST['agenda'],$array_agenda);
					$array_agenda[strtolower($_POST['codigo'])]= $_POST['descripcion'];

				}		
			
		?>



		<body>
			<form method="post" action="">
				Código: <input type="text" name="codigo" value="<?php $_POST['codigo'] ?>"><br>
				Descripción: <input type="text" name="descripcion" value="<?php $_POST['descripcion'] ?>"><br>
				Cantidad: <input type="text" name="cantidad" value="<?php $_POST['cantidad'] ?>"><br>
				<input type="submit" name="submit" value="Enviar Datos"><br>
				<input name="agenda" type="text" value="<?php echo arraytostring($array_agenda)?>"/>


		
	</form>

		<h2>Inventario</h2>
			<table>
		  		<tr>
		    		<th>Código</th>
		    		<th>Descripción</th>
		    		<th>Cantidad</th>
		  	</tr>
		  	<?php
		  		foreach ($array_agenda as $codigo => $descripcion) {
		  			echo "<tr>
		  			<td>$codigo</td>
		  			<td>$descripcion</td>
		  			
		  			</tr>";
		  			
		  		}
			?>
		</table>
	

</body>
</html>