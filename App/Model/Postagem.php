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
    public static function insert($dadosPost)
    {
        if(empty($dadosPost['titulo']) || empty($dadosPost['conteudo']))
        {
            throw new Exception("Preencha todos os campos");
            return false;
        }

        $con=Connection::getConn();
        $sql='INSERT INTO postagem(titulo,conteudo) VALUES(:tit,:cont)';
        $sql =$con->prepare($sql);
        $sql->bindValue(':tit',$dadosPost['titulo']);
        $sql->bindValue(':cont',$dadosPost['conteudo']);
        $resultado=$sql->execute();
        if($resultado==0)
        {
            throw new Exception("Falha ao inserir publicação");
            return false;
        }
        return true;
    }
}

