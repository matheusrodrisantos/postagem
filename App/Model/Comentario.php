<?php 
class Comentario
{
    public static function selecionaTodos()
    {
        $conn=Connection::getConn();
        
    }

    public static function selecionaUm($id_postagem)
    {
        $conn=Connection::getConn();
        $sql="SELECT * FROM comentario WHERE id_postagem =:id_postagem";
        $sql=$conn->prepare($sql);
        $sql->bindValue(':id_postagem',$id,PDO::PARAM_INT);
        $sql->execute();

        $resultado=$sql->fetchObject('Comentario');

        if(!$resultado)
        {
            throw new Exception("Não foi encontrado nenhum registro no banco");
        }
        return $resultado;
    }
}