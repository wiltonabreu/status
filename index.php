<?php
session_start();
require_once("vendor/autoload.php");


use \Classes\Page;
use \Classes\PageAdmin;
use \Classes\PageServices;
use Classes\DB\Sql;
use \Classes\Model\User;
use \Classes\Model\Incidents;
use \Classes\Model\Category;

$app = new \Slim\Slim();


$app->get('/',function () {


		$a = new Incidents();

		
		//$resultVerifyDomain = "";


			//=== Será verificado qual cluter está com problema para que o cliente possa verificar se seu domínio está sendo afetado pelo problema.
			$filtro = "";

			$tableStatus= $a->processesAllIncidents($filtro);		
	
			$statusGeral = $a->verifyStatus($tableStatus,$filtro);

			$showOrHidden = "_hiddenForm";
			$showOrHiddenMsg = "_hiddenForm";
			$showOrHiddenMsgEmail = "_hiddenForm";
			$colorMsgHospedagemWeb = "alert-info";
			$colorMsgEmail = "alert-info";


			$msgVerifyDomainHospedagemWeb = Incidents::getMsgVerifyDomainHospedagemWeb();
			$msgVerifyDomainEmail = Incidents::getMsgVerifyDomainEmail();

			$colorMsgHospedagemWeb = Incidents::getColorMsgVerifyDomainHospedagemWeb();
			$colorMsgEmail = Incidents::getColorMsgVerifyDomainEmail();
		
			
				if (!isset($msgVerifyDomainHospedagemWeb) || $msgVerifyDomainHospedagemWeb == "" || $msgVerifyDomainHospedagemWeb == NULL ){
					$showOrHiddenMsg = "_hiddenForm";
				}else{			
					$showOrHiddenMsg = "_showForm";
				
				}

				if (!isset($msgVerifyDomainEmail) || $msgVerifyDomainEmail == "" || $msgVerifyDomainEmail == NULL ){
					$showOrHiddenMsgEmail = "_hiddenForm";
				}else{			
					$showOrHiddenMsgEmail = "_showForm";
				
				}
			
			
			
		
			for ($i=0; $i < count($statusGeral) ; $i++) { 
	
				if ($statusGeral[$i]["status_service"] == 1  ) {
					$showOrHidden = "_showForm";			
				}else {
					$showOrHidden = "_hiddenForm";
					
				}
			}		
			

			//===
		
		$filtro = "email";

		$tableStatus= $a->processesAllIncidents($filtro);		

		$statusEmail = $a->verifyStatus($tableStatus, $filtro);
		

		if ( $statusEmail == 1  ) {
			$statusEmail = "badge badge-warning";
			$messageStatusEmail = "Problema";
		}else {
			$statusEmail = "badge badge-success";
			$messageStatusEmail = "Operacional";
		}


	

		//---

		$filtro = "hospedagem";

		$tableStatus= $a->processesAllIncidents($filtro);		

		$statusHospedagem = $a->verifyStatus($tableStatus, $filtro);

		if ( $statusHospedagem == 1  ) {
			$statusHospedagem = "badge badge-warning";
			$messageStatusHospedagem = "Parcialmente operacional";
		}else {
			$statusHospedagem = "badge badge-success";
			$messageStatusHospedagem = "Operacional";
		}

		//---

		$filtro = "backup";

		$tableStatus= $a->processesAllIncidents($filtro);		

		$statusBackup = $a->verifyStatus($tableStatus, $filtro);
	

		if ( $statusBackup == 1  ) {
			$statusBackup = "badge badge-danger";
			$messageStatusBackup = "Problema";
		}else {
			$statusBackup = "badge badge-success";
			$messageStatusBackup = "Operacional";
		}

		$backup = $a->processesIncidentsWhithProblem($filtro);
		
		if(!empty($backup)){
			$previsaBackup = $a->getProblemSubcategory($backup);
		}else{
			$previsaBackup[1] = ': Operação normal';
		}

		$filtro = "painel";

		$tableStatus= $a->processesAllIncidents($filtro);		

		$statusPainel = $a->verifyStatus($tableStatus, $filtro);
	

		if ( $statusPainel == 1  ) {
			$statusPainel = "badge badge-danger";
			$messageStatusPainel = "Problema";
		}else {
			$statusPainel = "badge badge-success";
			$messageStatusPainel = "Operacional";
		}

		$painel = $a->processesIncidentsWhithProblem($filtro);
		
		if(!empty($painel)){
			$previsaoPainel = $a->getProblemSubcategory($painel);
		}else{
			$previsaoPainel[1] = ': Operação normal';
		}

		
		

		$incidentes = $a->processesIncidents();
		$b = new Incidents();
		$comunicados = $b->processesCommunication();
		
			
		$page = new Page([			
			"data"=>[
						"servico" => "",						
						"statusEmail" => $statusEmail,
						"messageStatusEmail" => $messageStatusEmail,						
						"statusHospedagem" => $statusHospedagem,
						"messageStatusHospedagem" => $messageStatusHospedagem,						
						"statusBackup" => $statusBackup,
						"messageStatusBackup" => $messageStatusBackup,
						"previsaBackup" => $previsaBackup[1],
						"statusPainel" => $statusPainel,
						"messageStatusPainel" => $messageStatusPainel,
						"previsaoPainel" => $previsaoPainel[1],
						"showOrHidden" => $showOrHidden,
						"showOrHiddenMsg" => $showOrHiddenMsg,
						"showOrHiddenMsgEmail" => $showOrHiddenMsgEmail, 
						"resultVerifyDomainHospedagemWeb" => $msgVerifyDomainHospedagemWeb,
						"resultVerifyDomainEmail" => $msgVerifyDomainEmail,
						"colorMsgHospedagemWeb" => $colorMsgHospedagemWeb,
						"colorMsgEmail" => $colorMsgEmail,			
					]
		]);
		$page->setTpl("index",array(
			"incidentes"=>$incidentes,
			"comunicados"=>$comunicados
		));
		
		
    }
);

