<?php
include("datosconex.php");
$id=$_POST['id'];
$mysqli= new mysqli($host,$user,$pass,$db);
if ($mysqli->connect_errno){
	printf ("Error de conexion:%s\n",mysqli_connect_error());
exit();
}
$stmt =$mysqli-> prepare ("DELETE FROM department WHERE id=?");
$stmt->bind_param ("i",$id);
$stmt ->execute();
	if($stmt->affected_rows>0){
		echo "Operación realizada correctamente: Los datos han sido eliminados.";
	}
	else{
		echo "No hay departamentos con ese ID";
	}
	$stmt->close();
?>
