<?php 
class Comentario
{
    public static function selecionaTodos()
    {
        $conn=Connection::getConn();
        
    }

    public static function selecionaPorId($id_postagem)
    {
        $conn=Connection::getConn();
        $sql="SELECT * FROM comentario WHERE id_postagem =:id_postagem";
        $sql=$conn->prepare($sql);
        $sql->bindValue(':id_postagem',$id_postagem,PDO::PARAM_INT);
        $sql->execute();

        $resultado=array();
        while($row=$sql->fetchObject('Comentario'))
        {
            $resultado[]=$row;
        }
        return $resultado;
    }
}