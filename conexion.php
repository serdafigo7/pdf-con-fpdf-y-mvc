<?php 
class Conexion
{ 
    private $servidor;
    private $db;
    private $puerto;
    private $charset;
    private $usuario;
    private $pass;

    public function __construct(){
        $this->servidor = "localhost";
        $this->db = "ejercicio2";
        $this->puerto = 3306;
        $this->charset = "utf8";
        $this->usuario = "root";
        $this->pass = "123456789";
    }
    
    public function conectar(){
        $opciones =[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_ORACLE_NULLS=>PDO::NULL_TO_STRING, PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC];
        try {
            $pdo = new PDO("mysql:host={$this->servidor};dbname={$this->db};port={$this->puerto};charset={$this->charset}",$this->usuario,$this->pass,$opciones);
        }catch (PDOException $e) {
            $pdo = $e->getMessage();
        }
        return $pdo;
    }

    public function recorrerTodosLosDatos($sql){
        return $sql->fetchAll();
    }

}


?>