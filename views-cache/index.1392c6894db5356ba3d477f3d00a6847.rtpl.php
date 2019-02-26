<?php if(!class_exists('Rain\Tpl')){exit;}?><section>           

  <div class="row clearfix">
      <div class="col-md-12 column">
          <div class="list-group">


          	<ul class="list-group">
			  <li class="list-group-item">

			  	<table>
				  <tr>
				    <th>
				    	
	              		Serviço
	              		<!-- <a href="#"  data-toggle="tooltip" data-placement="bottom" title="Access database server and execute queries"> 
	                	<i class="fa fa-question-circle"></i> 
	              		</a>-->
                		
                	</th>

				    <th>Status</th>
				    <th>Previsão</th>
				  </tr>
				  
				  <tr>
				    <td><h5><span class="cluster-email">Email</span></h5></td>
				    <td>
				    	<span class="badge badge-success">Operational</span>
				    	<a href="services/email">						
				  	    	<i class="fas fa-plus-circle" title="Saiba mais" data-toggle="tooltip" data-placement="bottom" ></i>
				  	    </a>
				    </td>
				    <td>0 minutos</td>
				  </tr>


				  <tr>
				    <td><h5><span class="cluster-email">Hospedagem Web</span></h5></td>
				    <td>
				    	<span class="badge badge-warning" >Warning</span>			    
					    <!--<td><span class="badge badge-success">Operational</span></td> -->
					    <a href="services/hospedagem">
					    	<i class="fas fa-plus-circle" title="Saiba mais" data-toggle="tooltip" data-placement="bottom" ></i>
					    </a>

				     </td>	
				    <td>0 minutos</td>
				  </tr>


				  <tr>
				    <td><h5><span class="cluster-email">Backup</span></h5></td>
				    <td>
				    	<span class="badge badge-success">Operational</span>
				    	<a href="services/backup">
						    <!--<td><span class="badge badge-warning">Warning</span></td>-->
						    <i class="fas fa-plus-circle" title="Saiba mais" data-toggle="tooltip" data-placement="bottom" ></i>
					    </a>
				    </td>
				    <td>0 minutos</td>
				  </tr>


				</table>


                                   					
			  </li>

				<!--
			  <li class="list-group-item">

				<table>
				  <tr>
				    <th>
				    		<span class="hospedagem">Hospedagem<p>Web</span>
                      		 
                      		<a href="#"  data-toggle="tooltip" data-placement="bottom" title="Access database server and execute queries">
                        	<i class="fa fa-question-circle"></i>
                      		</a>
                		
                	</th>

				    <th>Status</th>
				    <th>Previsão</th>
				  </tr>
				  
				  <tr>
				    <td class="plesk"><h5>Linux 1 <span class="ipLin1 plesks">149.56.175.201</span></h5></td>
				    <td><span class="badge badge-success">Operational</span></td>
				   <!-- <td><span class="badge badge-danger">Not Operational</span></td> -->
				   <!-- <td>0 minutos</td>
				  </tr>


				  <tr>
				    <td class="plesk"><h5>Linux 3<span class="ipLin3 plesks">149.56.157.199</span></h5></td>
				    <td><span class="badge badge-success">Operational</span></td>
				    <td>0 minutos</td>
				  </tr>


				  <tr>
				    <td class="plesk"><h5>Windows <span class="ipWin plesks">199.59.96.204</span></h5></td>
				    <td><span class="badge badge-success">Operational</span></td>
				    <td>0 minutos</td>
				  </tr>


				</table>

			  	                     

			  </li> 


			  <li class="list-group-item">
			  	

                <table>
				  <tr>
				    <th>
				    	
                      		Backup 
                      		
                      		<a href="http://status.mav.com.br/services/email.php"  data-toggle="tooltip" data-placement="bottom" title="Informações relevantes sobre os serviços">
                        	<i class="fa fa-question-circle"></i>
                      		</a>
                		
                	</th>

				    <th>Status</th>
				    <th>Previsão</th>
				  </tr>
				  
				  <tr>
				    <td><h5>Server 01</h5></td>
				    <td><span class="badge badge-success">Operational</span></td>
				    <td>0 minutos</td>
				  </tr>


				  <tr>
				    <td><h5>Server 02</h5></td>
				    <td><span class="badge badge-success">Operational</span></td>
				    <td>0 minutos</td>
				  </tr>


				  <tr>
				    <td><h5>Server 03</h5></td>
				    <td><span class="badge badge-success">Operational</span></td>
				    <td>0 minutos</td>
				  </tr>


				</table>

			  </li>-->                

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

					<?php $counter1=-1;  if( isset($results) && ( is_array($results) || $results instanceof Traversable ) && sizeof($results) ) foreach( $results as $key1 => $value1 ){ $counter1++; ?>

					<li>
						<a href="services/<?php echo htmlspecialchars( $value1["service"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["dt_criacao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>						
						<!--
							Criar classe para tratar esses dados para serem apresentados no Template
							<p>&lt;?php echo substr($linha[descricao], 0, 400) ?&gt;</p>
						-->
						<p>
								<?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

						</p>
					</li>
				  <?php } ?>

										
				</ul>
			</div>

			<div class="col-md-6 avisos">
				<h2>Comunicados</h2>

				<ul class="timeline">
				
					<?php $counter1=-1;  if( isset($results) && ( is_array($results) || $results instanceof Traversable ) && sizeof($results) ) foreach( $results as $key1 => $value1 ){ $counter1++; ?>

					<li>
						<a href="services/<?php echo htmlspecialchars( $value1["service"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["dt_criacao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>						
						<!--<p>&lt;?php echo substr($linha[descricao], 0, 400) ?&gt;</p>-->
						<p>
								<?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

						</p>
					</li>
				  <?php } ?>

					
				</ul>
			</div>
		</div>
	</div>

</section>


</body>
</html>

