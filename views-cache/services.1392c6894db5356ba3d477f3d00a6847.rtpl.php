<?php if(!class_exists('Rain\Tpl')){exit;}?>  <!-- Navigation -->
  <section id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          
          <?php $counter1=-1;  if( isset($incidentes) && ( is_array($incidentes) || $incidentes instanceof Traversable ) && sizeof($incidentes) ) foreach( $incidentes as $key1 => $value1 ){ $counter1++; ?>

						
							<hr>
							<h5 class="card-subtitle text-dark text-center"> <?php echo htmlspecialchars( $value1["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </h5>
							

							<p class="font-italic text-sm-left text-black-50">Criado: <?php echo htmlspecialchars( $value1["dt_criacao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>					
							
							<p class="card-text"><?php echo nl2br(str_replace("<br />","<br>\\r\\n",substr($value1["descricao"],0,400))); ?></p>
							<a href="<?php echo htmlspecialchars( $value1["category"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-outline-primary">Leia mais...</a>
						
						<br>
				  <?php } ?>

          
        </div>
      </div>
    </div>
  </section>
    <!--
      <section id="services" class="bg-light">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h2>Services we offer</h2>
              <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut optio velit inventore, expedita quo laboriosam possimus ea consequatur vitae, doloribus consequuntur ex. Nemo assumenda laborum vel, labore ut velit dignissimos.</p>
            </div>
          </div>
        </div>
      </section>
    -->
      