<?php
require_once ("../init.php");

class Banco
{
    protected $mysqli;
    public function __construct()
    {
        $this->conexao();
    }

    private function conexao()
    {
        $this->mysqli = new mysqli(BD_SERVIDOR,BD_USUARIO,
            BD_SENHA, BD_BANCO);
    }

    public function setPessoa($nome, $idade, $altura, $peso)
    {
        $stmt = $this->msqli->prepare("INSERT INTO pessoa('nome','idade', 'altura', 'peso')
    VALUES(?, ?, ?, ?)");
        $stmt->bind_param($nome, $idade, $altura, $peso );
        if($stmt->execute == true):
            return true;
        else:
            return false;
        endif;
    }
    
    public function getPessoa()
    {
        $result = $this->mysqli->query("SELECT * FROM pessoa");
        while($row = $result->fetch_array(MYSQLI_ASSOC))
        {
            $array[] = $row;
        }
        return $array;
    }

    public function deletePessoa($id)
    {
        if($this->mysqli->query("DELETE FROM `pessoa` WHERE `id_pessoa` = ''".$id."';")== true):
            return true;
        else:
            return false;
        endif;
    }
}
