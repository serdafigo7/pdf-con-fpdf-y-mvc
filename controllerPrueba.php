<?php
if (isset($_POST['type'])) {
    $type = $_POST['type'];
    switch ($type) {
        case 1:
            require_once('class.pruebas.php');
            $obj = new Pruebas;
            $resp = $obj->insertar_prueba2();
            echo $resp;
            break;
       
            
    }
}
?>
