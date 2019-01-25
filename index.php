<?php
require_once("vendor/autoload.php");

use \Classes\Page;
use \Classes\PageAdmin;



$app = new \Slim\Slim();


$app->get('/',function () {
      
/*
		$sql = new Classes\DB\Sql();

		$results = $sql->select("SELECT * from emails limit 1;");

		echo json_encode($results);
*/
		$page = new Page();
		$page->setTpl("index");
    }
);


$app->get('/admin',function () {
      

		$page = new PageAdmin();
		$page->setTpl("index");
    }
);

$app->run();
?>