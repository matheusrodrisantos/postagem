<?php
class Postagem
{

    public static function selecionaTodos()
    {
        $con=Connection::getConn();

        $sql="SELECT * FROM postagem ";

        $sql=$con->prepare($sql);
        $sql->execute();
        $resultado=array();
        while($row=$sql->fetchObject('Postagem'))
        {
            $resultado[]=$row;
        }
        if(!$resultado)
        {
            throw new Exception("Não foi encontrado nenhum registro no banco");
        }
        return $resultado;
    }

    public static function selecionaUm($id=null)
    {
        $con=Connection::getConn();
        $sql="SELECT * FROM postagem where postagem =:id";
        $sql=$con->prepare($sql);
        $sql->bindValue(':id',$id,PDO::PARAM_INT);
        $sql->execute();
        $resultado=$sql->fetchObject('Postagem');
        
        if(!$resultado)
        {
            throw new Exception("Não foi encontrado nenhum registro no banco");
        }
        
        else
        {
            $resultado->comentarios=Comentario::selecionaPorId($resultado->postagem);
        }
        return $resultado;
    }
}

