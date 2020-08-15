<?php

class Core
{
    public function start($url)
    {
        $acao='index';
        if(isset($_GET['pagina']))
            {            $controller=ucfirst($url['pagina'].'Controller');
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

        call_user_func_array(array(new $controller,$acao),array());

    }
}
