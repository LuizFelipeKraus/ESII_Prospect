<?php
  
    require_once("ControllerUsuario.php");
    use controllers\ControllerUsuario;
    session_start();
    

    if(isset($_POST['login'] ) && isset($_POST['senha'] ) ) {
        $login = $_POST['login'];
        $senha = $_POST['senha'];
    
        try {
            $ctrlUsuario = new ControllerUsuario();
            $usuario = $ctrlUsuario->fazerLogin($login, $senha);
            $_SESSION['usuario'] = serialize($usuario);
            header('location: ../../views/main.php');
            
        } catch (\Exception $e) {
            $_SESSION['usuario'] = serialize($usuario);
            header('location: ../../index.php');

        }
    } else {
        $_SESSION['erroLogin'] = "Faça o Login para continuar!!";
        header('location: ../../index.php');
    } 

?>