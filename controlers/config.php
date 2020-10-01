<?php 
    
    //Mostrar errores
    init_set('display_errors',1);
    init_set('display_startup_errors',1);
    error_reporting(E_ALL);

    //Iniciar sesión
    if(!isset($_SESSION)){
        session_start();
    }
    
?>