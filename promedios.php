<?php require_once("includes/connection.php"); ?>
<?php include("includes/header.php"); ?>


	<?php
	session_start(); //echo "AJA";
//if(isset($_POST["promedios"])){

//echo "<div class='container mregister'>";
//if(!empty($_POST['duracion_llamada'])) {
	
	$server = "172.30.13.23";
		$user = "user";
		$pass = "password";
		$bd = "practica";
	$conexion = mysqli_connect($server, $user, $pass,$bd) 
			or die("Ha sucedido un error inexperado en la conexion de la base de datos");
			
	//$duracion_llamada=$_POST['duracion_llamada'];
	
	$sql_tmo="SELECT AVG(tt.duracion_llamada) as tiempo, tt.fecha_llamada, u.nombre_usuario 
	FROM tiempo_tmo tt INNER JOIN usuarios u ON (u.id=tt.id_usuario)
	WHERE tt.id_usuario='".$_SESSION['id']."' GROUP BY 2,3";
	$result_tmo = mysqli_query($conexion,$sql_tmo);
	$numrows_tmo=mysqli_num_rows($result_tmo);
	//echo "DD".$sql_tmo;
	echo "<table border=0 align = 'center'>";
			echo "<tr>";
				echo "<td colspan = 4 align=center>";
					echo "TIEMPO TMO";
				echo "</td>";
		echo "</table>";
	while ($row_tmo =mysqli_fetch_row($result_tmo)) { 
		//echo "Tiempo TMO DEL Usuario ".$row_tmo[2].'- FECHA '.$row_tmo[1].' -TIEMPO '.$row_tmo[0].' Minutos';echo "<br>";
			echo "<table border=1 align = 'center'>";
			echo "<tr>";
				echo "<td width = '40%'>";
					echo $row_tmo[2];
				echo "</td>";
				echo "<td width = '20%'>";
					echo $row_tmo[1];
				echo "</td>";
				echo "<td width = '10%'>";
					echo number_format($row_tmo[0],0);
				echo "</td>";
				echo "<td width = '30%'>";
					if($row_tmo[0]<9)
						$valor = '<font color = red>TIEMPO POR DEBAJO DEL ESTABLECIDO</font>';
					else if($row_tmo[0]>=9 AND $row_tmo[0]<=11)
						$valor = 'RANGO NORMAL';
					else
						$valor = '<font color = red>TIEMPO POR ENCIMA DEL ESTABLECIDO</font>';
					echo $valor;
				echo "</td>";
			echo "</tr>";
		echo "</table>";
	}
	
	$sql_outbound="SELECT SUM(tt.duracion_llamada)/60 as tiempo, tt.fecha_llamada, u.nombre_usuario
	FROM tiempo_outbound tt INNER JOIN usuarios u ON (u.id=tt.id_usuario)
	WHERE tt.id_usuario='".$_SESSION['id']."' GROUP BY 2,3";
	$result_outbound = mysqli_query($conexion,$sql_outbound);
	$numrows_outbound=mysqli_num_rows($result_outbound);
	echo "<table border=0 align = 'center'>";
			echo "<tr>";
				echo "<td colspan = 4 align=center>";
					echo "TIEMPO OUTBOUND";
				echo "</td>";
			echo "</tr>";
		echo "</table>";
	while ($row_outbound =mysqli_fetch_row($result_outbound)) { 		
		//echo "Tiempo OUTBOUND DEL Usuario ".$row_outbound[2].'- FECHA '.$row_outbound[1].' -TIEMPO '.$row_outbound[0].' Horas';echo "<br>";
		echo "<table border=1 align = 'center'>";
			echo "<tr>";
				echo "<td width = '40%'>";
					echo $row_outbound[2];
				echo "</td>";
				echo "<td width = '20%'>";
					echo $row_outbound[1];
				echo "</td>";
				echo "<td width = '10%'>";
					echo number_format($row_outbound[0],0);
				echo "</td>";
				echo "<td width = '30%'>";
					if($row_outbound[0]>5)
						$valor = '<font color = red>SUPERO EL TIEMPO MAXIMO OUTBOUND</font>';
					else 
						$valor = 'RANGO NORMAL';
					echo $valor;
				echo "</td>";
			echo "</tr>";
		echo "</table>";
	}	

//echo "</div>";
//} else {
	// $message = "Todos los campos no deben de estar vacios!";
//}
//}
?>


<?php if (!empty($message)) {echo "<p class=\"error\">" . "Mensaje: ". $message . "</p>";} ?>
	
	
	<?php include("includes/footer.php"); ?>