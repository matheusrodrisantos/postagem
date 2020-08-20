<?php

class Core
{
    public function start($url)
    {
        
        
        if(isset($url['metodo']))
        {
            $acao=$url['metodo'];
        }
        else
        {
            $acao='index';
        }
        
        if(isset($_GET['pagina']))
        {
            $controller=ucfirst($url['pagina'].'Controller');
        }
        else
        {
            $controller='HomeController';
        }

        //verifica se a classe existe
        if(!class_exists($controller))
        {
                $controller='ErroController';
        }

        if(isset($url['id']) && $url !=null)
        {
            $id=$url['id'];
        }
        else
        {
            $id=null;
        }
        call_user_func_array(array(new $controller,$acao),array('id'=>$id));

    }
}
