<?php
if (isset($_POST['user']) && !empty ($_POST['user']) && isset($_POST['password']) && !empty ($_POST['password'])){

    session_start();
    include ("includes/conexion.php");

    $user = $_POST['user'];
    $pas = $_POST['password'];

    $user = mysqli_real_escape_string($conexion,$user);
    $pas = mysqli_real_escape_string($conexion,$pas);
    	
    $existe = "SELECT * FROM personas WHERE documento = '".$user."'";
    $result = mysqli_query($conexion,$existe);

    $cont = 0;

    while($row=mysqli_fetch_array($result)){

        $documento = $row ['documento'];
        $rol = $row ['rol'];
        $nombreCompleto = $row ['nombre_completo'];
        $pass = $row['password'];
        $id = $row['id'];

        if (password_verify($pas,$pass)) {
            $cont++;
        }
    }

        if (mysqli_num_rows($result) > 0) {

            if ($cont>0) {

                $_SESSION ['nombre_completo'] = $nombreCompleto; 
                $_SESSION ['password'] = $pass;
                $_SESSION ['documento']= $documento;
                $_SESSION ['id'] = $id;
                $_SESSION ['rol'] = $rol;     
                
                switch ($rol){
                 case 3:
                  echo "<script>window.location = 'administrador'</script>";
                  break;                  
                }

            }else{
                echo "<script>alert('Clave Incorrecta')</script>";
                echo "<script>window.location = 'index.php'</script>";
            }//if CONT

        }else{
            echo "<script>alert('Usuario No Existe En EL Sistema')</script>";
            echo "<script>window.location = 'index.php'</script>";   
        }

}else{
    echo "<script>alert('Debe Completar Obligatoriamente Todos Los Campos')</script>";
    echo "<script>window.location = 'index.php'</script>"; 
}//IF ISSET
?>