<?php
include("datosconex.php");
$name=$_POST['name'];
$mysqli= new mysqli($host,$user,$pass,$db);
if ($mysqli->connect_errno){
	printf ("Error de conexion:%s\n",mysqli_connect_error());
exit();
}
$query="SELECT id,name,location,phone FROM department where name=? ORDER by id";
$stmt=$mysqli->prepare($query);
$stmt->bind_param("s",$name);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows>0)
{
	$stmt->bind_result($id,$name,$location, $phone);
?>
<table border="1">
<?php
	while ($stmt->fetch()){
?>

<tr>
<td><?php echo $id; ?></td><td><?php echo $name; ?></td><td><?php echo $location; ?></td><td><?php echo $phone; ?></td>
</tr>
<?php
}
?>
</table>
<?php
}
else
{
echo "No hay ningún departamento con ese nombre";
}
?>

	
