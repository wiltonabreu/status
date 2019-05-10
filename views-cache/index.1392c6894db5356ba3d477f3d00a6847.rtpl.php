<?php if(!class_exists('Rain\Tpl')){exit;}?><section>           

<div class="row clearfix">

	
	<div class="col-md-12 column">
		<div class="list-group">
      <ul class="list-group">
			  <li class="list-group-item">
				<div class="primarytable">

				
			  	<table class="table table-striped table-bordered table-condensed table-hover">
						<tr>
							<th><span class="d-flex justify-content-center"> Serviço</span></th>
							<th><span class="d-flex justify-content-center"> Status</span></th>
							
						</tr>
						
						<tr>
							<td><h5><span class="cluster-email d-flex justify-content-center">Email</span></h5></td>
							<td>
								<div class="d-flex justify-content-center">
									<span class="<?php echo htmlspecialchars( $statusEmail, ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $messageStatusEmail, ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
									<a href="mail-details">						
										<i class="fas fa-plus-circle fa-lg" title="Saiba mais" data-toggle="tooltip" data-placement="bottom" ></i>
									</a>
								</div>
							</td>
												
							
						</tr>

						<tr>
							<td><h5><span class="cluster-email d-flex justify-content-center">Hospedagem Web</span></h5></td>
							<td>
								<div class="d-flex justify-content-center">
									<span class="<?php echo htmlspecialchars( $statusHospedagem, ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $messageStatusHospedagem, ENT_COMPAT, 'UTF-8', FALSE ); ?></span>			    
									<!--<td><span class="badge badge-success">Operational</span></td> -->
									<a href="web-details">
										<i class="fas fa-plus-circle fa-lg" title="Saiba mais" data-toggle="tooltip" data-placement="bottom" ></i>
									</a>
								</div>
							</td>							
							
						</tr>

						<tr>
							<td><h5><span class="cluster-email d-flex justify-content-center">Backup</span></h5></td>
							<td >
								<div class="d-flex justify-content-center">
									<span class="<?php echo htmlspecialchars( $statusBackup, ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $messageStatusBackup, ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
									<a href="backup">
										<!--<td><span class="badge badge-warning">Warning</span></td>-->
										<i class="fas fa-plus-circle fa-lg" title="Previsão <?php echo htmlspecialchars( $previsaBackup, ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-toggle="tooltip" data-placement="bottom" ></i>
									</a>
								</div>
							</td>							
							
						</tr>

						<tr>
							<td><h5><span class="cluster-email d-flex justify-content-center">Painel de Controle</span></h5></td>
							<td >
								<div class="d-flex justify-content-center">
									<span class="<?php echo htmlspecialchars( $statusPainel, ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $messageStatusPainel, ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
									<a href="painel">
										<!--<td><span class="badge badge-warning">Warning</span></td>-->
										<i class="fas fa-plus-circle fa-lg" title="Previsão <?php echo htmlspecialchars( $previsaoPainel, ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-toggle="tooltip" data-placement="bottom" ></i>
									</a>
								</div>
							</td>							
							
						</tr>
				  </table>  
				</div>                                 					
			  </li>
			</ul>
              
    </div>
  </div>        
</div>

</section>