$app->post('/', function(){

	$a = new Incidents();

	$filtro = "";

	$tableStatus= $a->processesAllIncidents($filtro);		

	$statusGeral = $a->verifyStatus($tableStatus,$filtro);

	if( (isset($_POST['domain']))){
		
		$dominio = $_POST['domain'];
		//$resultVerifyDomain = $a->verifyDomain($statusGeral, $dominio );	
		$resultVerifyDomainHospedagemWeb = $a->verifyDomainHospedagem($statusGeral, $dominio );
		$resultVerifyDomainEmail = $a->verifyDomainEmail($statusGeral, $dominio );	
		
	}

	//print_r($resultVerifyDomainEmail);exit;
	
	Incidents::setMsgVerifyDomainHospedagemWeb($resultVerifyDomainHospedagemWeb[0]);
	Incidents::setColorMsgVerifyDomainHospedagemWeb($resultVerifyDomainHospedagemWeb[1]);

	Incidents::setMsgVerifyDomainEmail($resultVerifyDomainEmail[0]);	
	Incidents::setColorMsgVerifyDomainEmail($resultVerifyDomainEmail[1]);

	

	//if($resultVerifyDomain[] == 0){
		//Incidents::setMsgVerifyDomainHospedagemWeb($resultVerifyDomain[0]);
		
	// }

	// if($resultVerifyDomain[2] == 1){
		
		//Incidents::setMsgVerifyDomainEmail($resultVerifyDomain[1]);
	 //}

	//if($resultVerifyDomain[2] == 2){
	 //Incidents::setMsgVerifyDomainHospedagemWeb($resultVerifyDomain[0]);
	 //Incidents::setMsgVerifyDomainEmail($resultVerifyDomain[1]);
	//}

	header("Location: /");exit;
	

});


