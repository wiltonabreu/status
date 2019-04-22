<?php if(!class_exists('Rain\Tpl')){exit;}?><section>           

<div class="row clearfix">
	<div class="col-md-12 column">
		<div class="list-group">
      <ul class="list-group">
			  <li class="list-group-item">
			  	<table>
						<tr>
							<th>Serviço</th>
							<th>Status</th>
							<th>Previsão</th>
						</tr>
						
						<tr>
							<td><h5><span class="cluster-email">Email</span></h5></td>
							<td>
								<span class="<?php echo htmlspecialchars( $statusEmail, ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $messageStatusEmail, ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
								<a href="mail-details">						
										<i class="fas fa-plus-circle" title="Saiba mais" data-toggle="tooltip" data-placement="bottom" ></i>
								</a>
							</td>						
							<td>TEste</td>
						</tr>

						<tr>
							<td><h5><span class="cluster-email">Hospedagem Web</span></h5></td>
							<td>
								<span class="<?php echo htmlspecialchars( $statusHospedagem, ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $messageStatusHospedagem, ENT_COMPAT, 'UTF-8', FALSE ); ?></span>			    
								<!--<td><span class="badge badge-success">Operational</span></td> -->
								<a href="web-details">
									<i class="fas fa-plus-circle" title="Saiba mais" data-toggle="tooltip" data-placement="bottom" ></i>
								</a>
							</td>							
							<td>TEste</td>
						</tr>

						<tr>
							<td><h5><span class="cluster-email">Backup</span></h5></td>
							<td>
								<span class="<?php echo htmlspecialchars( $statusBackup, ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $messageStatusBackup, ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
								<a href="backup">
									<!--<td><span class="badge badge-warning">Warning</span></td>-->
									<i class="fas fa-plus-circle" title="Saiba mais" data-toggle="tooltip" data-placement="bottom" ></i>
								</a>
							</td>							
							<td>TEste</td>
						</tr>
				  </table>                                   					
			  </li>
			</ul>
              
    </div>
  </div>        
</div>

</section>


<section>	  
	<div class="container">
		<div class="row fundo">
			<div class="col-md-6 noticias">
				<h2>Incidentes</h2>
				<ul class="timeline">

					<?php $counter1=-1;  if( isset($incidentes) && ( is_array($incidentes) || $incidentes instanceof Traversable ) && sizeof($incidentes) ) foreach( $incidentes as $key1 => $value1 ){ $counter1++; ?>

						<li>

							<a href="<?php echo htmlspecialchars( $value1["category"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>

							<p><?php echo htmlspecialchars( $value1["dt_criacao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>					
							
							<p><?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>

						</li>
				  <?php } ?>

										
				</ul>
			</div>

			<div class="col-md-6 avisos">
				<h2>Comunicados</h2>

				<ul class="timeline">
				
					<?php $counter1=-1;  if( isset($comunicados) && ( is_array($comunicados) || $comunicados instanceof Traversable ) && sizeof($comunicados) ) foreach( $comunicados as $key1 => $value1 ){ $counter1++; ?>

						<li>
							<a href="<?php echo htmlspecialchars( $value1["category"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>

							<p><?php echo htmlspecialchars( $value1["dt_criacao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>				
							
							<p><?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
							
						</li>
				  <?php } ?>

					
				</ul>
			</div>
		</div>
	</div>
</section>


