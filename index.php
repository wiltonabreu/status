<?php
session_start();
require_once("vendor/autoload.php");


use \Classes\Page;
use \Classes\PageAdmin;
use \Classes\PageServices;
use Classes\DB\Sql;
use \Classes\Model\User;
use \Classes\Model\Incidentes;

$app = new \Slim\Slim();


$app->get('/',function () {
		
		
	  $a = new Incidentes();

		$incidentes = $a->processesIncidents();
	
		

		$b = new Incidentes();
		$comunicados = $b->processesCommunication();

			
		$page = new Page([			
			"data"=>[
						"servico" => "",
						"mensagem1" => "Incidentes ocorridos nos serviços de e-mail"
					]
		]);
		$page->setTpl("index",array(
			"incidentes"=>$incidentes,
			"comunicados"=>$comunicados
		));
		
    }
);

$app->get('/email',function () {
  		$page = new Page([			
			"data"=>[
						"servico" => "E-mail"
					]
			]);

		
		$filtro = "email";

	  $a = new Incidentes();

		$incidentes = $a->processesAllIncidents($filtro);
	


		$page->setTpl("services",array(
			"incidentes"=>$incidentes
		));
		
    }
);


$app->get('/email/:id', function($id){

	$page = new PageServices([			
		"data"=>[
					"servico" => "E-mail"
				]
		]);
	
	$a = new Incidentes();

	$result = $a->getIncident((int)$id);

	$page->setTpl("index",array(
		"result"=>$result
	));


});

$app->get('/comunicado/:id', function($id){

	$page = new PageServices([			
		"data"=>[
					"servico" => "Comunicado"
				]
		]);
	
	$a = new Incidentes();

	$result = $a->getcommunicated((int)$id);

	$page->setTpl("communicated",array(
		"result"=>$result
	));


});

$app->get('/hospedagem/:id', function($id){

	$page = new PageServices([			
		"data"=>[
					"servico" => "Hospedagem Web"
				]
		]);
	
	$a = new Incidentes();

	$result = $a->getIncident((int)$id);

	$page->setTpl("index",array(
		"result"=>$result
	));


});

$app->get('/backup/:id', function($id){

	$page = new PageServices([			
		"data"=>[
					"servico" => "Backup"
				]
		]);
	
	$a = new Incidentes();

	$result = $a->getIncident((int)$id);

	$page->setTpl("index",array(
		"result"=>$result
	));


});




$app->get('/hospedagem',function () {
  		$page = new Page([
			"data"=>[
						"servico" => "Hospedagem Web"
					]
		]);

		$filtro = "hospedagem";

	  $a = new Incidentes();

		$incidentes = $a->processesAllIncidents($filtro);
	

		$page->setTpl("services",array(
			"incidentes"=>$incidentes
		));
		
    }
);
 	
$app->get('/backup',function () {
  		$page = new Page([
			"data"=>[
						"servico" => "Backup"
					]
		]);
		
		$filtro = "backup";

	  $a = new Incidentes();

		$incidentes = $a->processesAllIncidents($filtro);

		$page->setTpl("services",array(
			"incidentes"=>$incidentes
		));
		
    }
);

$app->get('/todos',function () {
	$page = new Page([
	"data"=>[
				"servico" => "Todos incedentes"
			]
	]);

	$a = new Incidentes();
			$incidentes = $a->getAllIncidents();

	$page->setTpl("services",array(
		"incidentes"=>$incidentes
	));

	}
);

$app->get('/comunicados',function () {
	$page = new Page([
	"data"=>[
				"servico" => "Todos Comunicados"
			]
	]);

	$a = new Incidentes();
			$communicated = $a->getAllCommunicated();

	$page->setTpl("services",array(
		"incidentes"=>$communicated
	));

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

$app->get("/admin/forgot",function(){
	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("forgot");
	
});

$app->post("/admin/forgot", function(){
	

	$user = User::getForgot($_POST["email"]);

	header("Location: /admin/forgot/sent");
	
	exit;

});

$app->get("/admin/forgot/sent", function(){
	
	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("forgot-sent");
		

});

$app->get("/admin/forgot/reset", function() {
	$user = User::validForgotDecrypt($_GET["code"]);
	$page = new PageAdmin([
			"header" => false,
			"footer" => false
	]);
	$page->setTpl("forgot-reset", array(
			"name" => $user["desperson"],
			"code" => $_GET["code"]
	));
});


$app->post("/admin/forgot/reset", function() {
	
	$forgot = User::validForgotDecrypt($_POST["code"]);


	User::setForgotUsed($forgot["idrecovery"]);

	$user = new User();

	$user->get((int)$forgot["iduser"]);

	$password = password_hash($_POST["password"],PASSWORD_DEFAULT,[
		"cost" => 12
	]);

	$user->setPassword($password);

	$page = new PageAdmin([
			"header" => false,
			"footer" => false
	]);

	$page->setTpl("forgot-reset-success");

});




$app->run();
?>