$app->get('/mail-details',function () {
    

		$a = new Incidents();
		
		// Inicio ImapMail01
		$clusterMail01 = "mail01";
		$filtro = "email";

		$subcategoriaImailMail01 = "imap";
		$statusImapMail01 = $a->verifyStatusIncidents($filtro, $clusterMail01,$subcategoriaImailMail01);
		$dataImapMail01 = $a->getDataForTemplate($filtro, $subcategoriaImailMail01,$statusImapMail01);

		$subcategoriaPopMail01 = "pop";
		$statusPopMail01 = $a->verifyStatusIncidents($filtro, $clusterMail01,$subcategoriaPopMail01);
		$dataPopMail01 = $a->getDataForTemplate($filtro, $subcategoriaPopMail01,$statusPopMail01);

		$subcategoriaSmtpMail01 = "smtp";
		$statusSmtpMail01 = $a->verifyStatusIncidents($filtro, $clusterMail01,$subcategoriaSmtpMail01);
		$dataSmtpMail01 = $a->getDataForTemplate($filtro, $subcategoriaSmtpMail01,$statusSmtpMail01);

		$subcategoriaWebmailMail01 = "webmail";
		$statusWebmailMail01 = $a->verifyStatusIncidents($filtro, $clusterMail01,$subcategoriaWebmailMail01);
		$dataWebmailMail01 = $a->getDataForTemplate($filtro, $subcategoriaWebmailMail01,$statusWebmailMail01);

		$subcategoriaEasMail01 = "eas";
		$statusEasMail01 = $a->verifyStatusIncidents($filtro, $clusterMail01,$subcategoriaEasMail01);
		$dataEasMail01 = $a->getDataForTemplate($filtro, $subcategoriaEasMail01,$statusEasMail01);

		$subcategoriaFilaMail01 = "fila";
		$statusFilaMail01 = $a->verifyStatusIncidents($filtro, $clusterMail01,$subcategoriaFilaMail01);
		$dataFilaMail01 = $a->getDataForTemplate($filtro, $subcategoriaFilaMail01,$statusFilaMail01);

// Fim ImapMail01

	// Inicio ImapMail02
	$clusterMail02 = "mail02";

	$subcategoriaImailMail02 = "imap";
	$statusImapMail02 = $a->verifyStatusIncidents($filtro, $clusterMail02,$subcategoriaImailMail02);
	$dataImapMail02 = $a->getDataForTemplate($filtro, $subcategoriaImailMail02,$statusImapMail02);

	$subcategoriaPopMail02 = "pop";
	$statusPopMail02 = $a->verifyStatusIncidents($filtro, $clusterMail02,$subcategoriaPopMail02);
	$dataPopMail02 = $a->getDataForTemplate($filtro, $subcategoriaPopMail02,$statusPopMail02);

	$subcategoriaSmtpMail02 = "smtp";
	$statusSmtpMail02 = $a->verifyStatusIncidents($filtro, $clusterMail02,$subcategoriaSmtpMail02);
	$dataSmtpMail02 = $a->getDataForTemplate($filtro, $subcategoriaSmtpMail02,$statusSmtpMail02);

	$subcategoriaWebmailMail02 = "webmail";
	$statusWebmailMail02 = $a->verifyStatusIncidents($filtro, $clusterMail02,$subcategoriaWebmailMail02);
	$dataWebmailMail02 = $a->getDataForTemplate($filtro, $subcategoriaWebmailMail02,$statusWebmailMail02);

	$subcategoriaEasMail02 = "eas";
	$statusEasMail02 = $a->verifyStatusIncidents($filtro, $clusterMail02,$subcategoriaEasMail02);
	$dataEasMail02 = $a->getDataForTemplate($filtro, $subcategoriaEasMail02,$statusEasMail02);

	$subcategoriaFilaMail02 = "fila";
	$statusFilaMail02 = $a->verifyStatusIncidents($filtro, $clusterMail02,$subcategoriaFilaMail02);
	$dataFilaMail02 = $a->getDataForTemplate($filtro, $subcategoriaFilaMail02,$statusFilaMail02);

// Fim ImapMail02

// Inicio ImapMail03
$clusterMail03 = "mail03";

$subcategoriaImailMail03 = "imap";
$statusImapMail03 = $a->verifyStatusIncidents($filtro, $clusterMail03,$subcategoriaImailMail03);
$dataImapMail03 = $a->getDataForTemplate($filtro, $subcategoriaImailMail03,$statusImapMail03);

$subcategoriaPopMail03 = "pop";
$statusPopMail03 = $a->verifyStatusIncidents($filtro, $clusterMail03,$subcategoriaPopMail03);
$dataPopMail03 = $a->getDataForTemplate($filtro, $subcategoriaPopMail03,$statusPopMail03);

$subcategoriaSmtpMail03 = "smtp";
$statusSmtpMail03 = $a->verifyStatusIncidents($filtro, $clusterMail03,$subcategoriaSmtpMail03);
$dataSmtpMail03 = $a->getDataForTemplate($filtro, $subcategoriaSmtpMail03,$statusSmtpMail03);

$subcategoriaWebmailMail03 = "webmail";
$statusWebmailMail03 = $a->verifyStatusIncidents($filtro, $clusterMail03,$subcategoriaWebmailMail03);
$dataWebmailMail03 = $a->getDataForTemplate($filtro, $subcategoriaWebmailMail03,$statusWebmailMail03);

$subcategoriaEasMail03 = "eas";
$statusEasMail03 = $a->verifyStatusIncidents($filtro, $clusterMail03,$subcategoriaEasMail03);
$dataEasMail03 = $a->getDataForTemplate($filtro, $subcategoriaEasMail03,$statusEasMail03);

$subcategoriaFilaMail03 = "fila";
$statusFilaMail03 = $a->verifyStatusIncidents($filtro, $clusterMail03,$subcategoriaFilaMail03);
$dataFilaMail03 = $a->getDataForTemplate($filtro, $subcategoriaFilaMail03,$statusFilaMail03);

// Fim ImapMail03

		$page = new Page([			
			"data"=>[
						"servico" => "E-mail",
						"dataImapMail01" => $dataImapMail01,
						"dataPopMail01" => $dataPopMail01,
						"dataSmtpMail01" => $dataSmtpMail01,
						"dataWebmailMail01" => $dataWebmailMail01,
						"dataEasMail01" => $dataEasMail01,
						"dataFilaMail01" => $dataFilaMail01,
						
						"dataImapMail02" => $dataImapMail02,
						"dataPopMail02" => $dataPopMail02,
						"dataSmtpMail02" => $dataSmtpMail02,
						"dataWebmailMail02" => $dataWebmailMail02,
						"dataEasMail02" => $dataEasMail02,
						"dataFilaMail02" => $dataFilaMail02,
						
						"dataImapMail03" => $dataImapMail03,
						"dataPopMail03" => $dataPopMail03,
						"dataSmtpMail03" => $dataSmtpMail03,
						"dataWebmailMail03" => $dataWebmailMail03,
						"dataEasMail03" => $dataEasMail03,
						"dataFilaMail03" => $dataFilaMail03
					]
			]);	

	$page->setTpl("tabledetails");

});

