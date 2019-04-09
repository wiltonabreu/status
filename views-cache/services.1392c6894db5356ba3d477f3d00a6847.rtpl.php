<?php if(!class_exists('Rain\Tpl')){exit;}?>  <!-- Navigation -->
  <section id="about">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              
              <?php $counter1=-1;  if( isset($incidentes) && ( is_array($incidentes) || $incidentes instanceof Traversable ) && sizeof($incidentes) ) foreach( $incidentes as $key1 => $value1 ){ $counter1++; ?>

                <div class="incidentes-email">
                <p class="titulo">
                    <span><?php echo htmlspecialchars( $value1["dt_criacao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                    
                    <h3><a href="<?php echo htmlspecialchars( $value1["category"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></h3>  
                    
                </p>

                <p class="lead text-left">
                    
                    <?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

                </p>
                
                  <br>
                </div>
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
      