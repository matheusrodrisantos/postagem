<?php
    function autoLoadFunction($class)
    {
    
        if(preg_match('/Controller$/', $class))
        {
            require "App/Controller/$class.php";
        }

        else if(preg_match('/Core$/',$class))
        {
        require "App/Core/$class.php";
        }

        else
        {
            require "App/Model/$class.php";
        }
        
    }
    spl_autoload_register("autoLoadFunction");
?>

