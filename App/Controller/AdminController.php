<?php
class AdminController{

    function index()
    {
        $loader = new \Twig\Loader\FilesystemLoader('App/View');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('admin.html');
        $parametros=array();
        $conteudo=$template->render($parametros);
        echo $conteudo;
    }
    function create()
    {
        $loader = new \Twig\Loader\FilesystemLoader('App/View');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('create.html');
        $parametros=array();
        $conteudo=$template->render($parametros);
        echo $conteudo;

    }
    function insert()
    {
        if(isset($_POST))
        {
            try
            {
                Postagem::insert($_POST);
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
            }
            
        }

    }
}
?>
