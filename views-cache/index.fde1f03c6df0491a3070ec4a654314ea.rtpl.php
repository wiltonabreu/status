<?php if(!class_exists('Rain\Tpl')){exit;}?><section id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto indidentesdetails">
          <!--
          <?php $counter1=-1;  if( isset($result) && ( is_array($result) || $result instanceof Traversable ) && sizeof($result) ) foreach( $result as $key1 => $value1 ){ $counter1++; ?>

            <div class="incidentes-email">
              <p class="titulo">
                  <span>Data de criação: <?php echo htmlspecialchars( $value1["dt_criacao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                  
                  <h3><?php echo htmlspecialchars( $value1["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>  
                  
              </p>

              <p class="status"> Status: <b><?php echo htmlspecialchars( $value1["status_service"], ENT_COMPAT, 'UTF-8', FALSE ); ?></b></p>

              <p class="lead text-left">                  
                  <?php echo nl2br(str_replace("<br />","<br>\\r\\n",$value1["descricao"])); ?>


                  
              </p>

              <p class="previsao">                  
                  Previsão: <b><?php echo htmlspecialchars( $previsao, ENT_COMPAT, 'UTF-8', FALSE ); ?></b>
              </p>
              
              
              
              <br>
            </div>
          <?php } ?> 
          -->
          <?php $counter1=-1;  if( isset($result) && ( is_array($result) || $result instanceof Traversable ) && sizeof($result) ) foreach( $result as $key1 => $value1 ){ $counter1++; ?>

					
              <p class="font-italic text-sm-left text-black-50">Criado: <?php echo htmlspecialchars( $value1["dt_criacao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
							<h5 class="card-subtitle text-dark text-center"> <?php echo htmlspecialchars( $value1["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </h5>
							<p class="status text-black-50"> Status: <b><?php echo htmlspecialchars( $value1["status_service"], ENT_COMPAT, 'UTF-8', FALSE ); ?></b></p>

												
							
							<p class="card-text"><?php echo nl2br(str_replace("<br />","<br>\\r\\n",$value1["descricao"])); ?></p>
							<p class="previsao text-black-50">                  
                  Previsão: <b><?php echo htmlspecialchars( $previsao, ENT_COMPAT, 'UTF-8', FALSE ); ?></b>
              </p>
						
						<br>
				  <?php } ?>

          

        </div>
      </div>
    </div>
</section>
  