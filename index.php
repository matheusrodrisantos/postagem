<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
require_once('App/Core/Core.php');
require_once('App/Controller/HomeController.php');
require_once('App/Controller/ErroController.php');
require_once('App/Model/Postagem.php');
require_once('lib/Database/Connection.php');
$template=file_get_contents('App/Template/modelo.html');

ob_start();
    $core = new Core;
    $core->start($_GET);
    $saida=ob_get_contents();
ob_end_clean();


$tplPronto=str_replace('{{area_dinamica}}',$saida,$template);
echo $tplPronto;


?>

