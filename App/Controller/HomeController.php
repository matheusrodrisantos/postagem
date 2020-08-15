<?php
class HomeController
{
    public function index()
    {
        try{
               $colecPostagem=Postagem::selecionaTodos();
               var_dump($colecPostagem);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }


    }
}
?>
