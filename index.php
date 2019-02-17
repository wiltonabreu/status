<?php
session_start();
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
      
		User::verifylogin();

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

$app->get('/admin/logout',function () {
      
	User::logout();
	header("Location: /admin/login");
	exit;
	
});


$app->get('/admin/users',function () {
	
	User::verifylogin();

	$users = User::listAll();

	$page = new PageAdmin();
	$page->setTpl("users", array(
		"users"=>$users
	));
	
});

$app->get('/admin/users/create',function () {
	
	User::verifylogin();

	$page = new PageAdmin();
	$page->setTpl("users-create");
	
});

$app->get('/admin/users/:iduser/delete', function($iduser){
	User::verifylogin();

	$user = new User();

	$user->get((int)$iduser);

	$user->delete();

	header("Location: /admin/users");

	exit;


});

$app->get('/admin/users/:iduser',function($iduser) {
	
	User::verifylogin();

	$user = new User();

	$user->get((int)$iduser);

	$page = new PageAdmin();

	$page->setTpl("users-update", array(
		"user"=>$user->getValue()
	));
	
});

$app->post('/admin/users/create',function() {
	
	User::verifylogin();
	
	$user = new User();

	$_POST["inadmin"] = (isset($_POST["inadmin"]))?1:0;

	$user->setData($_POST);

	$user->save();

	header("Location: /admin/users");

	exit;
	
});

$app->post('/admin/users/:iduser',function ($iduser) {
	
	User::verifylogin();

	$user = new User();

	$_POST["inadmin"] = (isset($_POST["inadmin"]))?1:0;

	$user->get((int) $iduser);

	$user->setData($_POST);

	$user->update();

	header("Location: /admin/users");

	exit;
	
});



$app->run();
?>