<section>
		<div class="container <?php echo htmlspecialchars( $showOrHidden, ENT_COMPAT, 'UTF-8', FALSE ); ?>"  id="container_verifyDomain">
				<form role="form" action="/" method="post" id="createincident"> <!-- form role="form" -->

					
					 <div class="label_verifyDomain _verifyDomain" >
						<label for="title"><h3>Veja se seu domínio está sendo afetado</h3></label>
					 </div>

					  <div class="form-group _verifyDomain">
						 
						  <input type="text" class="form-control _input_verifyDomain" id="domain" name="domain" placeholder="Digite seu domínio" required>

						  <button type="submit" class="btn btn-success btn_verifyDomain">Consultar</button>
					  </div>					  
					 
					  

					  <div class="alert alert1 <?php echo htmlspecialchars( $colorMsgHospedagemWeb, ENT_COMPAT, 'UTF-8', FALSE ); ?> alert-dismissible fade show <?php echo htmlspecialchars( $showOrHiddenMsg, ENT_COMPAT, 'UTF-8', FALSE ); ?> " role="alert">
							<span style="margin: 300px" ><?php echo htmlspecialchars( $resultVerifyDomainHospedagemWeb, ENT_COMPAT, 'UTF-8', FALSE ); ?> </span>
						<button type="button" class="close" onClick="selectorHospedagemWeb()" data-dismiss="alert" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
										  
					  <div class="alert alert2 <?php echo htmlspecialchars( $colorMsgEmail, ENT_COMPAT, 'UTF-8', FALSE ); ?> alert-dismissible fade show <?php echo htmlspecialchars( $showOrHiddenMsgEmail, ENT_COMPAT, 'UTF-8', FALSE ); ?> " role="alert">
							<span style="margin: 300px" ><?php echo htmlspecialchars( $resultVerifyDomainEmail, ENT_COMPAT, 'UTF-8', FALSE ); ?> </span>
						<button type="button" class="close" onClick="selectorEmail()" data-dismiss="alert" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  

				</form>
		</div>

</section>

<section>	  
	<div class="container">
		<div class="row fundo">
			<div class="col-md-6 noticias _timeline">
				<h2 class="_text-center"><u>Incidentes</u></h2>
				<ul class="timeline">

					<?php $counter1=-1;  if( isset($incidentes) && ( is_array($incidentes) || $incidentes instanceof Traversable ) && sizeof($incidentes) ) foreach( $incidentes as $key1 => $value1 ){ $counter1++; ?>

						<li>

							<a href="<?php echo htmlspecialchars( $value1["category"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><u><b><?php echo htmlspecialchars( $value1["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?></b></u></a>

							<p><?php echo htmlspecialchars( $value1["dt_criacao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>					
							
							<p><?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>

						</li>
				  <?php } ?>

										
				</ul>
				
			</div>

			<div class="col-md-6 avisos _timeline">
				<h2 class="_text-center"><u>Comunicados</u></h2>

				<ul class="timeline">
				
					<?php $counter1=-1;  if( isset($comunicados) && ( is_array($comunicados) || $comunicados instanceof Traversable ) && sizeof($comunicados) ) foreach( $comunicados as $key1 => $value1 ){ $counter1++; ?>

						<li>
							<a href="<?php echo htmlspecialchars( $value1["category"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><u><b><?php echo htmlspecialchars( $value1["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?></b></u></a>

							<p><?php echo htmlspecialchars( $value1["dt_criacao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>				
							
							<p><?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
							
						</li>
				  <?php } ?>

					
				</ul>
				
			</div>
		</div>
		
	</div>
	<div class="container ">
		<div class="row fundo">
			<div class="col-md-6 _text-center">
					<a href="todos"><button type="button" class="btn btn-info">Todos Incidentes</button></a>
			</div>
			<div class="col-md-6 text-center">
					<a href="comunicados"><button type="button" class="btn btn-info " >Todos comunicados</button></a>
			</div>
		</div>
	</div>	

</section>

<script>
function selectorEmail() {
  $(".alert2").stop().fadeTo(1, 1).removeClass('hidden');
  window.setTimeout(function() {
    $(".alert2").fadeTo(500, 0).slideUp(500, function(){
        $(".alert2").addClass('hidden');
    });
  }, 1000); 
}

function selectorHospedagemWeb() {
  $(".alert1").stop().fadeTo(1, 1).removeClass('hidden');
  window.setTimeout(function() {
    $(".alert1").fadeTo(500, 0).slideUp(500, function(){
        $(".alert1").addClass('hidden');
    });
  }, 1000); 
}
</script>