$app->get('/web-details',function () {
		

		$a = new Incidents();
		
		
		$filtro = "hospedagem";

		$clusterLin1 = "lin1";
		$subcategoriaHttpLin1 = "http";
		$statusHttpLin1 = $a->verifyStatusIncidents($filtro, $clusterLin1,$subcategoriaHttpLin1);
		$dataHttpLin1 = $a->getDataForTemplate($filtro, $subcategoriaHttpLin1,$statusHttpLin1);

		$subcategoriaBdLin1 = "bd";
		$statusBdLin1 = $a->verifyStatusIncidents($filtro, $clusterLin1,$subcategoriaBdLin1);
		$dataBdLin1 = $a->getDataForTemplate($filtro, $subcategoriaBdLin1,$statusBdLin1);

		$clusterLin3 = "lin3";
		$subcategoriaHttpLin3 = "http";
		$statusHttpLin3 = $a->verifyStatusIncidents($filtro, $clusterLin3,$subcategoriaHttpLin3);
		$dataHttpLin3 = $a->getDataForTemplate($filtro, $subcategoriaHttpLin3,$statusHttpLin3);

		$subcategoriaBdLin3 = "bd";
		$statusBdLin3 = $a->verifyStatusIncidents($filtro, $clusterLin3,$subcategoriaBdLin3);
		$dataBdLin3 = $a->getDataForTemplate($filtro, $subcategoriaBdLin3,$statusBdLin3);

		$clusterWin = "win";
		$subcategoriaHttpWin = "http";
		$statusHttpWin = $a->verifyStatusIncidents($filtro, $clusterWin,$subcategoriaHttpWin);
		$dataHttpWin = $a->getDataForTemplate($filtro, $subcategoriaHttpWin,$statusHttpWin);

		$subcategoriaBdWin = "bd";
		$statusBdWin = $a->verifyStatusIncidents($filtro, $clusterWin,$subcategoriaBdWin);
		$dataBdWin = $a->getDataForTemplate($filtro, $subcategoriaBdWin,$statusBdWin);

		

		
		$page = new Page([			
			"data"=>[
						"servico" => "Hospedagem Web",
						"dataHttpLin1" => $dataHttpLin1,
						"dataBdLin1" => $dataBdLin1,

						"dataHttpLin3" => $dataHttpLin3,
						"dataBdLin3" => $dataBdLin3,

						"dataHttpWin" => $dataHttpWin,
						"dataBdWin" => $dataBdWin
					]
			]);

		$page->setTpl("tabledetails-hospedagem");
		

});






