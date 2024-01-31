<?php

require_once('conexion.php');
class Pruebas
{
  


    public function insertar_prueba2()
    {
        
        $obj = new Conexion();
        $conx = $obj->conectar();
        $conx->beginTransaction();
        $rta = '';
        $resp = array();
        try {
           
            if ($_POST['cliente']!='' && $_POST['formap']!='' && $_POST['valor']!='' ) {

               


                $cliente = $_POST['cliente'];
                $formap = $_POST['formap'];
                $valor = $_POST['valor'];

                
                $fechaHoraActual = date('Y-m-d H:i:s');

                if($formap=='contado') {

            



                $sql = "INSERT INTO ventas (cliente,valor,forma_de_pago,fecha) VALUES (:cliente, :valor, :forma_de_pago, :fecha)";
                $query = $conx->prepare($sql);

                $query->bindParam(':cliente', $cliente);
                $query->bindParam(':valor', $valor);
                $query->bindParam(':forma_de_pago', $formap);
                $query->bindParam(':fecha', $fechaHoraActual);
                $query->execute();
                $num_filas = $query->rowCount();





    if ($num_filas >= 1) {
        $rta = 1;
        

       





       // $conx->commit();
        if ($num_filas>=1) {
           // $rta = 2;
          // $rta = 1;
         

        }else {
          //  $rta=-1;
            $conx->rollback();
        }




       

    } else {
        $conx->rollback();
        
    }
    

    $resp['rta'] = $rta;
                   
                }else if ($formap=='credito') {

                
                    
                $sql = "INSERT INTO ventas (cliente,valor,forma_de_pago,fecha)VALUES (:cliente, :valor, :forma_de_pago, :fecha)";
                $query = $conx->prepare($sql);

                $query->bindParam(':cliente', $cliente);
                $query->bindParam(':valor', $valor);
                $query->bindParam(':forma_de_pago', $formap);
                $query->bindParam(':fecha', $fechaHoraActual);
                $query->execute();

                $num_filas2 = $query->rowCount();
                if ( $num_filas2>=1){
                    $sqlid = "SELECT max(id) as max_id from ventas";
                    $queryid = $conx->prepare($sqlid);
                    $queryid->execute();
                    $result = $queryid->fetch(PDO::FETCH_ASSOC);
                    $max_id = $result['max_id'];
                    
                $sql2 ="INSERT INTO cuenta_cobro (id_venta,valor,fecha) VALUES(:id_venta, :valor, :fecha)";
                $query2 = $conx->prepare($sql2);
                $query2->bindParam(':id_venta', $max_id);
                $query2->bindParam(':valor', $valor);
                $query2->bindParam(':fecha', $fechaHoraActual);
                $query2->execute();

                $rta=1;
                

                }else{
                    $conx->rollback();

                }
                }else{
                

                    $sql = "INSERT INTO ventas (cliente,valor,forma_de_pago,fecha)VALUES (:cliente, :valor, :forma_de_pago, :fecha)";
                    $query = $conx->prepare($sql);
                    $query->bindParam(':cliente', $cliente);
                    $query->bindParam(':valor', $valor);
                    $query->bindParam(':forma_de_pago', $formap);
                    $query->bindParam(':fecha', $fechaHoraActual);
                    $query->execute();
                    $num_filas3 = $query->rowCount();
                    if ( $num_filas3>=1){
                        $sqlid = "SELECT max(id) as max_id from ventas";
                        $queryid = $conx->prepare($sqlid);
                        $queryid->execute();
                        $result = $queryid->fetch(PDO::FETCH_ASSOC);
                        $max_id = $result['max_id'];
                        
                    $sql3 ="INSERT INTO datafono (id_venta,valor,fecha) VALUES(:id_venta, :valor, :fecha)";
                    $query3 = $conx->prepare($sql3);
                    $query3->bindParam(':id_venta', $max_id);
                    $query3->bindParam(':valor', $valor);
                    $query3->bindParam(':fecha', $fechaHoraActual);
                    $query3->execute();
    
                    $rta=1;
                    //$conx->commit();
    
                    }
                    


               
                }

                $conx->commit();

}
            
        } catch (Exception $th) {
            $rta = $th->getMessage();
        }
         
            header('Content-Type: application/json');
            echo json_encode($resp);

       
    }

    //metodo listar //

    

    public function seleccionar_datos_prueba2()
    {
        $obj = new Conexion();
        $conx = $obj->conectar();
        $sql = "select id,cliente,valor,forma_de_pago,fecha from ventas ";
        $query = $conx->prepare($sql);
        $query->execute();
        $num_filas = $query->rowCount();
        $resp = array();

        if ($num_filas >= 1) {
            while ($d0 = $query->fetch(PDO::FETCH_ASSOC)) {
                $resp[] = $d0;
               
            }
            $datos = array();
            $datos =  $resp;
           
        } else {
            $data['rta'] = 0;
         
        }
    
   
    return $datos;
  
    }
}


?>