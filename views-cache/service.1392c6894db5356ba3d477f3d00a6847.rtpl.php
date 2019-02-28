<?php if(!class_exists('Rain\Tpl')){exit;}?><section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            
            <?php $counter1=-1;  if( isset($result) && ( is_array($result) || $result instanceof Traversable ) && sizeof($result) ) foreach( $result as $key1 => $value1 ){ $counter1++; ?>

              <div class="incidentes-email">
              <p class="titulo">
                  <span><?php echo htmlspecialchars( $value1["dt_criacao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                  
                  <h3><?php echo htmlspecialchars( $value1["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>  
                  
              </p>

              <p class="lead">
                  
                  <?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

              </p>
              
                <br>
              </div>
            <?php } ?>

            
          </div>
        </div>
      </div>
</section>