$app->get('/email',function () {
  		$page = new Page([			
			"data"=>[
						"servico" => "E-mail"
					]
			]);

		
		$filtro = "email";

	  $a = new Incidents();

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
	
	$a = new Incidents();

	$result = $a->getIncident((int)$id);

	if(!empty($result[0]["category_email_imap"])){
		$previsao = $result[0]["previsao_imap_email"];
	}

	if(!empty($result[0]["category_email_pop"])){
		$previsao = $result[0]["previsao_pop_email"];
	}

	if(!empty($result[0]["category_email_smtp"])){
		$previsao = $result[0]["previsao_smtp_email"];
	}

	if(!empty($result[0]["category_email_webmail"])){
		$previsao = $result[0]["previsao_webmail_email"];
	}

	if(!empty($result[0]["category_email_eas"])){
		$previsao = $result[0]["previsao_eas_email"];
	}

	if(!empty($result[0]["category_email_fila"])){
		$previsao = $result[0]["previsao_fila_email"];
	}

	if($result[0]["status_service"] == "Resolvido"){
		$previsao = "Incidente Resolvido";
	}

	//print_r($result);exit;

	$page->setTpl("index",array(
		"result"=>$result,
		"previsao"=> $previsao
	));


});

$app->get('/comunicado/:id', function($id){

	$page = new PageServices([			
		"data"=>[
					"servico" => "Comunicado"
				]
		]);
	
	$a = new Incidents();

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
	
	$a = new Incidents();

	$result = $a->getIncident((int)$id);

	if(!empty($result[0]["category_email_imap"])){
		$previsao = $result[0]["previsao_imap_email"];
	}

	if(!empty($result[0]["category_email_pop"])){
		$previsao = $result[0]["previsao_pop_email"];
	}

	if(!empty($result[0]["category_email_smtp"])){
		$previsao = $result[0]["previsao_smtp_email"];
	}

	if(!empty($result[0]["category_email_webmail"])){
		$previsao = $result[0]["previsao_webmail_email"];
	}

	if(!empty($result[0]["category_email_eas"])){
		$previsao = $result[0]["previsao_eas_email"];
	}

	if(!empty($result[0]["category_email_fila"])){
		$previsao = $result[0]["previsao_fila_email"];
	}

	if($result[0]["status_service"] == "Resolvido"){
		$previsao = "Incidente Resolvido";
	}
	$previsao = "";

	$page->setTpl("index",array(
		"result"=>$result,
		"previsao"=> $previsao
	));


});

$app->get('/backup/:id', function($id){

	$page = new PageServices([			
		"data"=>[
					"servico" => "Backup"
				]
		]);
	
	$a = new Incidents();

	$result = $a->getIncident((int)$id);

	$previsao = $result[0]["previsao_backup"];

	
	if($result[0]["status_service"] == "Resolvido"){
		$previsao = "Incidente Resolvido";
	}

	$page->setTpl("index",array(
		"result"=>$result,
		"previsao"=> $previsao
	));


});




