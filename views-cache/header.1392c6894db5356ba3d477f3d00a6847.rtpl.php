<?php if(!class_exists('Rain\Tpl')){exit;}?><html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width:device-width, initial-scale=1">

	<title>MAV Tecnologia Status</title>

	<link rel="stylesheet" type="text/css" href="../lib/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../lib/bootstrap/js/bootstrap.min.js">
	<link href="../css/status.css" rel="stylesheet" id="bootstrap-css">
	<link href="../css/mobile-status.css" rel="stylesheet">
	<link rel="shortcut icon" type="image/x-icon" href="img/faviconm.ico"/>		
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.5/angular.min.js"></script>
	<script src="../js/jquery-2-1-1.min.js"></script>
	
	
</head>

	<body>
	  <header> 

	  	<div class="header-white-small">
				
					<button id="btn-bars" type="button" ><i class="fa fa-bars"></i></button>
				
				<div class="container container-white-small">
					<div class="row row-cont">

						<ul class="list-unstyled list-socials">
							<li>
								<a href="https://pt-br.facebook.com/mavtecnologia/" target="_blank"><i class="fab fa-facebook"></i></a>
							</li>
							<li>
								<a href="https://www.instagram.com/mavtecnologia/" target="_blank"><i class="fab fa-instagram"></i></a>
							</li>
							
							<li>
								<a href="https://www.youtube.com/channel/UCYpQOySZDuLEcD7-Ent_neA" target="_blank"><i class="fab fa-youtube"></i></a>
							</li>
							<li>
								<a href="https://pt.linkedin.com/company/mavtecnologiabr"  target="_blank"><i class="fab fa-linkedin-in"></i></a>
							</li>
						</ul>

					    <div class="vl vl-list-socials d-xl-block d-lg-none d-md-none"></div>
						
						<div class="contact d-xl-block d-lg-none d-md-none" >
								<a href="comunicados">Comunicados</a>
						</div>
						<div class="vl vl-client d-xl-block d-lg-none d-md-none"></div>

						<div class="client">
								<a href="https://clientes.mav.com.br" target="_blank">Area do Cliente</a>
						</div>

			   	</div>
			  </div>					
							
			</div>	

			<div id="menu-mobile-mask" class="d-xl-none d-lg-none d-md-none">

			</div>
			
			<div id="menu-mobile" class="d-xl-none d-lg-none d-md-none ">
					<ul class="list-unstyled">
						<li><a href="/">Início</a></li>                             
						<li><a href="email">E-mail</a></li>
						<li><a href="hospedagem">Hospedagem</a></li>
						<li><a href="backup">Backup</a></li>
						<li><a href="painel">Painel de Controle</a></li>
						<li><a href="comunicados">Comunicados</a></li>					
					</ul>

					<div class="bar-close">
						<button type="button" class="btn btn-close"><i class="fas fa-window-close"></i></button>
					</div>

			</div>
		  
			<div class="container">

					<div class="row">	</div>
								

			</div>
			

		  <div class="container container-logo">
				<div class="row row-logo">
						
						<div class="col col-menu ">
							<a  href="/"><img id="logotipo" src="img/mav.png" alt="Logotipo"> </a>
						</div>
						
						<div class="col d-md-none d-lg-block d-xl-block">
								<a  href="/"><h1>Status de Seviços</h1></a>
							</div>
				<!--	
					<nav id="menu" class="float-right">
							<ul>
							<li><a href="/">HOME</a></li>
							<li><a href="email">E-MAIL</a></li>
							<li><a href="hospedagem">HOSPEDAGEM WEB</a></li>
							<li><a href="backup">BACKUP</a></li>
							<li><a href="todos">TODOS</a></li>												
							</ul>
					</nav>
	-->
					
					
					<div class="col">
						<ul id="menu" class="nav nav-tabs">
							<li><a data-toggle="tab" href="/">Início</a></li>                             
							<li><a data-toggle="tab" href="email">E-mail</a></li>
							<li><a data-toggle="tab" href="hospedagem">Hospedagem</a></li>
							<li><a data-toggle="tab" href="backup">Backup</a></li>
							<li><a data-toggle="tab" href="painel">Painel de Controle</a></li>
							<li><a href="comunicados">Comunicados</a></li>					
						</ul>
					</div>
			
				
			
				</div>
		  </div>

		  
			<div class="container1">
		   <div class="row-gray services-gray">
					<h2><?php echo htmlspecialchars( $servico, ENT_COMPAT, 'UTF-8', FALSE ); ?></h2>
			 </div>
			</div>

	

			<script>
				$("#btn-bars").on("click", function(){
			
					$("header").toggleClass("open_menu");

				});


				$("#menu-mobile-mask, .btn-close").on("click", function(){
					$("header").removeClass("open_menu");
				});
				
			</script>

		</header>		
	
