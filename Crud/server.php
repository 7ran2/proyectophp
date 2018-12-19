<?php 
session_start();//1
	$db = mysqli_connect('localhost', 'root', '123456', 'Universidad2018');

	// initialize variables
	$Mat_E= "";
	$Nombre_E = "";
    $Edad_E= "";
    $Semestre_E = "";
    $Genero_E = "";
	$Clave_C1 = "";

    $edit_state=false;
	$update = false;

	if (isset($_POST['save'])) {
        $Mat_E = $_POST['Mat_E'];
		$Nombre_E = $_POST['Nombre_E'];
        $Edad_E = $_POST['Edad_E'];
        $Semestre_E = $_POST['Semestre_E'];
		$Genero_E = $_POST['Genero_E'];
        $Clave_C1 = $_POST['Clave_C1'];

if($Mat_E!="")
                {
        $query="INSERT INTO Estudiante (Mat_E,Nombre_E,Edad_E,Semestre_E,Genero_E,Clave_C1) VALUES ('$Mat_E','$Nombre_E', '$Edad_E','$Semestre_E','$Genero_E','$Clave_C1')";
        mysqli_query($db, $query); 

		$_SESSION['message'] = "Estudiante Registrado exitosamenete!."; //1.1
        header('location: index.php');
                }       
    else{
        
        print '<script language="JavaScript">'; 
print 'alert("No introdujo una Matricula");'; 
print '</script>'; 
print'<center><h1><a href="index.php">Volver a intentar</a></h1></center>';
    }
    
    }
    
    //ACTUALIZAR
    if(isset($_POST['update'])){
        $name= ($_POST['name']);
        $address= ($_POST['address']);
        $id= ($_POST['id']);

            mysqli_query($db, "UPDATE info SET name='$name',address='$address' WHERE id='$id'");
            $_SESSION['msg']="Updated";
            header('location: index.php');
}
//eliminar
if(isset($_GET['del'])){
    $id=$_GET['del'];
    mysqli_query($db,"DELETE FROM info WHERE id=$id ");
    $_SESSION['msg']="Deleted";
        header('location: index.php');
}

  $results=  mysqli_query($db,"SELECT * FROM Estudiante");


?>