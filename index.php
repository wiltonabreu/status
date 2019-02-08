<?php

require_once("vendor/autoload.php");
use \Classes\Page;
use \Classes\PageAdmin;
use \Classes\PageServices;
use \Classes\Model\User;

$app = new \Slim\Slim();


$app->get('/',function () {
      

		$sql = new Classes\DB\Sql();

		$results = $sql->select("SELECT * from tb_status;");

		//echo json_encode($results);

	//exit;
		

		$page = new Page();
		$page->setTpl("index");
		
    }
);

$app->get('/services/email',function () {
  		$page = new PageServices([
			"header"=> true,
			"footer"=> true,
			"data"=>[
						"servico" => "E-mail",
						"mensagem1" => "Incidentes ocorridos nos serviços de e-mail"
					]
		]);
		$page->setTpl("index");
		
    }
);

$app->get('/services/hospedagem',function () {
  		$page = new PageServices([
			"header"=> true,
			"footer"=> true,
			"data"=>[
						"servico" => "Hospedagem Web",
						"mensagem1" => "Incidentes ocorridos nos serviços de Hospedagem Web"
					]
		]);
		$page->setTpl("index");
		
    }
);
 	
$app->get('/services/backup',function () {
  		$page = new PageServices([
			"header"=> true,
			"footer"=> true,
			"data"=>[
						"servico" => "Backup",
						"mensagem1" => "Incidentes ocorridos nos serviços de Backup"
					]
		]);
		$page->setTpl("index");
		
    }
);


$app->get('/admin',function () {
      

		$page = new PageAdmin();
		$page->setTpl("index");
    }
);

$app->get('/admin/login',function () {
      

		$page = new PageAdmin([
			"header"=> false,
			"footer"=> false
		]);
		$page->setTpl("login");
    }
);

$app->post('/admin/login',function () {
      
		User::login($_POST["login"], $_POST["password"] );
		
		header("Location: /admin");
		exit;
    }
);

$app->run();
?>
