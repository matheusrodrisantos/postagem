<?php
class AdminController{

    function index()
    {
        $loader = new \Twig\Loader\FilesystemLoader('App/View');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('admin.html');
        $objPostagem=Postagem::selecionaTodos();
        $parametros['post']=$objPostagem;
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
    function update($parametros)
    {
        if(isset($_POST['id']))
        {
            try
            {
                Postagem::update($_POST);
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
            }
        }
        $parametros=array();
        if(isset($_GET['id']) and !empty($_GET['id']))
        {
            $id=$_GET['id'];
            $parametros['post']=Postagem::selecionaUm($id);
        }

        $loader = new \Twig\Loader\FilesystemLoader('App/View');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('update.html');
        $conteudo=$template->render($parametros);
        echo $conteudo;
    }
    function delete()
    {

    }

}
?>
