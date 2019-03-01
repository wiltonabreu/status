<?php
session_start();
require_once("vendor/autoload.php");


use \Classes\Page;
use \Classes\PageAdmin;
use \Classes\PageServices;
use Classes\DB\Sql;
use \Classes\Model\User;
use \Classes\Model\Eventos;

$app = new \Slim\Slim();


$app->get('/',function () {
		
		
		
		

		$a = new Eventos();
		
		$filtro = "email";

		$tableStatus= $a->processesAllIncidents($filtro);		

		$statusEmail = $a->verifyStatus($tableStatus);

		if ( $statusEmail == 1  ) {
			$statusEmail = "badge badge-danger";
			$messageStatusEmail = "Problema";
		}else {
			$statusEmail = "badge badge-success";
			$messageStatusEmail = "Operacional";
		}

		//---

		$filtro = "hospedagem";

		$tableStatus= $a->processesAllIncidents($filtro);		

		$statusHopedagem = $a->verifyStatus($tableStatus);

		if ( $statusHopedagem == 1  ) {
			$statusHopedagem = "badge badge-danger";
			$messageStatusHospedagem = "Problema";
		}else {
			$statusHopedagem = "badge badge-success";
			$messageStatusHospedagem = "Operacional";
		}

		//---

		$filtro = "backup";

		$tableStatus= $a->processesAllIncidents($filtro);		

		$statusBackup = $a->verifyStatus($tableStatus);

		if ( $statusBackup == 1  ) {
			$statusBackup = "badge badge-danger";
			$messageStatusBackup = "Problema";
		}else {
			$statusBackup = "badge badge-success";
			$messageStatusBackup = "Operacional";
		}



		//echo $statusEmail . "-" . $statusHopedagem . "-" . $statusBackup; exit;
		


		$incidentes = $a->processesIncidents();
	
		

		$b = new Eventos();
		$comunicados = $b->processesCommunication();

			
		$page = new Page([			
			"data"=>[
						"servico" => "",
						"mensagem1" => "Incidentes ocorridos nos serviços de e-mail",
						"statusEmail" => $statusEmail,
						"messageStatusEmail" => $messageStatusEmail,
						"statusHopedagem" => $statusHopedagem,
						"messageStatusHospedagem" => $messageStatusHospedagem,
						"statusBackup" => $statusBackup,
						"messageStatusBackup" => $messageStatusBackup
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

	  $a = new Eventos();

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
	
	$a = new Eventos();

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
	
	$a = new Eventos();

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
	
	$a = new Eventos();

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
	
	$a = new Eventos();

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

	  $a = new Eventos();

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

	  $a = new Eventos();

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

	$a = new Eventos();
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

	$a = new Eventos();
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

$app->get('/admin/events',function () {
	
	User::verifylogin();

	

	$a = new Eventos();

	$incidentes = $a->getAllIncidents();

	$page = new PageAdmin();
	
	$page->setTpl("events", array(
		"incidentes"=>$incidentes
	));
	
});




$app->get('/admin/events/create',function () {
	
	User::verifylogin();

	$page = new PageAdmin();
	$page->setTpl("events-create");
	
});

$app->post('/admin/events/create',function() {
	
	User::verifylogin();
	
	$a = new Eventos();	
	
	
	$_POST["status_service"] = (int)$_POST["status_service"];

	//var_dump($_POST);exit;

	$a->setData($_POST);

	$a->save();

	header("Location: /admin/events");

	exit;
	
});

$app->get('/admin/events/:id',function($id) {
	
	User::verifylogin();

	$a = new Eventos();

	$a->get((int)$id);

	$page = new PageAdmin();

	$page->setTpl("events-update", array(
		"incidentes"=>$a->getValue()
	));
	
});

//=== UPdate Eventos
$app->post('/admin/events/:id',function ($id) {
	
	User::verifylogin();

	$a = new Eventos();

	if($_POST["status_service"] == "Resolvido" )
	{
			$_POST["status_service"] = 0;
	}
	elseif ($_POST["status_service"] == "Em analise")
	{
			$_POST["status_service"] = 1;
	}

	
	$a->get((int) $id);

	$a->setData($_POST);



	$a->update();

	header("Location: /admin/events");

	exit;
	
});

//====Delete eventos

$app->get('/admin/events/:id/delete', function($id){
	User::verifylogin();

	$a = new Eventos();

	$a->get((int) $id);

	$a->delete();

	header("Location: /admin/events");

	exit;


});

//Lista Comunicados

$app->get('/admin/communicated',function () {
	
	User::verifylogin();

	

	$a = new Eventos();

	$communicated = $a->getAllCommunicated();

	$page = new PageAdmin();
	
	$page->setTpl("communicated", array(
		"communicated"=>$communicated
	));
	
});

//===Create Comunucated GET
$app->get('/admin/communicated/create',function () {
	
	User::verifylogin();

	$page = new PageAdmin();
	$page->setTpl("communicated-create");
	
});

//===Create Comunucated POST

$app->post('/admin/communicated/create',function() {
	
	User::verifylogin();
	
	$a = new Eventos();	
	

	$a->setData($_POST);

	$a->saveCommunicated();

	header("Location: /admin/communicated");

	exit;
	
});
//=== UPdate Comunicados GET
$app->get('/admin/communicated/:id',function($id) {
	
	User::verifylogin();

	$a = new Eventos();

	$a->getcommunicated((int)$id);

	$page = new PageAdmin();

	$page->setTpl("communicated-update", array(
		"communicated"=>$a->getValue()
	));
	
});
//=== Deleet Comunicados

$app->get('/admin/communicated/:id/delete', function($id){
	User::verifylogin();

	$a = new Eventos();

	$a->getcommunicated((int) $id);

	$a->deleteCommunicated();

	header("Location: /admin/communicated");

	exit;


});


//=== UPdate Comunicados POST
$app->post('/admin/communicated/:id',function ($id) {
	
	User::verifylogin();

	$a = new Eventos();

	
	$a->getcommunicated((int) $id);

	$a->setData($_POST);

	$a->updateCommunicated();

	header("Location: /admin/communicated");

	exit;
	
});


//==

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
