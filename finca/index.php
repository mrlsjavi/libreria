<?php

require 'config.php';
require 'util/Auth.php';



//use an autoloader

//there is also spl_autoload_register (take a look at if if you like)
/*
	we are going to load a class when its called, we loaded automatic
*/

function __autoload($class){
require LIBS.$class.".php";
}




/*require 'libs/Bootstrap.php';
require 'libs/Controller.php';
require 'libs/Model.php';
require 'libs/View.php';

//Library
require 'libs/Database.php';
require 'Libs/Session.php';
require 'Libs/Hash.php';
quitar estas
*/



$bootstrap = new Bootstrap();

//optional settings
//$bootstrap->setDefaulControllerPath('c')
/*setModelPath
setErrorFile($path)
setDefaultFile($path)*/
$bootstrap->init();