$app->get('/hospedagem',function () {
  		$page = new Page([
			"data"=>[
						"servico" => "Hospedagem Web"
					]
		]);

		$filtro = "hospedagem";

	  $a = new Incidents();

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

	  $a = new Incidents();

		$incidentes = $a->processesAllIncidents($filtro);

		$page->setTpl("services",array(
			"incidentes"=>$incidentes
		));
		
    }
);

$app->get('/painel',function () {
	$page = new Page([
		"data"=>[
					"servico" => "Painel de Controle"
				]
	]);

	$filtro = "painel";

	$a = new Incidents();

	$incidentes = $a->processesAllIncidents($filtro);

	$page->setTpl("services",array(
		"incidentes"=>$incidentes
	));

});

$app->get('/painel/:id', function($id){

	$page = new PageServices([			
		"data"=>[
					"servico" => "Painel de Controle"
				]
		]);
	
	$a = new Incidents();

	$result = $a->getIncident((int)$id);

	
	$previsao = $result[0]["previsao_painel"];


	if($result[0]["status_service"] == "Resolvido"){
		$previsao = "Incidente Resolvido";
	}

	$page->setTpl("index",array(
		"result"=>$result,
		"previsao"=> $previsao
	));


});


$app->get('/todos',function () {
	$page = new Page([
	"data"=>[
				"servico" => "Todos incedentes"
			]
	]);

	$a = new Incidents();
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

	$a = new Incidents();
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

	

	$a = new Incidents();

	$incidentes = $a->getAllIncidents();

	$page = new PageAdmin();
	
	$page->setTpl("events", array(
		"incidentes"=>$incidentes
	));
	
});




$app->get('/admin/events/create',function () {
	
	User::verifylogin();

	$categories = new Category();

	$categories->listCategories();

//	var_dump($categories->getValue());exit;

	$page = new PageAdmin();
	$page->setTpl("events-create",[
		"categories"=>$categories->getValue()
	
	]);
	
});

$app->post('/admin/events/create',function() {
	
	User::verifylogin();
	
	$a = new Incidents();	
	

	$_POST["status_service"] = (int)$_POST["status_service"];

	//var_dump($_POST);exit;
	$a->setData($_POST);

	
	$a->save();
	

	header("Location: /admin/events");

	exit;
	
});

$app->get('/admin/events/:id',function($id) {
	
	User::verifylogin();

	$a = new Incidents();

	$a->get((int)$id);
	

	if($a->getcategory_email() == 1) {
		
		$page = new PageAdmin();

		$page->setTpl("events-update-email", array(
			"incidentes"=>$a->getValue()
		));

	}

	if($a->getcategory_hospedagem() == 1) {
		$page = new PageAdmin();

		$page->setTpl("events-update-hospedagem", array(
			"incidentes"=>$a->getValue()
		));
	}

	if($a->getcategory_backup() == 1) {
		$page = new PageAdmin();

		$page->setTpl("events-update-backup", array(
			"incidentes"=>$a->getValue()
		));		
	}

	if($a->getcategory_painel() == 1) {
		$page = new PageAdmin();

		$page->setTpl("events-update-painel", array(
			"incidentes"=>$a->getValue()
		));		
	}
	
	
});

