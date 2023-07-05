<?php

require_once("conn.php");
class usuario extends conn
{
    public object $conn;
    public array $formData;


    public function validar()
    {

        $this->conn = $this->connect();
        $query_usuario = "SELECT * FROM usuario WHERE email = '".$this->formData['email']."' AND senha = '".$this->formData['senha']."'";
        $login_usuario = $this->conn->prepare($query_usuario);
        
        $login_usuario->execute();

        $value = $login_usuario->fetchALL();

        return $value;

        if ($login_usuario->rowCount()==1) {
            return true;
        } else {
            return false;
        }
    }
}

?>