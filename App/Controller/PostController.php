<?php
class PostController
{
    public function index($parametros)
    {
        try
        {
            $postagem=Postagem::selecionaUm($parametros);
            $loader = new \Twig\Loader\FilesystemLoader('App/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('single.html');

            $parametros=array();
            $parametros['titulo']=$postagem->titulo;
            $parametros['conteudo']=$postagem->conteudo;
            $conteudo=$template->render($parametros);
            echo $conteudo;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
}