//=== UPdate Eventos
$app->post('/admin/events/:id',function ($id) {
	
	User::verifylogin();

	$a = new Incidents();

	if($_POST["status_service"] == "Resolvido" )
	{
			$_POST["status_service"] = 0;
	}
	elseif ($_POST["status_service"] == "Em analise")
	{
			$_POST["status_service"] = 1;
	}

	
	$a->get((int)$id);

	$_POST["category_email"] = (isset($_POST["category_email"]))?1:0;
	$_POST["category_email_imap"] = (isset($_POST["category_email_imap"]))?1:0;
	$_POST["category_email_pop"] = (isset($_POST["category_email_pop"]))?1:0;
	$_POST["category_email_smtp"] = (isset($_POST["category_email_smtp"]))?1:0;
	$_POST["category_email_webmail"] = (isset($_POST["category_email_webmail"]))?1:0;
	$_POST["category_email_fila"] = (isset($_POST["category_email_fila"]))?1:0;
	$_POST["category_email_eas"] = (isset($_POST["category_email_eas"]))?1:0;
	$_POST["category_email_mail01"] = (isset($_POST["category_email_mail01"]))?1:0;
	$_POST["category_email_mail02"] = (isset($_POST["category_email_mail02"]))?1:0;
	$_POST["category_email_mail03"] = (isset($_POST["category_email_mail03"]))?1:0;	
	$_POST["category_hospedagem"] = (isset($_POST["category_hospedagem"]))?1:0;
	$_POST["category_hospedagem_http"] = (isset($_POST["category_hospedagem_http"]))?1:0;
	$_POST["category_hospedagem_bd"] = (isset($_POST["category_hospedagem_bd"]))?1:0;	
	$_POST["category_hospedagem_lin1"] = (isset($_POST["category_hospedagem_lin1"]))?1:0;
	$_POST["category_hospedagem_lin3"] = (isset($_POST["category_hospedagem_lin3"]))?1:0;
	$_POST["category_hospedagem_win"] = (isset($_POST["category_hospedagem_win"]))?1:0;
	$_POST["category_backup"] = (isset($_POST["category_backup"]))?1:0;
	
	$a->setData($_POST);

	$a->update();

	header("Location: /admin/events");

	exit;
	
});

//====Delete eventos

$app->get('/admin/events/:id/delete', function($id){
	User::verifylogin();

	$a = new Incidents();

	$a->get((int) $id);

	$a->delete();

	header("Location: /admin/events");

	exit;


});

//Lista Comunicados

$app->get('/admin/communicated',function () {
	
	User::verifylogin();

	

	$a = new Incidents();

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
	
	$a = new Incidents();	
	

	$a->setData($_POST);

	$a->saveCommunicated();

	header("Location: /admin/communicated");

	exit;
	
});
//=== UPdate Comunicados GET
$app->get('/admin/communicated/:id',function($id) {
	
	User::verifylogin();

	$a = new Incidents();

	$a->getcommunicated((int)$id);

	$page = new PageAdmin();

	$page->setTpl("communicated-update", array(
		"communicated"=>$a->getValue()
	));
	
});
//=== Deleet Comunicados

$app->get('/admin/communicated/:id/delete', function($id){
	User::verifylogin();

	$a = new Incidents();

	$a->getcommunicated((int) $id);

	$a->deleteCommunicated();

	header("Location: /admin/communicated");

	exit;


});


//=== UPdate Comunicados POST
$app->post('/admin/communicated/:id',function ($id) {
	
	User::verifylogin();

	$a = new Incidents();

	
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

$app->get('/admin/categories',function () {
	
	User::verifylogin();	

	$categories = Category::listAll();

	

//	$incidentes = $a->getAllIncidents();

	$page = new PageAdmin();
	
	$page->setTpl("categories",[
		"categories"=>$categories
	]);
	
});

$app->get('/admin/categories/create',function () {
	
	User::verifylogin();	
	
	$page = new PageAdmin();
	
	$page->setTpl("categories-create");
	
	
});


$app->post('/admin/categories/create',function () {
	
	User::verifylogin();
	
	$category = new Category();

	$category->setData($_POST);

	$category->save();

	header("Location: /admin/categories");

	exit;
	
});

$app->get('/admin/categories/:idcategory/delete',function ($idcategory) {
	
	User::verifylogin();
	
	$category = new Category();

	$category->get((int)$idcategory);

	$category->delete();

	header("Location: /admin/categories");

	exit;
	
});


$app->get('/admin/categories/:idcategory',function ($idcategory) {
	
	User::verifylogin();

	$category = new Category();

	$category->get((int)$idcategory);

	//var_dump($result);exit;
	
	$page = new PageAdmin();
	
	$page->setTpl("categories-update",[
		"category"=>$category->getValue()
	]);
	
	
});


$app->post('/admin/categories/:idcategory',function ($idcategory) {
	
	User::verifylogin();

	$category = new Category();

	$category->get((int)$idcategory);

	//var_dump($result);exit;

	$category->setData($_POST);
	
	$category->save();

	header("Location: /admin/categories");

	exit;
	
	
	
});





$app->run();
?>
