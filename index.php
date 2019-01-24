<?php
require_once("vendor/autoload.php");
//require 'inc/Slim-2.x/Slim/Slim.php';

//\Slim\Slim::registerAutoloader();


$app = new \Slim\Slim();


$app->get('/',function () {
      // require_once("view/index.php");

		$sql = new Classes\DB\Sql();

		$results = $sql->select("SELECT * from emails limit 1;");

		echo json_encode($results);

    }
);

$app->run();
?>