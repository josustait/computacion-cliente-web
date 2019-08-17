<?php
/*Se crea una clase para poder colocar las variables de conexion como privadas*/
class Conexion extends mysqli
{
    private $db_host='localhost';
    private $db_user='root';
    private $db_pass='';
    protected $db_name = 'miagenda';
    
    public function __construct()
    {
     parent::__construct($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
     $this->set_charset('utf8');
    $this->connect_errno ? die ('Falla comexión'. mysqli_connect_errno()) : $con = 'Ya estas conectado';
        //echo $con;      
    }
}
?>