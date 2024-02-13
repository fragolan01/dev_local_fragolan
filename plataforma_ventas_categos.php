<?

$id_dominio=9999;

if (!$v7) {
	$v7="despliega";
}

if ($v7=="despliega") {
	echo "<br><br>";
	echo "<b><a href='index.php?v7=actualizar'>AGREGAR &raquo;</a></b>";
	echo "<br><br>";
	echo "<b>CONSULTA:</b>";
	echo "<br><br>";

	$query_plataforma_ventas_categos = "SELECT * FROM plataforma_ventas_categos WHERE id_dominio='".$id_dominio."' ORDER BY nombre";
	$result_plataforma_ventas_categos = mysql_query($query_plataforma_ventas_categos) or die('Query failed: plataforma_ventas_categos ' . mysql_error());
	while ($line_plataforma_ventas_categos = mysql_fetch_assoc($result_plataforma_ventas_categos)) {
		$data_plataforma_ventas_categos0=$line_plataforma_ventas_categos["id"];
        $data_plataforma_ventas_categos0=$line_plataforma_ventas_categos["id_dominio"];
        $data_plataforma_ventas_categos0=$line_plataforma_ventas_categos["id_proveedor"];
        $data_plataforma_ventas_categos0=$line_plataforma_ventas_categos["id_catego"];
		$data_plataforma_ventas_categos3=$line_plataforma_ventas_categos["nombre"];

		echo "<nobr>".$data_plataforma_ventas_categos0.".- (<a href='index.php?v7=actualizar&v13=".$data_plataforma_ventas_categos0."'>Actualizar</a> | <a href='index.php?v7=eliminar&v13=".$data_plataforma_ventas_categos0."'>Eliminar</a>) Categoria: Nombre: ".$data_plataforma_ventas_categos3."</nobr>";
		echo "<br>";
	}
}
if ($v7=="actualizar") {
	echo "<br><br>";
	echo "<b><a href='index.php'>&laquo; INICIO</a></b>";
	if ($v13) {
		echo "<br><br>";
		echo "<b>ACTUALIZAR:</b>";
		echo "<br><br>";

		$query_plataforma_ventas_categos = "SELECT id,id_dominio,nombre FROM plataforma_ventas_categos WHERE id='".$v13."' AND id_dominio='".$id_dominio."'";
		$result_plataforma_ventas_categos = mysql_query($query_plataforma_ventas_categos) or die('Query failed: plataforma_ventas_categos ' . mysql_error());
		while ($line_plataforma_ventas_categos = mysql_fetch_assoc($result_plataforma_ventas_categos)) {
			$data_plataforma_ventas_categos0=$line_plataforma_ventas_categos["id"];
            $data_plataforma_ventas_categos0=$line_plataforma_ventas_categos["id_dominio"];
            $data_plataforma_ventas_categos0=$line_plataforma_ventas_categos["id_proveedor"];
            $data_plataforma_ventas_categos0=$line_plataforma_ventas_categos["id_catego"];    
			$data_plataforma_ventas_categos3=$line_plataforma_ventas_categos["nombre"];
		}

		echo "<form name='actualiza_plataforma_ventas_categos' method='post' action='index.php?v7=actualizalo&v13=".$v13."'>";
			echo "<nobr>Nombre de la Catwgoria: <input type='text' name='nombre' value='".$data_plataforma_ventas_categos3."' size='50'><input type='submit' name='actualizar' value='ACTUALIZAR &raquo;'></nobr>";
		echo "</form>";
	}
	else {
		echo "<br><br>";
		echo "<b>INSERTAR:</b>";
		echo "<br><br>";

		echo "<form name='inserta_plataforma_ventas_categos' method='post' action='index.php?v7=actualizalo'>";
			echo "<nobr>Nombre de la categoria: <input type='text' name='nombre' value='' size='50'><input type='submit' name='insertar' value='INSERTAR &raquo;'></nobr>";
		echo "</form>";
	}
}
if ($v7=="actualizalo") {
	if ($v13) {
		echo "<br><br>";
		echo "<b>UPDATE:</b>";
		echo "<br><br>";

		$nombre=$_POST["nombre"];
		if (!$nombre) {
			echo "<font color=red>ERROR! Falta el Nombre...</font>";
		}
		else {
			$sql_plataforma_ventas_categos = "UPDATE plataforma_ventas_categos SET nombre='".$nombre."' WHERE id='".$v13."' AND id_dominio='".$id_dominio."'";
			$result_plataforma_ventas_categos= mysql_query($sql_plataforma_ventas_categos);

			echo "<font color=blue>PERFECTO! Proveedor actualizado...</font>";

			echo $recargador;
		}
	}
	else {
		echo "<br><br>";
		echo "<b>INSERT:</b>";
		echo "<br><br>";

		$nombre=$_POST["nombre"];
		if (!$nombre) {
			echo "<font color=red>ERROR! Falta el Nombre...</font>";
		}
		else {
			$id_dominio=$id_dominio;
			$nombre=$nombre;
			require($laraiz."inserta_plataforma_ventas_categos.php");

			echo "<font color=green>PERFECTO! Proveedor insertado...</font>";

			echo $recargador;
		}
	}
}
if ($v7=="eliminar") {
	echo "<br><br>";
	echo "<b><a href='index.php'>&laquo; INICIO</a></b>";
	echo "<br><br>";
	echo "<b>ELIMINAR:</b>";
	echo "<br><br>";
	echo "<nobr>En verdad deseas eliminar este registro? <a href='index.php?v7=eliminalo&v13=".$v13."'>SI</a> | <a href='index.php'>NO</a></nobr>";
}
if ($v7=="eliminalo") {
	echo "<br><br>";
	echo "<b>DELETE:</b>";
	echo "<br><br>";

	$querydel_plataforma_ventas_categos = "DELETE FROM plataforma_ventas_categos WHERE id='".$v13."' AND id_dominio='".$id_dominio."'";
	$resultdel_plataforma_ventas_categos = mysql_query($querydel_plataforma_ventas_categos);

	echo "<font color=red>LISTO! Proveedor eliminado...</font>";

	echo $recargador;
}
?>