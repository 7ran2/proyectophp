<?php  include('server.php'); 
    if(isset($_GET['edit'])){
         $id=$_GET['edit'];

$edit_state=true;

$rec=mysqli_query($db, "SELECT * FROM Estudiante WHERE Mat_E=$Mat_E");
$record = mysqli_fetch_array($rec);
$Mat_E=$record['Mat_E'];
//$address=$record['address'];
//$id=$record['id'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crud</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    
</head>
<body> 
<!--2-->
<?php if (isset($_SESSION['msg'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['msg']; 
			unset($_SESSION['msg']);
		?>
	</div>
<?php endif ?>
<!--2fin-->
<!--Cabecera-->
    <table>
        <thead>
            <tr>
                <th>Matricula</th>
                <th>Estudiante</th>
                <th>Edad</th>
                <th>Semestre</th>
                <th>Genero</th>
                <th>Clave c1</th>

              <!--  <th colspan="2">Action</th>-->
            </tr>
        </thead>
        <tbody>
              <?php while ($row=mysqli_fetch_array($results)){ ?>
                    <tr>
                        <td><?php echo $row['Mat_E']; ?></td>
                        <td><?php echo $row['Nombre_E']; ?></td>
                        <td><?php echo $row['Edad_E']; ?></td>
                        <td><?php echo $row['Semestre_E']; ?></td>
                        <td><?php echo $row['Genero_E']; ?></td>
                        <td><?php echo $row['Clave_C1']; ?></td>
                        <td>
                            <a class="edit_btn" href="index.php?edit=<?php echo $row['Mat_E'];?>">Editar</a>
                        </td>
                        <td>
                            <a class="del_btn" href="server.php?del=<?php echo $row['Mat_E'];?>">Eliminar</a>
                        </td>
                    </tr> 
             <?php } ?> 

            
        </tbody>
    </table>

    <form method="post" action="server.php" >

        <div class="input-group">
    
            <label>Matricula</label>
        <input type="text" name="Mat_E" value="<?php echo $Mat_E; ?>">
        </div>

		<div class="input-group">
			<label>Estudiante</label>
			<input type="text" name="Nombre_E" value="<?php echo $Nombre_E;?>">
		</div>
		<div class="input-group">
			<label>Edad</label>
			<input type="text" name="Edad_E" value="<?php echo $Edad_E;?>">
		</div>
        <div class="input-group">
    
            <label>Semestre</label>
        <input type="text" name="Semestre_E" value="<?php echo $Semestre_E ; ?>">
        </div>

		<div class="input-group">
			<label>Genero</label>
			<input type="text" name="Genero_E" value="<?php echo $Genero_E;?>">
		</div>
		<div class="input-group">
			<label>Carrera</label>
			<input type="text" name="Clave_C1" value="<?php echo $Clave_C1;?>">
		</div>

		<div class="input-group">
                <?php if($edit_state==false):?>
                    <button class="btn" type="submit" name="save" >Guardar</button>
                <?php else:?>
                    <button class="btn" type="submit" name="update" >Actualizar</button>
                <?php endif?>
			
		</div>
	</form>

</body>
</html>