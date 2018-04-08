<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
	header("location:login.php");
} else {
?>


<?php include("includes/header.php");
 ?>
<div id="welcome">

<script type="text/javascript">
<!--
function ventanaNueva(){ 
	window.open('promedios.php','nuevaVentana','width=300, height=400')
}
//-->
</script>
	<h2>Bienvenido, <span><?php echo $_SESSION['session_username'];?>! </span></h2>
	<p><a href="registro.php">Registrar llamada TMO</a></p>
	<p><a href="registro_outbound.php">Registrar llamada OUTBOUND</a></p>
	<p><a href="promedios.php" target="popup" onClick="window.open(this.href, this.target, 'width=500,height=640'); return false;">Consultar promedios</a></p>
	<p><a href="logout.php">Finalice</a> sesión aquí!</p>
</div>

<?php include("includes/footer.php"); ?>
	

<?php
}
?>
